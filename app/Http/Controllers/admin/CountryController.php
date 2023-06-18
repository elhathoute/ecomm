<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//country 
use App\Models\Country;
class CountryController extends Controller
{
    //
    public function index(){
        //get all brands from database where status = 1 and deleted_at = null
        //countriee where status = 1 and deleted_at = null
        $countries = Country::where('status',1)->get();
        return view('admin.countries')->with('countries',$countries);
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:brands,name|string',
            'image'=>'required|image',
        ],[
            'name.required'=>'name is required',
            'name.unique'=>'name is already exist',
            'name.string'=>'name must be string',
        ]);
        //return response()->json($request->name);
        //generate slug from name_Brands
        $slug = str_replace(' ', '-', $request->name);
        $path = 'countries/';
        $file = $request->file('image');
        $file_name = time().'_'.$file->getClientOriginalName();
        //upload file
        $upload = $file->move($path, $file_name);
        if($upload){
            //insert brands to database orm create 
            Country::create([
                'name'=>$request->name,
                'slug'=>$slug,
                'image'=>$file_name,
                'user_id'=>session('loginId'),
            ]);

            //retuern message and all data Country in database 
            return response()->json(['status'=>"success inserted country",
                'country'=>Country::all()]
            );
        }
        else{
            return response()->json([
                'status'=>"error inserted Country"
            ]);
        }
        
    }
    public function update(Request $request){
        $request->validate([
            'name_edit'=>'required|string',
        ],[
            'name_edit.required'=>'name_edit is required',
            'name_edit.string'=>'name_edit must be string',
        ]);
        //return response()->json($request->name_edit);
        //generate slug from name_edit_Country
        $slug = str_replace(' ', '-', $request->name_edit);
        $path = 'countries/';
        $file = $request->file('image_edit');
        //check if image is null
        if($file == null){
            //update Country to database orm create 
            
            Country::where('id',$request->id)->update([
                'name'=>$request->name_edit,
                'slug'=>$slug,
                'user_id'=>session('loginId'),
            ]);

            //retuern message and all data Country in database 
            return response()->json(['status'=>"success updated country",
                'country'=>Country::all()]
            );
        }
        else{

            $file_name = time().'_'.$file->getClientOriginalName();
            //upload file
            $upload = $file->move($path, $file_name);
            if($upload){
                //update Country to database orm create 
                Country::where('id',$request->id)->update([
                    'name'=>$request->name_edit,
                    'slug'=>$slug,
                    'image'=>$file_name,
                    'user_id'=>session('loginId'),
                ]);

                //retuern message and all data Country in database 
                return response()->json(['status'=>"success updated country",
                    'country'=>Country::all()]
                );
            }
            else{
                return response()->json([
                    'status'=>"error updated Country"
                ]);
            }
        }
        




       
    }
    public function show(Request $request){
        //get Country by id deleted at is null
        $country=Country::where('deleted_at',null)->find($request->id);

        
        return response()->json([
            'status'=>"success",
            'country'=>$country
        ]);
    }
    public function delete(Request $request){
        $country=Country::find($request->id);
        //soft delete
        $country->delete();
        //send status and response data 
        return response()->json([
            'status'=>"success delete country",
            'country'=>Country::all()
        ]);
    }
    public function restore(Request $request){
        $country=Country::withTrashed()->find($request->id);
        //restore soft delete
        $country->restore();
        return response()->json([
            'status'=>"success restore Country"
        ]);
    }
    public function forceDelete(Request $request){
        $country=Country::withTrashed()->find($request->id);
        //force delete
        $country->forceDelete();
        return response()->json([
            'status'=>"success force delete Country"
        ]);
    }
    public function search(Request $request){
        
        //get all Country from database where deleted_at is null and name like %$request->search%
        $country=Country::where('deleted_at',null)->where('name','like','%'.$request->search.'%')->get();
        
        return response()->json([
            'status'=>"success",
            'country'=>$country
        ]);
    }
}
