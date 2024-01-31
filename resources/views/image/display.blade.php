<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/table.css') }} ">
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
        select {
            width: 40%;
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
    <title>All L&F Item</title>
</head>
<body>
<div class="container">
<!-- resources/views/display.blade.php -->
<nav class="nav">
    <ul>
        <li><a href="{{ route('image.admin')}}">Admin</a></li>
        <li><a href="{{ route('image.create')}}">Report Missing Item</a></li>
        <li><a href="{{ route('image.display')}}">Search Missing Item</a></li>
</ul>
</nav>
<h1 align="center">All Lost and Found Item</h1>
<center><form action="{{ route('image.display')}}" method="GET" class="search-form">
    <select name="location" id="location" class="search-select">
        <option selected disabled>Select Location</option>
        <option value="Shell, RnR Gurun(U)">Shell, RnR Gurun(u)</option>
        <option value="Shell, RnR Gurun(S)" disabled>Shell, RnR Gurun(S)</option>
    </select>
    <input type="submit" value="Apply" class="search-button">
</select>
</form></center>
@if(isset($images) && count($images) > 0)
   <table style="background-color:#f0f8ff;" class="table table-bordered table-striped table-responsive-stack" id="tableOne">
        <thead style="background-color: #4CAF50; ">
            <tr>
                <th style="color:white">Item Name</th>
                <th style="color:white">Item Location</th>
                <th style="color:white">Station Location</th>
                <th style="color:white">Date & Time Found</th>
                <th style="color:white">Status</th>
                <th style="color:white">Remark</th>
                <th style="color:white">Latest update</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                <tr>
                    <td>{{ $image->itemName }}</td>
                    <td>{{ $image->itemDesc }}</td>
                    <td>{{ $image->location}} </td>
                    <td>{{ $image->created_at}} </td>
                    <td>{{ $image->status}} </td>
                    <td>{{ $image->claim_by}} </td>
                    <td>{{ $image->updated_at}} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No images available.</p>
@endif
</div></div>
<script src="{{ asset('js/table.js')}}" ></script>
</body>
</html>