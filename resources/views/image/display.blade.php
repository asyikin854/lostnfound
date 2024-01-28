<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
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
        .search-form {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 300px;
            margin-right: 10px;
        }

        .search-button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #45a049;
        }
    </style>
    <title>All L&F Item</title>
</head>
<body>
<!-- resources/views/display.blade.php -->
<nav class="navi">
    <ul>
        <li><a href="{{ route('image.create')}}">Report Missing Item</a></li>
        <li><a href="{{ route('image.display')}}">Search Missing Item</a></li>
</ul>
</nav>
<h1 align="center">Item Name and Description</h1>
<form action="{{ route('image.display')}}" method="GET" class="search-form">
    <select name="location" id="location" class="search-select">
        <option selected disabled>Select Location</option>
        <option value="Taman Perling">Taman Perling</option>
        <option value="Taman Tampoi Utama">Taman Tampoi Utama</option>
    </select>
    <input type="submit" value="Apply" class="search-button">
</select>
</form>
@if(isset($images) && count($images) > 0)
    <center><table>
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Description</th>
                <th>Location</th>
                <th>Date & Time Found</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                <tr>
                    <td>{{ $image->itemName }}</td>
                    <td>{{ $image->itemDesc }}</td>
                    <td>{{ $image->location}} </td>
                    <td>{{ $image->created_at}} </td>
                </tr>
            @endforeach
        </tbody>
    </table></center>
@else
    <p>No images available.</p>
@endif

</body>
</html>