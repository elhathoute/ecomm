<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\ProductSize;
use App\Models\ProductTag;
use App\Models\User;
use App\Models\SizeColor;
use App\Models\Country;
use App\Models\Brands;
//use pagination
use Illuminate\Pagination\Paginator;
use App\Models\City;
//get model producttag and productsize

use App\Models\Color;
use App\Models\Size;
use App\Models\Tag;
use App\Models\Image;
//order


class ProductController extends Controller{
    public function index(){
        //
        $products=Product::with('sizes','tags','sub_category','brand','country')->orderBy('id','desc')->paginate(10);
        //get $products with paginate
        // $products=Product::with('sizes','tags','sub_category','brand','country')->orderBy('id','desc')->paginate(5);
        
        $images=Image::all();
        $subcategories=Subcategory::where('status',1)->whereNull('deleted_at')->get();
        $countries=Country::where('status',1)->whereNull('deleted_at')->get();
        $brands=Brands::where('status',1)->whereNull('deleted_at')->get();
        $cities=City::where('status',1)->whereNull('deleted_at')->get();
        $colors=Color::where('status',1)->whereNull('deleted_at')->get();
        $sizes=Size::where('status',1)->whereNull('deleted_at')->get();
        $tags=Tag::where('status',1)->whereNull('deleted_at')->get();
        return view('admin.products',compact('products','subcategories','countries','brands','cities','colors','sizes','tags','images'));
    }
    public function store(Request $request){ 
        //return response()->json($request->image[0]);
        
        $request->validate([
            'name'=>'required|string',
            'quantity_total'=>'required|numeric',
            'description'=>'required|string',
            'sizes'=>'required|array',
            'tag'=>'required|array',
            'image'=>'required|array',
            'sub_category_id'=>'required|numeric',
            'made_in'=>'required|numeric',
            'brand_id'=>'required|numeric',
            'r_price'=>'required|numeric',
            's_price'=>'required|numeric',
            'sku'=>'required|string',
            'barcode'=>'required|string',
        ],[
            'name.required'=>'name is required',
            'name.string'=>'name must be string',
            'quantity_total.required'=>'quantity total is required',
            'quantity_total.numeric'=>'quantity total must be numeric',
            'description.required'=>'description is required',
            'description.string'=>'description must be string',
            'sizes.required'=>'size is required',
            'sizes.array'=>'size must be array',
            'tag.required'=>'tag is required',
            'tag.array'=>'tag must be array',
            'image.required'=>'image is required',
            'image.array'=>'image must be array',
            
            'sub_category_id.required'=>'sub category id is required',
            'sub_category_id.numeric'=>'sub category id must be numeric',
            'made_in.required'=>'made in is required',
            'made_in.numeric'=>'made in must be numeric',
            'brand_id.required'=>'brand id is required',
            'brand_id.numeric'=>'brand id must be numeric',
            'r_price.required'=>'r price is required',
            'r_price.numeric'=>'r price must be numeric',
            's_price.required'=>'s price is required',
            's_price.numeric'=>'s price must be numeric',
            'sku.required'=>'sku is required',
            'sku.string'=>'sku must be string',
            'barcode.required'=>'barcode is required',
            'barcode.string'=>'barcode must be string',
        ]);
        //create slug 
        $slug=str_replace(' ','-',$request->name);
        $product=Product::create([
            'name'=>$request->name,
            'slug'=>$slug,
            //img

            'quantity_total'=>$request->quantity_total,
            'description'=>$request->description,
            'short_description'=>$request->short_description,
            'sub_category_id'=>$request->sub_category_id,
            'made_in'=>$request->made_in,
            'brand_id'=>$request->brand_id,
            'img_id'=>$request->image[0],
            'img2_id'=>$request->image[1],
            'img3_id'=>$request->image[2],
            'img4_id'=>$request->image[3],
            'regular_price'=>$request->r_price,
            'sale_price'=>$request->s_price,
            'SKU'=>$request->sku,
            'barcode'=>$request->barcode,
        ]);
        $product_id=$product->id;
        $data=[];
        $arr=[];  
        foreach($request->sizes as $size){
            //$data['size_id']=parseInt($size['size_id']);
            $product->sizes()->attach($size['size_id']);
            $arr=$size;
        }
        //return response()->json($arr);
        foreach($request->tag as $tag){
            Tag::create(['name'=>$tag]);
            $tag_id=Tag::where('name',$tag)->first()->id;
            $product->tags()->attach($tag_id);
        }
        
        $result='';
        foreach($request->sizes as $size){
            foreach($size['colors'] as $color){
                $sizecolor=new SizeColor();
                $sizecolor->size_id=$size['size_id'];
                $sizecolor->color_id=$color['color_id'];
                $sizecolor->quantity=$color['quantity'];
                $sizecolor->product_id=$product_id;
                $sizecolor->save();
                $result=$color['color_id'];
            }
        }
        return response()->json(['status'=>"success inserted products",'data'=>$request->all()]);
    }
    public function update(Request $request){
        $request->validate([
            'name'=>'required|string',
            'quantity_total'=>'required|numeric',
            'description'=>'required|string',
            'sizes'=>'required|array',
            'tag'=>'required|array',
            'image'=>'required|array',
            'sub_category_id'=>'required|numeric',
            'made_in'=>'required|numeric',
            'brand_id'=>'required|numeric',
            'r_price'=>'required|numeric',
            's_price'=>'required|numeric',
            'sku'=>'required|string',
            'barcode'=>'required|string',
        ],[
            'name.required'=>'name is required',
            'name.string'=>'name must be string',
            'quantity_total.required'=>'quantity total is required',
            'quantity_total.numeric'=>'quantity total must be numeric',
            'description.required'=>'description is required',
            'description.string'=>'description must be string',
            'sizes.required'=>'size is required',
            'sizes.array'=>'size must be array',
            'tag.required'=>'tag is required',
            'tag.array'=>'tag must be array',
            'image.required'=>'image is required',
            'image.array'=>'image must be array',
            
            'sub_category_id.required'=>'sub category id is required',
            'sub_category_id.numeric'=>'sub category id must be numeric',
            'made_in.required'=>'made in is required',
            'made_in.numeric'=>'made in must be numeric',
            'brand_id.required'=>'brand id is required',
            'brand_id.numeric'=>'brand id must be numeric',
            'r_price.required'=>'r price is required',
            'r_price.numeric'=>'r price must be numeric',
            's_price.required'=>'s price is required',
            's_price.numeric'=>'s price must be numeric',
            'sku.required'=>'sku is required',
            'sku.string'=>'sku must be string',
            'barcode.required'=>'barcode is required',
            'barcode.string'=>'barcode must be string',
        ]);
        $product=Product::find($request->id);
        $product->update([
            'name'=>$request->name,
            'quantity_total'=>$request->quantity_total,
            'description'=>$request->description,
            'subcategory_id'=>$request->sub_category_id,
            'made_in'=>$request->made_in,
            'brand_id'=>$request->brand_id,
            'regular_price'=>$request->r_price,
            'sale_price'=>$request->s_price
        ]);
        $product_id=$product->id;
        $data=[];
        $arr=[];
        $product->sizes()->detach();
        foreach($request->sizes as $size){
            //$data['size_id']=parseInt($size['size_id']);
            $product->sizes()->attach($size['size_id']);
            $arr=$size;
        }
        //$product->tags()->detach();
        foreach($request->tag as $tag){
            Tag::create(['name'=>$tag]);
            $tag_id=Tag::where('name',$tag)->first()->id;
            $product->tags()->attach($tag_id);
        }
        //upload image
        $image_name=$request->image[0];
        //$request->image[0]->move(public_path('images'),$image_name);
        //return response()->json(['status'=>"success insert product",'data'=>$image_name]);
        $image_db=new Image();
        $image_db->img=$image_name;
        $image_db->save();
        $image_id=Image::where('img',$image_name)->first()->id;
        $product=Product::find($product_id);
        $product->update([
            'img_id'=>$image_id,
        ]);
        $result='';
        foreach($request->sizes as $size){
            foreach($size['colors'] as $color){
                $sizecolor=new SizeColor();
                $sizecolor->size_id=$size['size_id'];
                $sizecolor->color_id=$color['color_id'];
                $sizecolor->quantity=$color['quantity'];
                $sizecolor->save();
                $result=$color['color_id'];
            }
        }
        return response()->json(['status'=>"success insert product",'data'=>$result]);

    }
    public function delete(Request $request){
        $product=Product::find(request()->id);
        //$product->sizes()->detach();
        //$product->tags()->detach();
        $product->delete();
        return response()->json(['status'=>"success delete product"]);
    }
    public function show(Request $request){
        $id=$request->id;
        $product=Product::find($id);
        $size=$product->sizes;
        $color=SizeColor::where('product_id',$id)->get();
        $tag=ProductTag::where('product_id',$id)->get();
        $image=Image::find($product->img_id);
        $brand=Brands::find($product->brand_id);
        $subcategory=SubCategory::find($product->sub_category_id);
        $country=Country::find($product->made_in);
        return response()->json(['status'=>"success show product",
            'product'=>$product,
            'size'=>$size,
            'color'=>$color,
            'tag'=>$tag,
            'image'=>$image,
            'brand'=>$brand,
            'subcategory'=>$subcategory,
            'country'=>$country
        ]);
    }
}
