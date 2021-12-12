<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function imageUpload()
    {
        return view('imageUpload');
    }
    
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = Auth::id();  
     
        $request->image->move(public_path('images'), $imageName);
 
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image', $imageName); 
    }
}