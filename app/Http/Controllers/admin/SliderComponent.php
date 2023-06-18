<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Brands;

class SliderComponent extends Controller
{
    //
    public function index(){
        $sliders = Slider::with('subcategory','brand')->where('status',1)->get();
        $subcategories = SubCategory::where('status',1)->get();
        $brands = Brands::where('status',1)->get();
        return view('admin.sliders',['sliders'=>$sliders,'subcategories'=>$subcategories,'brands'=>$brands]);
    }
    //store 
    public function store(Request $request){
        //validations 
        
        $this->validate(request(),[
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
            'colors'=>'required',
            'subcategory_id'=>'required',
            'brand_id'=>'required',
        ]);
        //image upload
        $path = 'sliders/';
        $file = $request->file('image');
        $file_name = time().'_'.$file->getClientOriginalName();
        //upload file
        $upload = $file->move($path, $file_name);
        if($upload){
            //save in database using orm 
            Slider::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'image'=>$file_name,
                'colors'=>$request->colors,
                'subcategory_id'=>$request->subcategory_id,
                'brand_id'=>$request->brand_id,
            ]);
            return response()->json([
                'status'=>"success inserted slider",
                'sliders'=>Slider::where('status',1)->get()
            ]);
        }
        else{
            return response()->json([
                'status'=>"error inserted slider"
            ]);
        }
    }

    //show 
    public function show(Request $request){
        $slider = Slider::find($request->id);
        return response()->json([
            'slider'=>$slider
        ]);
    }

    //update 
    public function update(Request $request){
        //return $request->all();
        //validations 
        $this->validate(request(),[
            'title_edit'=>'required',
            'description_edit'=>'required',
            'colors_edit'=>'required',
            'subcategory_id_edit'=>'required',
            'brand_id_edit'=>'required',
        ]);
        //image upload
        //check if request has image
        if($request->hasFile('image_edit')){
            $path = 'sliders/';
            $file = $request->file('image_edit');
            $file_name = time().'_'.$file->getClientOriginalName();
            //upload file
            $upload = $file->move($path, $file_name);
            if($upload){
                //save in database using orm 
                Slider::where('id',$request->slide)->update([
                    'title'=>$request->title_edit,
                    'description'=>$request->description_edit,
                    'image'=>$file_name,
                    'colors'=>$request->colors_edit,
                    'subcategory_id'=>$request->subcategory_id_edit,
                    'brand_id'=>$request->brand_id_edit,
                ]);
                return response()->json([
                    'status'=>"success updated slider",
                    'sliders'=>Slider::where('status',1)->get()
                ]);
            }
            else{
                return response()->json([
                    'status'=>"error updated slider"
                ]);
            }
        }
        else{
            Slider::where('id',$request->slide)->update([
                'title'=>$request->title_edit,
                'description'=>$request->description_edit,
                'colors'=>$request->colors_edit,
                'subcategory_id'=>$request->subcategory_id_edit,
                'brand_id'=>$request->brand_id_edit,
            ]);
            return response()->json([
                'status'=>"success updated slider",
                'sliders'=>Slider::where('status',1)->get()
            ]);
        }
    }

    //delete 
    public function delete(Request $request){
        //using method soft delete and not doing status = 0
        Slider::where('id',$request->id)->delete();
        return response()->json([
            'status'=>"success deleted slider",
            'sliders'=>Slider::where('status',1)->get()
        ]);
    }
}
