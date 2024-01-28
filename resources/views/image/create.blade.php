<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Form</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
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
        table {
            border-collapse: collapse;
            width: 40%;
            margin-bottom: 20px;
        }

        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            text-align: center;
            background-color: #f2f2f2;
        }
        .none {
            color: #333;
            text-decoration: none;

        }

        tr:hover {
            background-color: #f5f5f5;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            margin-bottom: 10px;
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

        label[for="image"] {
            background-color: #4b41db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        label[for="image"]:hover {
            background-color: #7620d8;
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


    </style>
</head>
<body>
    <a class="none" href="{{ route('image.admin')}}">Admin</a>
    <nav class="navi">
    <ul>
        <li><a href="{{ route('image.create')}}">Report Missing Item</a></li>
        <li><a href="{{ route('image.display')}}">Search Missing Item</a></li>
    </ul>
    </nav>
    <form action="{{ route('image.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <center><table style="border-spacing:10px">
        <tr>
            <th colspan="2"><h3>Report Form</h3></th>
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
            <th>Description:</th>
            <td><input type="text" name="itemDesc" placeholder="Ex: Jumpa di tandas lelaki" size="40" required></td></tr>
        <tr>
            <th>Item Image:</th>
            <td><label for="image">Select Image<input type="file" name="image" id="image" class="inputfile" required></td></tr>
        <tr>
            <th>Select location:</th>
            <td><select name="location" id="" required>
            <option disabled selected>Please select location</option>    
             <option value="Taman Perling">Taman Perling</option>
             <option value="Taman Tampoi Utama">Taman Tampoi Utama</option>           
        </select></td></tr>
        <tr><th align="center" colspan="2"><input type="submit" value="Submit"></th></tr>
        </table></center>
    </form>
    @if(session('success'))
    <center><div class="alert alert-success">
        {{ session('success') }}
    </div></center>
@endif

</body>
</html>