<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'age' => $request->age,
                'password' => $request->password,
            ]);

            return redirect()->back();
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }



    public function index($id)
    {
        $users = User::find($id);
        if(!$users)
        {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($users);

    }




    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'age' => $request->age,
        ]);

        return redirect()->back()->with('success', 'User updated successfully');
    }



    public function table()
    {
        $users = User::all();
        return view('table',['users'=>$users]);
    }

    public function showLoginForm()
    {
        return view('login')->withErrors(session()->get('errors', new \Illuminate\Support\MessageBag()));
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && $user->password === $request->password) {
            Auth::login($user);
            return redirect()->intended('/b');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function userTable(Request $request)
    {
        $perPage = $request->input('per_page', 4);

        $users = User::paginate($perPage);

        return view('table', ['users'=>$users]);
    }

}
