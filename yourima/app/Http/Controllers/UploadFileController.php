<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;

class UploadFileController extends Controller
{
    public function index()
    {
        return view('picture');
    }

    // public function store(Request $request)
    // {
    //     $file = $request->uploadFile->store('images');
    //     return redirect()->route('/upload');
    // }

    public function store(Request $request)
    {
        if(!$request->file('photo'))
        {
            return redirect()->back()->withErrors([
                'error' => 'you are not upload the image'
            ]);
        }

        $path = $request->file('photo')->store('public');
        $photo = Photo::create([
            'url' => Storage::url($path),
            'hashname' => $request->file('photo')->hashName(),
            'originalname' => $request->file('photo')->getClientOriginalName(),
            'user_seq' => auth()->id()            
        ]);

        return redirect() ->back() ->with([
            'id' => $photo->id,
            'url' => $photo->url,
            'status' => 'Photo has been uploaded'
        ]);
    }
}
