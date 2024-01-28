<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        .login-container h2 {
            margin-top: 0;
            font-size: 24px;
            text-align: center;
            color: #333333;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .login-form input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-form input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
            text-align: center;

        }
    </style>
</head>
<body>
    
    <div class="login-container">
        <a href="{{ route('image.create')}}">Back</a>
        <h2>Admin Login</h2>
        @if ($errors->has('login'))
            <div class="error-message">{{ $errors->first('login') }}</div>
        @endif
    <form class="login-form" method="POST" action="{{ route('image.admin') }}">
        @csrf   
        <input type="text" name="adminID" placeholder="Admin ID" required>
    
        <input type="password" name="password" placeholder="Password" required>
            
        <input type="submit" value="Login">
        <br>
        <center><a href="{{ route('register')}}">Register</a></center>
    </form>
</div>
</body>
</html>