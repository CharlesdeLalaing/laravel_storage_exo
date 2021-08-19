<?php

namespace App\Http\Controllers;

use App\Models\Uplaodimage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UplaodimageController extends Controller
{
    public function create()
    {
        return view('b-o.pages.upload');
    }

    public function store(Request $request)
    {

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

    public function edit($id){
        $edit = Uplaodimage::find($id);

        return view('b-o.pages.editimage', compact('edit'));
    }

    public function update(Request $request, $id){
        $update = Uplaodimage::find($id);

        request()->validate([
            "image_link" => ['required'],
            "image_name" => ['required', 'max:50'],
            "image_type" => ['nullable']
        ]);


        $name = preg_replace('/\s+/', '', $request->image_name);
        $newImageName = $name . '.' . $request->image_link->extension();

        $type = $request->file('image_link')->getClientMimeType();

        $request->image_link->move(public_path('images'), $newImageName);

        $destination = public_path('images/' . $update->image_link);

        if(File::exists($destination)){
            File::delete($destination);
        }

        $update->image_type = $type;
        $update->image_link = $newImageName;
        $update->image_name = $request->image_name;

        $update->update();
        return redirect('/back-office');
    }

    public function destroy($id)
    {
        $destroy = Uplaodimage::find($id);

        $destination = public_path('images/' . $destroy->image_link);

        if (File::exists($destination)) 
        {
            File::delete($destination);
        }

        $destroy->delete();
        return redirect()->back()->with('status', 'image deleted successuflly');
    }

    public function download($id){
        $download = Uplaodimage::find($id);
        return Storage::download(public_path('images/'.$download->image_link));
    }
}
