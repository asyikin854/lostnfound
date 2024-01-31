<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Admin</title>
    <style>
        /* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f8f8;
}

.container {
    max-width: 40%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 6px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
    margin-bottom: 10px;
}

button[type="submit"] {
    width: 50%;
    padding: 12px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

.alert {
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}
.alert-fail {
    background-color: #ff9797;
    border-color: #fd8975;
    color: #c71919;
}

/* Media queries for responsive design */
@media screen and (max-width: 768px) {
    .container {
        max-width: 100%;
        border-radius: 0;
    }
}
.button {
            background-color: #ff0000;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            padding: 10px;
            font-size: 16px;
            border: none;
        }
        .button:hover {
            background-color: #db0e0e60;
        }

    </style>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('fail'))
            <div class="alert alert-fail">
                {{ session('fail') }}
            </div>
        @endif
        <h1>Edit Admin</h1>
        <form action="{{ route('image.update') }}" method="POST">
            @csrf
            <label for="adminID">Admin ID</label>
            <input id="adminID" type="text" name="adminID" value="{{ old('adminID', $admin->adminID) }}" required>
            
            <label for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="New Password" required>

           <center><button type="submit">Update</button></center>
        </form>
        <br><br>
        <center><a href="{{ route('image.index')}}"><button class="button">Return</button></a></center>
    </div>
</body>
</html>

