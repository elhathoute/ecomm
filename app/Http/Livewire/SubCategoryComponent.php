<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Brands;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\SizeColor;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use Cart;
class SubCategoryComponent extends Component{
    use WithPagination;
    //sorting
    public $pageSize=15;
    public $orderBy='Default Sorting'; 
    public $slug;

    public  $brands_filter;
    public $sizes_filter;
    public $colors_filter;
    //min max value price
    public $min_price=0;
    public $max_price=1000;
    public $min;
    public $max;

    //mount 
    public function mount($slug){
        $this->slug=$slug;
        $this->min=0;
        $this->max=10000;
    }

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


    public function render(){
        $subbcategory=SubCategory::where('slug',$this->slug)->first();
        $subcategory_id=$subbcategory->id;
        $subcategory_name=$subbcategory->name;
        //get all  
        
        $images = Image::all();
        if($this->orderBy=='Date'){
            $products =Product::where('sub_category_id',$subcategory_id)->with('tags')->where('status',1)->orderBy('created_at','DESC')->paginate($this->pageSize);
        }
        if($this->orderBy=='Price'){
            $products =Product::where('sub_category_id',$subcategory_id)->with('tags')->where('status',1)->orderBy('sale_price','ASC')->paginate($this->pageSize);
        }
        if($this->orderBy=='Price-High-Low'){
            $products =Product::where('sub_category_id',$subcategory_id)->with('tags')->where('status',1)->orderBy('sale_price','DESC')->paginate($this->pageSize);
        }
        if($this->orderBy=='A-Z'){
            $products =Product::where('sub_category_id',$subcategory_id)->with('tags')->where('status',1)->orderBy('name','ASC')->paginate($this->pageSize);
        }
        if($this->orderBy=='Z-A'){
            $products =Product::where('sub_category_id',$subcategory_id)->with('tags')->where('status',1)->orderBy('name','DESC')->paginate($this->pageSize);
        }
        $products =Product::where('sub_category_id',$subcategory_id)->with('tags')->where('status',1)
        ->whereBetween('sale_price',[$this->min_price,$this->max_price])
        ->paginate($this->pageSize);
        if($this->brands_filter){
            $products =Product::with('tags')
            ->whereBetween('sale_price',[$this->min_price,$this->max_price])
            ->where('status',1)->where('brand_id',$this->brands_filter)->paginate($this->pageSize);
        }
        if($this->sizes_filter){
            $product_size=ProductSize::all();
            $products =Product::with('tags')
            ->whereBetween('sale_price',[$this->min_price,$this->max_price])
            ->where('status',1)
            ->whereHas('sizes',function($query){
                $query->where('size_id',$this->sizes_filter);
            })->paginate($this->pageSize);
        }

        if($this->colors_filter){
            //get all product_id from table size_colors where color_id = $this->colors_filter
            $product_size_color=SizeColor::where('color_id',$this->colors_filter)
            ->orderBy('product_id','DESC')
            ->get();
            $products_id=array();
            foreach($product_size_color as $item){
                array_push($products_id,$item->product_id);
            }
            $products =Product::with('tags')
            ->whereBetween('sale_price',[$this->min,$this->max])
            ->where('status',1)
            ->whereIn('id',$products_id)->paginate($this->pageSize);

           
        }
        $categories=Category::with('subcategories')->where('status',1)->whereNull('deleted_at')->orderBy('name','ASC')->get();
        $brands=Brands::where('status',1)->whereNull('deleted_at')->orderBy('name','ASC')->get();
        //get all size 
        $sizes=Size::where('status',1)->whereNull('deleted_at')->orderBy('name','ASC')->get();
        //get all colors 
        $colors=Color::where('status',1)->whereNull('deleted_at')->orderBy('name','ASC')->get();
        $val_min=$this->min;
        $val_max=$this->max;
        return view('livewire.sub-category-component',[
            'products'=>$products,
            'categories'=>$categories,
            'subcategory_name'=>$subcategory_name,
            'images'=>$images,
            'min_price'=>$this->min_price, 
            'max_price'=>$this->max_price,
            'brands'=>$brands,
            'sizes'=>$sizes, 
            
            'colors'=>$colors,
            'min'=>$val_min ,
            'max'=>$val_max

        ]);
    }
}
