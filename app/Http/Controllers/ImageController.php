<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function create()
    {
        return view('image.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phoneNo' => 'required|string',
            'itemName' => 'required',
            'itemDesc' => 'required',
            'location' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $image = new Image();
        $image->filename = $imageName;
        $image->path = 'images/' . $imageName;
        $image->name = $request->name;
        $image->phoneNo = $request->phoneNo;
        $image->itemName = $request->itemName;
        $image->itemDesc = $request->itemDesc;
        $image->location = $request->location;
        $image->save();

        return redirect('/image/create')->with('success', 'Thank You! Your report has been submit.');
    }
    public function display(Request $request)
    {
        $images = Image::query(); // Start with all images
    
        if ($request->has('location')) {
            $searchQuery = $request->query('location');
            $images = $images->where('location', $searchQuery); // Assign the result back to $images
        }
        
        // Retrieve the filtered images
        $filteredImages = $images->get();
    
        return view('image.display', ['images' => $filteredImages]);
    }
    public function adminStore(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required',
            'claim_by' => 'required',
        ]);
        $image = Image::findOrFail($id);

            // Check if $image is not null before accessing its properties
            $image->status = $request->status; // Use the null coalescing operator to handle null values
            $image->claim_by = $request->claim_by;
            $image->save();
            // Handle the case where $image is null, e.g., return an error response or log a message
            return redirect('/image/index')->with('success', 'Updated Successfully');
        }

        

    

}

