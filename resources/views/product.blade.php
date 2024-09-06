<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySql Table</title>
    <style>

        *{
            -webkit-user-select: none; /* Safari */
            -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            font-weight: 300;
            line-height: 1.42em;
            color: #A7A1AE;
            background-color: #1F2739;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 3em;
            font-weight: 300;
            line-height: 1em;
            text-align: center;
            color: #4DC3FA;
            margin-bottom: 1em;
        }

        h2 {
            font-size: 1em;
            font-weight: 300;
            text-align: center;
            display: block;
            line-height: 1em;
            padding-bottom: 2em;
            color: #FB667A;
        }

        marquee {
            position: relative;
            left: 30%;
        }

        h2 marquee a {
            font-weight: 700;
            text-transform: uppercase;
            color: #FB667A;
            text-decoration: none;
        }

        .blue { color: #185875; }
        .yellow { color: #FFF842; }

        .container {
            text-align: left;
            overflow: hidden;
            width: 80%;
            margin: 0 auto;
            padding: 0 0 8em 0;
        }

        .container th h1 {
            font-weight: bold;
            font-size: 1em;
            text-align: left;
            color: #185875;
        }

        .container td {
            font-weight: normal;
            font-size: 1em;
            padding: 10px;
            box-shadow: 0 2px 2px -2px #0E1119;
            border-radius: 5px;
        }

        .container tr:nth-child(odd) {
            background-color: #323C50;
        }

        .container tr:nth-child(even) {
            background-color: #2C3446;
        }

        .container th {
            background-color: #1F2739;
        }

        .container td:first-child { color: #FB667A; }

        .container tr:hover {
            background-color: #464A52;
            box-shadow: 0 6px 6px -6px #0E1119;
        }

        .container td:hover {
            background-color: #FFF842;
            color: #403E10;
            font-weight: bold;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
            transition: all 0.3s ease-in-out;
        }

        @media (max-width: 800px) {
            .container td:nth-child(5),
            .container th:nth-child(5) { display: none; }
        }

        button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 4px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            background-color: white;
            color: black;
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2);
            animation: bounce 0.5s;
        }

        button:active {
            transform: scale(0.95);
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.2);
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        .flex-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #1F2739;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            color: #A7A1AE;
        }

        .modal-content h2 {
            color: #4DC3FA;
        }

        .modal-content label {
            color: #FB667A;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #FB667A;
            text-decoration: none;
            cursor: pointer;
        }

        .round-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .modal form input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .modal form input[type="file"] {
            padding: 0;
        }
    </style>
</head>
<body>

<h1><span class="blue">&lt;</span>MySql<span class="blue">&gt;</span> <span class="yellow">Table</span></h1>
<marquee width="40%" direction="right" height="100px">
    <h2 style="font-size: 30px">Created by <a href="https://github.com/Hasanboyman" target="_blank">&sext;Abdulkhaev Hasanboy&sext;</a></h2>
</marquee>

<div class="flex-container" style="justify-content: space-around">
    <button onclick="openCreateForm()">Create Product</button>
    <a href="{{ route('table') }}"><button>See Users</button></a>
</div>

<table class="container">
    @if(!isset($products) || $products->isEmpty())
        <h1>No Products Found</h1>
    @else
        <thead>
        <tr>
            <th width="50px"><h1>ID</h1></th>
            <th><h1>Image</h1></th>
            <th><h1>Name</h1></th>
            <th><h1>Description</h1></th>
            <th><h1>Price</h1></th>
            <th><h1>Actions</h1></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img src="{{ $product->image_url  ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShnvQQJxUE8iXrT-wISUCA8kaz5eetYbUqjw&s' }}" alt="Product Image" class="round-img"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }} $</td>
                <td style="display: flex; height: 57px; justify-content: space-around">
                    <button onclick="openUpdateForm({{ $product->id }}, '{{ $product->name }}', '{{ $product->description }}', {{ $product->price }}, '{{ $product->image_url }}')">Edit</button>
                    <form action="{{ url('product/' . $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

</table>


<div class="flex-container" style="justify-content: center; margin-top: 20px;">
    {{ $products->links('vendor.pagination.custom') }}
</div>

<div id="createProductModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeCreateForm()">&times;</span>
        <h2>Create Product</h2>
        <form action="{{ url('/create/product') }}" method="POST" id="createProductForm" enctype="multipart/form-data">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required><br>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image"><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

<div id="updateProductModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeUpdateForm()">&times;</span>
        <h2>Update Product</h2>
        <form action="{{ url('/product/'.$product->id) }}" method="POST" id="updateProductForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" id="updateProductId" name="id">
            <label for="updateName">Name:</label>
            <input type="text" id="updateName" name="name" required><br>
            <label for="updateDescription">Description:</label>
            <input type="text" id="updateDescription" name="description" required><br>
            <label for="updatePrice">Price:</label>
            <input type="number" id="updatePrice" name="price" step="0.01" required><br>
            <label for="updateImage">Image:</label>
            <input type="file" id="updateImage" name="image_url"><br>
            <button type="submit">Update</button>
        </form>
    </div>
</div>
@endif

<script>
    function openCreateForm() {
        document.getElementById('createProductModal').style.display = 'flex';
    }

    function closeCreateForm() {
        document.getElementById('createProductModal').style.display = 'none';
    }

    function openUpdateForm(id, name, description, price, imageUrl) {
        document.getElementById('updateProductId').value = id;
        document.getElementById('updateName').value = name;
        document.getElementById('updateDescription').value = description;
        document.getElementById('updatePrice').value = price;
        document.getElementById('updateProductModal').style.display = 'flex';
    }

    function closeUpdateForm() {
        document.getElementById('updateProductModal').style.display = 'none';
    }
</script>

</body>
</html>
