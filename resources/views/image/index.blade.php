<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"], {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        td img {
            max-width: 100%;
            height: auto;
        }
        .no-images {
            text-align: center;
            margin-top: 20px;
            color: #888;
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
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="button">Logout</button>
    </form>
    <div class="container">
    <form action="{{ '/image/index' }}" method="GET">
        <input type="text" name="search" placeholder="Item name...">
        <input type="submit" value="search">
    </form>
    @if(isset($images) && $images->isNotEmpty())
    <table>
        <thead>
            <tr>
                <th>Report by:</th>
                <th>Item Name: </th>
                <th>Description: </th>
                <th>Image: </th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                    <tr>
                        <td>{{ $image->name }},{{ $image->phoneNo}}</td>
                        <td>{{ $image->itemName }} </td>
                        <td>{{ $image->itemDesc }} </td>
                        <td><img src="{{ asset($image->path) }}" alt="" width="250"> </td>
                        <td>
                            <form action="{{ route('image.delete', ['id' => $image->id]) }}" method="POST" id="deleteForm_{{ $image->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $image->id }})" class="button">Delete</button>
                            </form>
                        </td>
                    </tr>   
            @endforeach
        </tbody>
        @else
            <p class="no-images">No images available.</p>
        @endisset
    </table>
</div>
<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this image?")) {
            // If user confirms, submit the form
            document.getElementById('deleteForm_' + id).submit();
        }
    }
</script>
</body>
</html>
