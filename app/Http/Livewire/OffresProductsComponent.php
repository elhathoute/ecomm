<?php

namespace App\Http\Livewire;

use Livewire\Component; 
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Cart;

use App\Models\SizeColor;

use App\Models\Brands;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\Image;
use App\Models\Color;
//offre model 
use App\Models\Offre;

class OffresProductsComponent extends Component
{
   
    public $min;
    public $products;
    public $offres;
    public $sub_id;
    public $percent;
    public $max;
    //sorting
    public $pageSize=15;
    public $orderBy='Default Sorting'; 
    //filtring 
    public  $brands_filter;
    public $sizes_filter;
    public $colors_filter;

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
    //remove from wishlist
    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id==$product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-icon-component','refreshComponent');
                return;
            }
        }
    }

    //i set input date date depart and date fin i want to compare if date depart and date fin is in table offre
    //if date depart and date fin is in table offre i want to get subcategory_id and get products
    //give me orm for check date if between date depart and date fin 
    
    public function mount($offre){
        //get $offre and get subcategory_id and get products
        $this->offres=Offre::where('name',$offre)->first();
        $this->sub_id=$this->offres->sub_category_id;
        $this->percent=$this->offres->percent;
        $this->products=Product::where('sub_category_id',$this->sub_id)->get();
        
        

        

    }
    public function render() 
    {
       
        

        $images = Image::all();
        
        return view('livewire.offres-products-component',['images'=>$images]);
    }
}
