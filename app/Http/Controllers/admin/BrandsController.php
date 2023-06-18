<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//brands
use App\Models\Brands;
class BrandsController extends Controller
{
    //
    public function index(){
        //get all brands from database where status = 1 and deleted_at = null
        $brands = Brands::where('status',1)->get();
        return view('admin.brands')->with('brands',$brands);
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:brands,name|string',
            'description'=>'required|string',
            'image'=>'required|image',
        ],[
            'name.required'=>'name is required',
            'name.unique'=>'name is already exist',
            'name.string'=>'name must be string',
            'description.required'=>'description is required',
            'description.string'=>'description must be string',
        ]);
        //return response()->json($request->name);
        //generate slug from name_Brands
        $slug = str_replace(' ', '-', $request->name);
        $path = 'brands/';
        $file = $request->file('image');
        $file_name = time().'_'.$file->getClientOriginalName();
        //upload file
        $upload = $file->move($path, $file_name);
        if($upload){
            //insert brands to database orm create 
            Brands::create([
                'name'=>$request->name,
                'slug'=>$slug,
                'description'=>$request->description,
                'image'=>$file_name,
                'user_id'=>session('loginId'),
            ]);

            //retuern message and all data brands in database 
            return response()->json(['status'=>"success inserted brand",
                'brands'=>Brands::all()]
            );
        }
        else{
            return response()->json([
                'status'=>"error inserted brands"
            ]);
        }
        
    }
    public function update(Request $request){
        $request->validate([
            'name_edit'=>'required|string',
            'description_edit'=>'required|string',
        ],[
            'name_edit.required'=>'name_edit is required',
            'name_edit.string'=>'name_edit must be string',
            'description_edit.required'=>'description is required',
            'description_edit.string'=>'description must be string',
        ]);
        //return response()->json($request->name_edit);
        //generate slug from name_edit_Brands
        $slug = str_replace(' ', '-', $request->name_edit);
        $path = 'brands/';
        $file = $request->file('image_edit');
        //check if image is null
        if($file == null){
            //update brands to database orm create 
            
            Brands::where('id',$request->id)->update([
                'name'=>$request->name_edit,
                'slug'=>$slug,
                'description'=>$request->description_edit,
                'user_id'=>session('loginId'),
            ]);

            //retuern message and all data brands in database 
            return response()->json(['status'=>"success updated brands",
                'brands'=>Brands::all()]
            );
        }
        else{

            $file_name = time().'_'.$file->getClientOriginalName();
            //upload file
            $upload = $file->move($path, $file_name);
            if($upload){
                //update brands to database orm create 
                Brands::where('id',$request->id)->update([
                    'name'=>$request->name_edit,
                    'slug'=>$slug,
                    'description'=>$request->description_edit,
                    'image'=>$file_name,
                    'user_id'=>session('loginId'),
                ]);

                //retuern message and all data brands in database 
                return response()->json(['status'=>"success updated brands",
                    'brands'=>Brands::all()]
                );
            }
            else{
                return response()->json([
                    'status'=>"error updated brands"
                ]);
            }
        }
        




       
    }
    public function show(Request $request){
        //get brands by id deleted at is null
        $brands=Brands::where('deleted_at',null)->find($request->id);

        
        return response()->json([
            'status'=>"success",
            'brands'=>$brands
        ]);
    }
    public function delete(Request $request){
        $brands=Brands::find($request->id);
        //soft delete
        $brands->delete();
        //send status and response data 
        return response()->json([
            'status'=>"success delete brands",
            'brands'=>Brands::all()
        ]);
    }
    public function restore(Request $request){
        $brands=Brands::withTrashed()->find($request->id);
        //restore soft delete
        $brands->restore();
        return response()->json([
            'status'=>"success restore brands"
        ]);
    }
    public function forceDelete(Request $request){
        $brands=Brands::withTrashed()->find($request->id);
        //force delete
        $brands->forceDelete();
        return response()->json([
            'status'=>"success force delete brands"
        ]);
    }
    public function search(Request $request){
        
        //get all brands from database where deleted_at is null and name like %$request->search%
        $brands=Brands::where('deleted_at',null)->where('name','like','%'.$request->search.'%')->get();
        
        return response()->json([
            'status'=>"success",
            'brands'=>$brands
        ]);
    }
}
