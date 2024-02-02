<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Form</title>
    <link rel="stylesheet" href="{{ asset('css/table2.css') }} ">
    <style>
        nav {
            background-color: #333; 
        }

        ul {
            list-style-type: none; 
            display: flex; 
            justify-content: space-around; 
            padding: 10px 0; 
        }

        li {
            padding: 0 15px;
        }

        a {
            text-decoration: none; 
            color: white; 
            font-size: 18px; 
        }
        a:hover {
            color: #ffc107; 
        }
        input[type="text"] {
            width: 100%;
            padding:10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            margin-bottom: 5px;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            margin-bottom: 10px;
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"><path d="M5.93 7.93l3.07 3.07 3.07-3.07 1.41 1.41-4.48 4.48-4.48-4.48 1.41-1.41z" fill="%23333"/></svg>'); /* Add custom dropdown arrow */
            background-repeat: no-repeat;
            background-position: right 10px top 50%;
            background-size: 16px;
        }
        input[type="file"] {
            text-decoration: none;
            display:initial;
        }
        label[for="image"] {
            background-color:darkturquoise;
            color: white;
            padding: 10px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        label[for="image"]:hover {
            background-color:turquoise;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            background-color: #f0f8ff;;
        }

    </style>
</head>
<body>
<div class="container"> 
    <nav class="navi">
    <ul>
        <li><a href="{{ route('image.admin')}}">Admin</a></li>
        <li><a href="{{ route('image.create')}}">Report Missing Item</a></li>
        <li><a href="{{ route('image.display')}}">Search Missing Item</a></li>
    </ul>
    </nav>
    @if(session('success'))
    <center><div class="alert alert-success">
        {{ session('success') }}</center>
        </div>
        @endif
    <form action="{{ route('image.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <table style="background-color: white">
        <tr align="center">
            <th colspan="2" style="color:rgb(46, 46, 46)"><center><h2>Report Form</h2></center></th>
        </tr>
        <tr>
            <th>Name:</th>
            <td><input type="text" name="name" placeholder="Name" size="35" required></td></tr>
        <tr>
            <th>Phone Number:</th>
            <td><input type="text" name="phoneNo" placeholder="Phone No" required></td></tr>
        <tr>
            <th>Item Name:</th>
            <td><input type="text" name="itemName" placeholder="Item Name" required></td></tr>
        <tr>
            <th>Item Location:</th>
            <td><select name="itemDesc" id="itemDesc">
                    <option selected disabled>Select Item Location</option>
                    <option value="Forecourt">Forecourt</option>
                    <option value="In shop">In shop</option>
                    <option value="Prayer Room">Prayer Room</option>
                    <option value="Toilet">Toilet</option>    
            </select></td></tr>
        <tr>
            <th>Item Image:</th>
            <td><label for="image">Picture: <input type="file" name="image" id="image" class="inputfile" required accept="image/*" capture="camera"></td></tr>
        <tr>
            <th>Select location:</th>
            <td><select name="location" id="" required>
            <option disabled selected>Please select location</option>    
             <option value="Shell, RnR Gurun(U)">Shell, RnR Gurun(U)</option>
             <option value="Shell, RnR Gurun(S)" disabled>Shell, RnR Gurun(S)</option>           
        </select></td></tr>
        <tr align="center"><th colspan="2"><input type="submit" value="Submit"></th></tr>
        </table>
    </form>


</div>
<script src="{{ asset('js/table.js')}}" ></script>
</body>
</html>