<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//color 
use App\Models\Color;

class ColorController extends Controller
{
    //
    public function index(){
        //get all sizes from database where status = 1 and deleted_at = null
        //get all colors from database where status = 1 and deleted_at is null
        $colors=Color::where('deleted_at',null)->where('status',1)->get();
        return view('admin.colors')->with('colors',$colors);
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:colors,name|string',
            "code"=>"required",
        ],[
            'name.required'=>'name is required',
            'name.unique'=>'name is already exist',
            'name.string'=>'name must be string',
            "code.required"=>"code is required",
            "code.unique"=>"code is already exist",
        ]);
            Color::create([
                'name'=>$request->name,
                'code'=>$request->code,
                'user_id'=>session('loginId'),
            ]);
            return response()->json(['status'=>"success inserted color",
                'color'=>Color::all()]
            );
        
        
    }
    public function update(Request $request){
        $request->validate([
            'name_edit'=>'required|string',
            "code_edit"=>"required",
        ],[
            'name_edit.required'=>'name_edit is required',
            'name_edit.string'=>'name_edit must be string',
            "code_edit.required"=>"code_edit is required",
        ]);
        Color::where('id',$request->id)->update([
                'name'=>$request->name_edit,
                'code'=>$request->code_edit,
                'user_id'=>session('loginId'),
            ]);
        return response()->json(['status'=>"success updated color",'color'=>Color::all()]);
    }
    public function show(Request $request){
        //get city where id = $request->id status = 1 and deleted_at = null
        $color=Color::where('id',$request->id)->where('status',1)->first();
        return response()->json([
            'status'=>"success",
            'color'=>$color 
        ]);
    }
    public function delete(Request $request){
        $color=Color::find($request->id);
        //soft delete
        $color->delete();
        //send status and response data 
        return response()->json([
            'status'=>"success delete color",
            'color'=>Color::all()
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
        $color=Color::where('deleted_at',null)->where('name','like','%'.$request->search.'%')->get();
        
        return response()->json([
            'status'=>"success",
            'color'=>$color 
        ]);
    }
}
