<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Slider;
//brands
use App\Models\Brands;
use App\Models\Image;
use Cart;

class SliderProductComponent extends Component
{
    use WithPagination;
    
    //sorting
    public $pageSize=15;
    public $orderBy='Default Sorting'; 

    //min max value price
    public $min_price=0;
    public $max_price=1000;
    //store in cart shopping 
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $product=Cart::instance('cart')->content();
        //go to items in variable product
        foreach($product as $item){
            if($item->id==$product_id){
                $rowId=$item->rowId;
                $product=Cart::instance('cart')->get($rowId);
                $product->size=5;
                $product->color=7;
                break;
            }
        }
        //00dd($product);
        session()->flash('success_message','Item added in cart');
        $this->emitTo('cart-icon-component','refreshComponent');
        return redirect()->route('cart');
    }
    //change page size
    public function changePageSize($size){
        $this->pageSize=$size;
    }
    //sorting
    public function changeOrderBy($orderBy){
        $this->orderBy=$orderBy;
    }
    //add to wishlist 
    public function addToWishlist($product_id,$product_name,$product_price){
        Cart::instance('wishlist')
        ->add($product_id,$product_name,1,$product_price)
        ->associate('App\Models\Product');   
        $this->emitTo('wishlist-icon-component','refreshComponent');  
    }
    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id==$product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-icon-component','refreshComponent');
                return;
            }
        }
    }
    //render 
    //get slug from url
    
    public $brands_id;
    public $subcategory_id;
    public $sliders;
    public function mount($slug){
        //transform "-" to " " in slug
        $sliders=Slider::where('title',str_replace('-',' ',$slug))->where('status',1)->first();
        $this->brands_id=$sliders->brand_id;
        $this->subcategory_id=$sliders->subcategory_id;
        
        
    }
    public function render()
    {
        $products =Product::with('tags')
        ->with('brand')
        ->with('sub_category')
        ->where('status',1)
        ->where('brand_id',$this->brands_id)  
        ->where('deleted_at',null)
        ->where('sub_category_id',$this->subcategory_id)->paginate(12);
        
        //images all
        
        $sliders=$this->sliders;
        $images=Image::all();
        $brands=Brands::where('status',1)->where('deleted_at',null)->get();
        $subcategories=SubCategory::where('status',1)->where('deleted_at',null)->get();
        $categories=Category::with('subCategories')->where('status',1)->where('deleted_at',null)->get();
        return view('livewire.slider-product-component',['products'=>$products,'sliders'=>$sliders,'brands'=>$brands,'subcategories'=>$subcategories,'categories'=>$categories,'images'=>$images]);
    }
}
