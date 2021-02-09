<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;



class PhotoController extends Controller
{
    public function store(Request $request)
    {
        if(!$request->file('photo')){
            return redirect()->back()->withErrors([
                'error' => 'You did not upload any photo!'
            ]);
        }

        $path = $request->file('photo')->store('public');

        $photo = Photo::create([
            'url' =>Storage::url($path),
            'hashname' => $request->file('photo')->hashName(),
            'originalname' =>$request->file('photo')->getClientOriginalName(),
            'user_seq' => Product::find(1),
            'pro_seq' => User::find(1)
        ]);

        return redirect()->back()->with([
            'id' => $photo->id,
            'status' =>'photo has been uploaded.'
        ]);
    }
}
