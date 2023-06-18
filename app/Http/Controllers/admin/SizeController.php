<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//size 
use App\Models\Size;
class SizeController extends Controller
{
    //
    public function index(){
        //get all sizes from database where status = 1 and deleted_at = null
        $sizes = Size::where('status',1)->get();
        return view('admin.sizes')->with('sizes',$sizes);
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|unique:sizes,name|string',
        ],[
            'name.required'=>'name is required',
            'name.unique'=>'name is already exist',
            'name.string'=>'name must be string',
        ],[
            'name.required'=>'name is required',
            'name.unique'=>'name is already exist',
            'name.string'=>'name must be string',
        ]);
            Size::create([
                'name'=>$request->name,
                'user_id'=>session('loginId'),
            ]);
            return response()->json(['status'=>"success inserted size",
                'size'=>Size::all()]
            );
        
        
    }
    public function update(Request $request){
        $request->validate([
            'name_edit'=>'required|string',
        ],[
            'name_edit.required'=>'name_edit is required',
            'name_edit.string'=>'name_edit must be string',
        ]);
        Size::where('id',$request->id)->update([
                'name'=>$request->name_edit,
                'user_id'=>session('loginId'),
            ]);
        return response()->json(['status'=>"success updated size",'size'=>Size::all()]);
    }
    public function show(Request $request){
        //get city where id = $request->id status = 1 and deleted_at = null
        $size=Size::where('id',$request->id)->where('status',1)->first();
        return response()->json([
            'status'=>"success",
            'size'=>$size
        ]);
    }
    public function delete(Request $request){
        $size=Size::find($request->id);
        //soft delete
        $size->delete();
        //send status and response data 
        return response()->json([
            'status'=>"success delete size",
            'size'=>Size::all()
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
        $size=Size::where('deleted_at',null)->where('name','like','%'.$request->search.'%')->get();
        
        return response()->json([
            'status'=>"success",
            'size'=>$size
        ]);
    }
}
