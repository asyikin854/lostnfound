<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/table2.css')}}">
    <style>
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
            background-color: #f72d2d;
        }
        .buttonNav {
            background-color: #ff7300;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            padding: 10px;
            font-size: 16px;
            border: none;
        }
        .buttonNav:hover {
            background-color: #f3870b;
        }
        table input[type="text"] {
            width: 100%;
            padding:10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 13px;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 30%;
            padding:10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 13px;
            margin-bottom: 5px;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 13px;
            margin-bottom: 10px;
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"><path d="M5.93 7.93l3.07 3.07 3.07-3.07 1.41 1.41-4.48 4.48-4.48-4.48 1.41-1.41z" fill="%23333"/></svg>'); /* Add custom dropdown arrow */
            background-repeat: no-repeat;
            background-position: right 10px top 50%;
            background-size: 16px;
        }
    </style>
</head>

<body>
    @if($superAdmin)
    <div class="nav">
        <ul>
            <li>
                <a href="{{ route('register')}}"><button class="buttonNav">Add Admin</button></a></li>
            </li>
            <li>
                <a href="{{ route('image.edit')}} "><button class="buttonNav">Edit Profile</button></a>
            </li>
            <li><form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="button">Logout</button>
            </form></li>
        </ul>
    </div>
    @endif
    @if(!$superAdmin)
    <div class="nav">
        <ul>
            <li>
                <a href="{{ route('image.edit')}} "><button class="buttonNav">Edit Profile</button></a>
            </li>
            <li><form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="button">Logout</button>
            </form></li>
        </ul>
    </div>
    @endif
    <div class="container">
    <form action="{{ '/image/index' }}" method="GET">
        <center><input type="text" name="search" placeholder="Item name...">
        <input type="submit" value="search" class="button" style="background-color: rgb(48, 60, 236)"></center>
    </form>
    @if(isset($images) && $images->isNotEmpty())
    <table style="background-color: #ccfcff;">
        <thead>
            <tr style="background-color: aqua;" > 
                <th>Report by:</th>
                <th>I. Name: </th>
                <th>I. Location: </th>
                <th>Image: </th>
                @if($superAdmin)<th>Action</th>
                <th>Location: </th>@endif
                <th>Status: </th>
                <th>Remark: </th>
                <th>Updated at: </th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                    <tr>
                        <td>{{ $image->name }},{{ $image->phoneNo}}</td>
                        <td>{{ $image->itemName }} </td>
                        <td>{{ $image->itemDesc }} </td>
                        <td><img src="{{ asset($image->path) }}" alt="" width="250"> </td>
                        @if($superAdmin)<td>
                            <form action="{{ route('image.delete', ['id' => $image->id]) }}" method="POST" id="deleteForm_{{ $image->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $image->id }})" class="button">Delete</button>
                            </form>
                        </td>
                        <td>{{ $image->location }} </td>@endif
                        <form action="{{ route('image.admin.store', ['id' => $image->id])}}" method="POST">
                            @csrf
                        <td><select name="status" id="status">
                            <option value="pending" {{ $image->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="claimed" {{ $image->status === 'claimed' ? 'selected' : '' }}>Claimed</option>
                            <option value="unclaimed" {{ $image->status === 'unclaimed' ? 'selected' : '' }}>Unclaimed</option>
                            <option value="lost" {{ $image->status === 'lost' ? 'selected' : '' }}>Lost</option>
                            <option value="stolen" {{ $image->status === 'stolen' ? 'selected' : '' }}>Stolen</option>
                            </select></td>
                        <td><input type="text" value="{{ $image->claim_by }}" name="claim_by" placeholder="Eg.Claimer Name"></td>
                        <td>{{ $image->updated_at }} </td>
                        <td><center><input type="submit" value="Update" class="button" style="background-color: blue"></center></td>
                    </form>
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
