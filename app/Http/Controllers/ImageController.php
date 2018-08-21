<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        //  type="file"  name="image"   имя_папки    имя диска
        $path = $request->file('image')->store('uploads', 'public');

        return view('welcom', compact('path'));
    }
}
