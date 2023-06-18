<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index(){
        //get all categories from database where deleted_at is null
        $categories=Category::where('deleted_at',null)->get();
        return view('admin.categories')->with('categories',$categories);
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:categories,name|string',
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
        //generate slug from name_category
        $slug = str_replace(' ', '-', $request->name);
        $path = 'categories/';
        $file = $request->file('image');
        $file_name = time().'_'.$file->getClientOriginalName();
        //upload file
        $upload = $file->move($path, $file_name);
        if($upload){
            //insert categories to database orm create 
            Category::create([
                'name'=>$request->name,
                'slug'=>$slug,
                'description'=>$request->description,
                'image'=>$file_name,
                'user_id'=>session('loginId'),
            ]);

            //retuern message and all data categories in database 
            return response()->json(['status'=>"success inserted categorie",
                'categories'=>Category::all()]
            );
        }
        else{
            return response()->json([
                'status'=>"error inserted categories"
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
        //generate slug from name_edit_category
        $slug = str_replace(' ', '-', $request->name_edit);
        $path = 'categories/';
        $file = $request->file('image_edit');
        //check if image is null
        if($file == null){
            //update categories to database orm create 
            
            Category::where('id',$request->id)->update([
                'name'=>$request->name_edit,
                'slug'=>$slug,
                'description'=>$request->description_edit,
                'user_id'=>session('loginId'),
            ]);

            //retuern message and all data categories in database 
            return response()->json(['status'=>"success updated categories",
                'categories'=>Category::all()]
            );
        }
        else{

            $file_name = time().'_'.$file->getClientOriginalName();
            //upload file
            $upload = $file->move($path, $file_name);
            if($upload){
                //update categories to database orm create 
                Category::where('id',$request->id)->update([
                    'name'=>$request->name_edit,
                    'slug'=>$slug,
                    'description'=>$request->description_edit,
                    'image'=>$file_name,
                    'user_id'=>session('loginId'),
                ]);

                //retuern message and all data categories in database 
                return response()->json(['status'=>"success updated categories",
                    'categories'=>Category::all()]
                );
            }
            else{
                return response()->json([
                    'status'=>"error updated categories"
                ]);
            }
        }
        




       
    }
    public function show(Request $request){
        //get categories by id deleted at is null
        $categories=Category::where('deleted_at',null)->find($request->id);

        
        return response()->json([
            'status'=>"success",
            'categories'=>$categories
        ]);
    }
    public function delete(Request $request){
        $categories=Category::find($request->id);
        //soft delete
        $categories->delete();
        //send status and response data 
        return response()->json([
            'status'=>"success delete categories",
            'categories'=>Category::all()
        ]);
    }
    public function restore(Request $request){
        $categories=Category::withTrashed()->find($request->id);
        //restore soft delete
        $categories->restore();
        return response()->json([
            'status'=>"success restore categories"
        ]);
    }
    public function forceDelete(Request $request){
        $categories=Category::withTrashed()->find($request->id);
        //force delete using for delete data from database
        $categories->forceDelete();
        return response()->json([
            'status'=>"success force delete categories"
        ]);
    }
    public function search(Request $request){
        //get all categories from database where deleted_at is null and name like %$request->search%
        $categories=Category::where('deleted_at',null)->where('name','like','%'.$request->search.'%')->get();
        return response()->json([
            'status'=>"success",
            'categories'=>$categories
        ]);
    }
}
