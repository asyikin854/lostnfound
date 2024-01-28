<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .register-form {
            display: flex;
            flex-direction: column;
        }
        .register-form label {
            margin-bottom: 8px;
        }
        .register-form input[type="text"],
        .register-form input[type="password"],
        .register-form select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .register-form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .register-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
    <form action="{{ route('registers')}}" class="register-form" method="POST">
        @csrf
        <input type="text" name="adminID" placeholder="Admin ID" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="admin_location" id="admin_location" >
            <option selected disabled>Please select location</option>
            <option value="Taman Perling">Taman Perling</option>
            <option value="Taman Tampoi Utama">Taman Tampoi Utama</option>
        </select>
        <input type="submit" value="Register"><br>

        <center><a href="{{ route('image.admin')}}">Cancel</a></center>
    </form>
</div>
</body>
</html>