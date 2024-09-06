<style>

    * {
        -webkit-user-select: none; /* Safari */
        -ms-user-select: none; /* Internet Explorer/Edge */
        user-select: none;
    }

    body {
        font-family: 'Open Sans', sans-serif;
        font-weight: 300;
        line-height: 1.42em;
        color:#A7A1AE;
        background-color:#1F2739;
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
        display: table;
        padding: 0 0 8em 0;
    }

    .container th h1 {
        font-weight: bold;
        font-size: 1em;
        color: #185875;
    }

    .container td {
        font-weight: normal;
        font-size: 1em;
        padding: 2%;
        -webkit-box-shadow: 0 2px 2px -2px #0E1119;
        -moz-box-shadow: 0 2px 2px -2px #0E1119;
        box-shadow: 0 2px 2px -2px #0E1119;
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
        -webkit-box-shadow: 0 6px 6px -6px #0E1119;
        -moz-box-shadow: 0 6px 6px -6px #0E1119;
        box-shadow: 0 6px 6px -6px #0E1119;
    }

    .container td:hover {
        background-color: #FFF842;
        color: #403E10;
        font-weight: bold;
        box-shadow: #000000 -1px 1px, #015dff -3px 3px, #32ff00 -4px 4px, #ff0000 -5px 5px, #7F7C21 -6px 6px, #7F7C21 -7px 7px;
        transform: translate3d(6px, -6px, 0);
        transition: all 0.4s linear;
    }



    @media (max-width: 800px) {
        .container td:nth-child(4),
        .container th:nth-child(4) { display: none; }
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
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 40%;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #1F2739; /* Matches your page background */
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
        max-width: 500px; /* Maximum width for the modal */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        color: #A7A1AE; /* Matches the text color on your page */
    }

    .modal-content h2 {
        color: #4DC3FA; /* Matches the color of your h1 */
    }

    .modal-content label {
        color: #FB667A; /* Matches your h2 color */
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #FB667A; /* Matches your h2 color */
        text-decoration: none;
        cursor: pointer;
    }
</style>

<h1><span class="blue">&lt;</span>MySql<span class="blue">&gt;</span> <span class="yellow">Table</span></h1>
<marquee width="40%" direction="right" height="100px">
    <h2 style="font-size: 30px">Created by <a href="https://github.com/Hasanboyman" target="_blank">&sext;Abdulkhaev Hasanboy&sext;</a></h2>
</marquee>

<div class="flex-container" style="justify-content: space-around">
    <button onclick="openCreateForm()">Create Product</button>
    <a href="{{ route('b') }}"><button>See Users</button></a>
</div>

<table class="container">
    @if($users === null)
        <h1>No Users Found</h1>
    @endif
    <thead>
    <tr>
        <th width="50px"><h1>ID</h1></th>
        <th><h1>Name</h1></th>
        <th><h1>Email</h1></th>
        <th><h1>Age</h1></th>
        <th><h1>Actions</h1></th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->age }}</td>
            <td style="display: flex; align-items: flex-end; justify-content: space-evenly; align-content: space-around; flex-wrap: wrap;">
                <button onclick="openUpdateForm({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', {{ $user->age }})">Edit</button>
                <form action="{{ url('/' . $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
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
    {{ $users->links('vendor.pagination.custom') }}
</div>


<div id="updateFormModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeUpdateForm()">&times;</span>
        <h2>Update User</h2>
        <form id="updateUserForm"  method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="updateUserId">
            <label for="name">Name:</label>
            <input type="text" name="name" id="updateUserName" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="updateUserEmail" required>
            <br>
            <label for="age">Age:</label>
            <input type="number" max="110" name="age" id="updateUserAge" required>
            <br>
            <button type="submit">Update</button>
        </form>
    </div>
</div>


<div id="CreateFormModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeCreateForm()">&times;</span>
        <h2>Update User</h2>
        <form id="CreateUserForm" action="{{ url('/') }}" method="post">
            @csrf
            @method('POST')
            <label for="name">Name:</label>
            <input type="text" name="name" id="CreateUserName"   required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="CreateUserEmail" required>
            <br>
            <label for="age">Age:</label>
            <input type="number" max="110" name="age" id="CreateUserAge" value="" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" max="110" name="password" id="CreateUserPassword" required>
            <br>
            <button type="submit">Update</button>
        </form>
    </div>
</div>



<script>
    function openUpdateForm(id, name, email, age) {
        document.getElementById('updateUserId').value = id;
        document.getElementById('updateUserName').value = name;
        document.getElementById('updateUserEmail').value = email;
        document.getElementById('updateUserAge').value = age;

        // Set the form action dynamically
        document.getElementById('updateUserForm').action = "{{ url('/') }}/" + id;

        document.getElementById('updateFormModal').style.display = 'block';
    }

    function closeUpdateForm() {
        document.getElementById('updateFormModal').style.display = 'none';
    }

    // Close the modal when the user clicks anywhere outside of the modal
    window.onclick = function(event) {
        var modal = document.getElementById('updateFormModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }



    function openCreateForm() {
        document.getElementById('CreateFormModal').style.display = 'block';
    }

    function closeCreateForm() {
        document.getElementById('CreateFormModal').style.display = 'none';
    }

    // Close the modal when the user clicks anywhere outside of the modal
    window.onclick = function(event) {
        var modal = document.getElementById('CreateFormModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

</script>
