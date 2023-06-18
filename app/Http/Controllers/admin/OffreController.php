<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offre;
//subcategories
use App\Models\Subcategory;

class OffreController extends Controller
{
    //
    public function index(){
        $offres = Offre::all();
        $subcategories = Subcategory::all();
        return view('admin.offre',['offres'=>$offres,'subcategories'=>$subcategories]);
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'subcategory_id' => 'required',
            'percent' => 'required',
        ],[
            'name.required' => 'name is required',
            'image.required' => 'image is required',
            'subcategory_id.required' => 'subcategory_id is required',
            'percent.required' => 'percent is required',
        ]);
        //orm create method
        $slug = str_replace(' ', '-', $request->name);
        $path = 'offres/';
        $file = $request->file('image');
        $file_name = time().'_'.$file->getClientOriginalName();
        //upload file
        $upload = $file->move($path, $file_name);
        if($upload){
            //insert categories to database orm create 
            Offre::create([
                'name'=>$slug,
                'percent'=>$request->percent,
                'sub_category_id'=>$request->subcategory_id,
                'image'=>$file_name,
            ]);

            //retuern message and all data categories in database 
            return response()->json(['status'=>"success inserted offres",
                'offres'=>Offre::all()]
            );
        }
        else{
            return response()->json([
                'status'=>"error inserted offres"
            ]);
        }
        return redirect()->route('admin.offres.index');
    }
    public function edit($id)
    {
        $offre = Offre::find($id);
        return view('admin.offres.edit', compact('offre'));
    }
    public function update(Request $request)
    {
        $id=$request->id;
        $request->validate([
            'name_edit' => 'required',
            "subcategory_id_edit" => "required",
            'percent_edit' => 'required',
        ],[
            'name_edit.required' => 'name is required',
            'subcategory_id_edit.required' => 'subcategory_id is required',
            'percent_edit.required' => 'percent is required',
        ]);
        
        //check if image is not null
        if($request->image_edit != null){
            $path = 'offres/';
            $file = $request->file('image_edit');
            $file_name = time().'_'.$file->getClientOriginalName();
            //upload file
            $upload = $file->move($path, $file_name);
            if($upload){
                //update offre
                $offre = Offre::find($id);
                //orm update method
                $offre->name = $request->name_edit;
                $offre->percent = $request->percent_edit;
                $offre->sub_category_id = $request->subcategory_id_edit;
                $offre->image = $file_name;
                $offre->save();
            }
        }
        else{
            //update offre
            $offre = Offre::find($id);
            $offre->name = $request->name_edit;
            $offre->percent = $request->percent_edit;
            $offre->sub_category_id = $request->subcategory_id_edit;
            $offre->save();
        }
        return response()->json(['status'=>"success updated offre",
            'offres'=>Offre::all()
            ]
        );
    }
    public function destroy($id)
    {
        $offre = Offre::find($id);
        $offre->delete();
        return redirect()->route('admin.offres.index');
    }
    public function restore($id)
    {
        $offre = Offre::withTrashed()->find($id);
        $offre->restore();
        return redirect()->route('admin.offres.index');
    }
    public function forceDelete($id)
    {
        $offre = Offre::withTrashed()->find($id);
        $offre->forceDelete();
        return redirect()->route('admin.offres.index');
    }
    public function show(Request $request){
        //request id from ajax
        $id = $request->id;
        //get offre from database where id = $id
        $offre = Offre::find($id);
        //return offre to ajax
        return response()->json(['offres'=>$offre]);
    }
    public function delete(Request $request){
        $id = $request->id;
        $offre = Offre::find($id);
        $offre->delete();
        return response()->json(['status'=>"success deleted offre",
            'offres'=>Offre::all()
            ]
        );

    }



    public function search(Request $request){
        $search = $request->search;
        $offres = Offre::where('name', 'like', '%'.$search.'%')->get();
        return response()->json(['status'=>'success','offres'=>$offres]);
    }
}
