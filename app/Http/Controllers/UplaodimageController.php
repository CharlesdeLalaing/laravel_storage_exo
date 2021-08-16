<?php

namespace App\Http\Controllers;

use App\Models\Uplaodimage;
use Illuminate\Http\Request;

class UplaodimageController extends Controller
{
    public function create() {
        return view('b-o.pages.upload');
    }
    
    public function store(Request $request) {

        request()->validate([
            "image_link" => ['required'],
            "image_name" => ['required', 'max:50'],
            "image_type" => ['nullable']
        ]);

        $newImageName = $request->image_name . '.' . $request->image_link->extension();

        $type = $request->file('image_link')->getClientMimeType();

        $request->image_link->move(public_path('images'), $newImageName);

        $store = new Uplaodimage;
        $store->image_type = $type;
        $store->image_link = $newImageName;
        $store->image_name = $request->image_name;

        $store->save();
        return redirect('/back-office');

    }
}
