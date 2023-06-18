<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
class SubCategoryController extends Controller
{
    //
    public function index(){
        //get all categories from database where deleted_at is null and status is 1
        $categories = Category::where('status',1)->whereNull('deleted_at')->get();
        //get all subategories from database where deleted_at is null and status 1 and category_id where category_id is null deteted_at 
        $subcategories = SubCategory::where('status',1)->whereNull('deleted_at')->get();
        return view('admin.subcategories',compact('categories','subcategories'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:categories,name|string',
            'description'=>'required|string',
            'image'=>'required|image',
            'category_id'=>'required|integer',
        ],[
            'name.required'=>'name is required',
            'name.unique'=>'name is already exist',
            'name.string'=>'name must be string',
            'description.required'=>'description is required',
            'description.string'=>'description must be string',
            'image.required'=>'image is required',
            'image.image'=>'image must be image',
            'category_id.required'=>'category is required',
            'category_id.integer'=>'category must be integer',
        ]);
        //return response()->json($request->name);
        //generate slug from name_category
        $slug = str_replace(' ', '-', $request->name);
        $path = 'subcategories/';
        $file = $request->file('image');
        $file_name = time().'_'.$file->getClientOriginalName();
        //upload file
        $upload = $file->move($path, $file_name);
        if($upload){
            //insert categories to database orm create 
                SubCategory::create([
                'name'=>$request->name,
                'slug'=>$slug,
                'description'=>$request->description,
                'image'=>$file_name,
                'category_id'=>$request->category_id,
                'user_id'=>session('loginId'),
            ]);

            //retuern message and all data categories in database 
            return response()->json(['status'=>"success inserted subcategories",
                'subcategories'=>SubCategory::all()]
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
            //category_id_edit is required
            'category_id_edit'=>'required|integer',
        ],[
            'name_edit.required'=>'name_edit is required',
            'name_edit.string'=>'name_edit must be string',
            'description_edit.required'=>'description is required',
            'description_edit.string'=>'description must be string',
            'category_id_edit.required'=>'category is required',
            'category_id_edit.integer'=>'category must be integer',
        ]);
        //return response()->json($request->name_edit);
        //generate slug from name_edit_category
        $slug = str_replace(' ', '-', $request->name_edit);
        $path = 'subcategories/';
        $file = $request->file('image_edit');
        //check if image is null
        if($file == null){
            //update categories to database orm create 
            
            SubCategory::where('id',$request->id)->update([
                'name'=>$request->name_edit,
                'slug'=>$slug,
                'description'=>$request->description_edit,
                'user_id'=>session('loginId'),
                'category_id'=>$request->category_id_edit,
            ]);

            //retuern message and all data categories in database 
            return response()->json(['status'=>"success updated subcategories",
                'subcategories'=>SubCategory::all()]
            );
        }
        else{

            $file_name = time().'_'.$file->getClientOriginalName();
            //upload file
            $upload = $file->move($path, $file_name);
            if($upload){
                //update categories to database orm create 
                SubCategory::where('id',$request->id)->update([
                    'name'=>$request->name_edit,
                    'slug'=>$slug,
                    'description'=>$request->description_edit,
                    'image'=>$file_name,
                    'user_id'=>session('loginId'),
                    'category_id'=>$request->category_id_edit,
                ]);

                //retuern message and all data categories in database 
                return response()->json(['status'=>"success updated subcategories",
                    'subcategories'=>SubCategory::all()]
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
        //get subcategories from database where id is $request->id and deleted_at is null and status is 1
        $subcategories=SubCategory::where('id',$request->id)->where('status',1)->whereNull('deleted_at')->first();
        //send status and response data
        return response()->json([
            'status'=>"success",
            'subcategories'=>$subcategories
        ]);
    }
    public function delete(Request $request){
        //get subcategories from database where id is $request->id
        $subcategories=SubCategory::find($request->id);
        //delete subcategories
        $subcategories->delete();
        //send status and get all subcategoris from database where deleted_at is null and status is 1
        return response()->json([
            'status'=>"success delete subcategories",
            'subcategories'=>SubCategory::where('status',1)->whereNull('deleted_at')->get()
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
        //force delete
        $categories->forceDelete();
        return response()->json([
            'status'=>"success force delete categories"
        ]);
    }
    public function search(Request $request){
        //get all categories from database where deleted_at is null and name like %$request->search%
        $subcategories=SubCategory::where('deleted_at',null)->where('name','like','%'.$request->search.'%')->get();
        return response()->json([
            'status'=>"success",
            'subcategories'=>$subcategories
        ]);
    }
}
