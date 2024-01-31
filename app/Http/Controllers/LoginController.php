<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'adminID' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['adminID' => $credentials['adminID'], 'password' => $credentials['password']])) {
            $user = Auth::user();

            session(['admin_location' => $user->admin_location]);
            session(['super_admin' => $user->super_admin]);
            
            return redirect()->intended('/image/index');
        }
        return back()->withErrors(['login' => 'Invalid credentials']);
    }
    public function login()
    {
        return view('image.admin');
    }
    public function adminDisplay(Request $request)
    {
        $adminLocation = session('admin_location');
        $superAdmin = session('super_admin');

        if ($superAdmin){
            $images = Image::query();
            if ($request->has('search')) {
                $searchQuery = $request->query('search');
                $images->where('itemName', 'like', '%'.$searchQuery.'%');
        } 
    }
        else {
            $images = Image::where('location', $adminLocation);

            if ($request->has('search')) {
            $searchQuery = $request->query('search');
            $images->where('itemName', 'like', '%'.$searchQuery.'%');
        }
    }
        $filteredImages = $images->get();

        return view('/image/index', ['images' => $filteredImages, 'superAdmin' => $superAdmin]);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/image/admin'); // Redirect to the login page
    }
    public function deleteItem($id)
    {
    $image = Image::find($id);

    if ($image) {
        // Delete the image
        $image->delete();
        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

    return redirect()->back()->with('error', 'Image not found.');
    }
    public function editAdmin()
    {
    $admin = Auth::user();
    return view('image.edit', compact('admin'));
    }

    public function updateAdmin(Request $request)
    {
    try {
        $request->validate([
            'adminID' => 'required|unique:users,adminID,'.Auth::id(),
            'password' => 'required|min:6',
        ]);

        $user = Auth::user();
        $user->adminID = $request->adminID;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('image.edit')->with('success', 'Admin credentials updated successfully.');
    } catch (ValidationException $e) {
        return redirect()->route('image.edit')->with('fail', $e->getMessage())->withErrors($e->errors());
    } catch (\Exception $e) {
        return redirect()->route('image.edit')->with('fail', 'Failed to update admin credentials. Your password must at least 6 character long.');
    }
}
}
