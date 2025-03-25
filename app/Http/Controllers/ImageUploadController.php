<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function showForm()
{
    return view('upload');
}

public function upload(Request $request)
{
    // Validate the image
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    // Create the uploads directory if it doesn't exist
    $uploadPath = public_path('uploads');
    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0755, true);
    }
    // Store the image
    if ($request->file('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move($uploadPath, $imageName);
 
        return redirect()->route('image.form')
            ->with('success', 'Image uploaded successfully!')
            ->with('image', $imageName);
    }
    return redirect()->route('image.form')->with('error', 'Image upload failed.');
}

public function listImages()
{
    $images = glob(public_path('uploads/*.*')); // Retrieve all files in the uploads directory
    $images = array_map(function ($image) {
        return asset('uploads/' . basename($image)); // Convert file paths to URLs
    }, $images);
    return view('images', compact('images'));
}


}
