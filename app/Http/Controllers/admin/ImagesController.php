<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//model image
use App\Models\Image;
class ImagesController extends Controller
{
    //
    //
    public function index(){
        //get all images
        $images = Image::all();
        return view('admin.images.index',compact('images'));
    }
    //store 
    public function store(Request $request){
        //validate
        $path = 'products/';
        $file = $request->file('image1');
        $file_name1 = time().'_'.$file->getClientOriginalName();
        $upload = $file->move($path, $file_name1);
        $file2 = $request->file('image2');
        $file_name2 = time().'_'.$file2->getClientOriginalName();
        $upload2 = $file2->move($path, $file_name2);
        $file3 = $request->file('image3');
        $file_name3 = time().'_'.$file3->getClientOriginalName();
        $upload3 = $file3->move($path, $file_name3);
        $file4 = $request->file('image4');
        $file_name4 = time().'_'.$file4->getClientOriginalName();
        $upload4 = $file4->move($path, $file_name4);

        $images=[];
        $imagess=Image::create(['img'=>$file_name1]);
        //set id images in this array 
        $images[]=$imagess->id;
        $imagess=Image::create(['img'=>$file_name2]);
        $images[]=$imagess->id;
        $imagess=Image::create(['img'=>$file_name3]);
        $images[]=$imagess->id;
        $imagess=Image::create(['img'=>$file_name4]);
        $images[]=$imagess->id;

        return response()->json(['success'=>'images uploaded successfully','images'=>$images]);

    }
}
