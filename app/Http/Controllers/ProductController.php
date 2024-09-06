<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
        ]);

        // Check if an image was uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
            $imagePath = 'storage/images/' . $filename;
        } else {
            // Default image or handle when no image is uploaded
            $imagePath = null;  // Or provide a default image path if needed
        }

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->image_url = $imagePath;  // Handle null when no image is uploaded
        $product->save();

        return redirect()->back()->with('success', 'Product created successfully.');
    }


    public function index($name)
    {
        $products = Product::find($name);
        if(!$products)
        {
            return response()->json(['message' =>  $name. 'product not found'], 404);
        }
        return response()->json($products);

    }



    public function destroy($name)
    {
        $products = Product::find($name);

        if (!$products) {
            return response()->json(['error' => $name. ' product not found'], 404);
        }

        $products->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->back();
    }
    public function productTable(Request $request)
    {
        $perPage = $request->input('per_page', 4);

        $products = Product::paginate($perPage);

        return view('product', ['products' => $products]);
    }

}
