<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//city 
use App\Models\City;

//country
use App\Models\Country;

class CityController extends Controller
{
    //
    public function index(){
        //get all brands from database where status = 1 and deleted_at = null
        //countriee where status = 1 and deleted_at = null
        //city 
        $cities = City::where('status',1)->get();
        $countries = Country::where('status',1)->get();
        return view('admin.cities')->with('cities',$cities)->with('countries',$countries);
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:brands,name|string',
            'country_id'=>'required',
        ],[
            'name.required'=>'name is required',
            'name.unique'=>'name is already exist',
            'name.string'=>'name must be string',
            'country_id.required'=>'country_id is required',
        ]);
        //return response()->json($request->name);
        //generate slug from name_Brands
        $slug = str_replace(' ', '-', $request->name);
            //insert brands to database orm create 
            City::create([
                'name'=>$request->name,
                'slug'=>$slug,
                'country_id'=>$request->country_id,
                'user_id'=>session('loginId'),
            ]);
            return response()->json(['status'=>"success inserted city",
                'city'=>City::all()]
            );
        
        
    }
    public function update(Request $request){
        $request->validate([
            'name_edit'=>'required|string',
            'country_id_edit'=>'required',
        ],[
            'name_edit.required'=>'name_edit is required',
            'name_edit.string'=>'name_edit must be string',
            'country_id_edit.required'=>'country_id_edit is required',
        ]);
        //return response()->json($request->name_edit);
        //generate slug from name_edit_Country
        $slug = str_replace(' ', '-', $request->name_edit);
        City::where('id',$request->id)->update([
                'name'=>$request->name_edit,
                'slug'=>$slug,
                'country_id'=>$request->country_id_edit,
                'user_id'=>session('loginId'),
            ]);

            //retuern message and all data Country in database 
            return response()->json(['status'=>"success updated city",
                'city'=>City::all()]
            );



       
    }
    public function show(Request $request){
        //get city where id = $request->id status = 1 and deleted_at = null
        $city=City::where('id',$request->id)->where('status',1)->first();
        


        
        return response()->json([
            'status'=>"success",
            'city'=>$city
        ]);
    }
    public function delete(Request $request){
        $city=City::find($request->id);
        //soft delete
        $city->delete();
        //send status and response data 
        return response()->json([
            'status'=>"success delete city",
            'city'=>City::all()
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
        $city=City::where('deleted_at',null)->where('name','like','%'.$request->search.'%')->get();
        
        return response()->json([
            'status'=>"success",
            'city'=>$city
        ]);
    }
}
