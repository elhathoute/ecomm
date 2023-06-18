<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\User;
use App\Models\Product;
use Cart;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\Sale;
use App\Models\Image;
//offre 
use App\Models\Offre;
class HomeComponent extends Component{
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
    ///////////////////////////////////////
    public function addToWishlist($product_id,$product_name,$product_price){
        Cart::instance('wishlist')
        ->add($product_id,$product_name,1,$product_price)
        ->associate('App\Models\Product');   
        $this->emitTo('wishlist-icon-component','refreshComponent');  
    }
    ///////////////////////////////////////
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
    //////////////////////////////////////
    //get all variable insdie session 
    public function render(){
        //$this->user=User::find(session('loginId'));
        $sliders=Slider::where('status',1)->get();
        //slider 2
        $lproducts=Product::where('status',1)->whereNull('deleted_at')
        ->orderBy('created_at','DESC')->get()->take(8); 
        //slider 3 shoes
        $products_shoes=Product::where('sub_category_id',8)
        ->whereNull('deleted_at')->orderBy('created_at','DESC')->get()->take(10);
        //slider 4 cousine machine
        $products_cousine_machine=Product::where('sub_category_id',15)
        ->whereNull('deleted_at')->orderBy('created_at','DESC')->get()->take(10);
        //slider 5 propre products 
        $products_propre=Product::where('sub_category_id',12)
        ->whereNull('deleted_at')->orderBy('created_at','DESC')->get()->take(10);
        //SLIDER 6 TV 
        $products_TV=Product::where('sub_category_id',13)
        ->whereNull('deleted_at')->orderBy('created_at','DESC')->get()->take(10);
        //slider 7 propse 
        //get all products where subcategory_id=12 random limit 10
        $products_propse_2=Product::where('sub_category_id',12)
        ->whereNull('deleted_at')->inRandomOrder()->get()->take(10);
        //slider 8
        $tools_home=Product::where('sub_category_id',19)
        ->whereNull('deleted_at')->orderBy('created_at','DESC')->get()->take(10);
        //slider 9
        $phones=Product::where('sub_category_id',9)
        ->whereNull('deleted_at')->orderBy('created_at','DESC')->get()->take(10);
        //slider 10
        $laptop_slider=Product::where('sub_category_id',2)
        ->whereNull('deleted_at')->orderBy('created_at','DESC')->get()->take(10);



        $images=Image::all();
        $subcategories=SubCategory::where('status',1)->whereNull('deleted_at')->get();
        $carousel_product_offre=Product::where('status',1)
        ->whereNull('deleted_at')
        ->where('sale_price','>',0)->inRandomOrder()->get()->take(10);
        //sale
        $sale=Sale::find(1);//
        //gel all offres where subcategory_id= 4 and subcategory_id=7 bolth 
        $offres_shoes=Offre::with('subcategory')->where('sub_category_id',8)->where('percent',40)->get();
        $offfes_chockolat=Offre::where('sub_category_id',11)->get();
        $offres_TV_washing=Offre::where('sub_category_id',13)->where('percent',60)->get();
        $offre_shoes_boat_livrison=Offre::where('sub_category_id',8)->where('percent',70)->get();
        $offre_cousin=Offre::where('sub_category_id',15)->where('percent',60)->get();
        $visage_soin=Offre::where('sub_category_id',12)->where('percent',80)->get();
        $lc_wikiki=Offre::where('sub_category_id',16)->where('percent',70)->get();
        $free_livrison=Offre::where('sub_category_id',13)->where('percent',100)->get();
        $food_offre=Offre::find(32);
        $offre_tv_32=Offre::where('sub_category_id',13)->where('percent',60)->get();
        $offre_tv_40=Offre::where('sub_category_id',13)->where('percent',50)->get();
        $offre_tv_50=Offre::where('sub_category_id',13)->where('percent',45)->get();
        $maquikage=Offre::where('sub_category_id',12)->where('percent',50)->get();
        $soin_visage_70=Offre::where('sub_category_id',12)->where('percent',80)->get();
        $cheaveau=Offre::where('sub_category_id',12)->where('percent',45)->get();
        $cousine_machine=Offre::where('sub_category_id',15)->where('percent',25)->get();
        $aspirateur=Offre::where('sub_category_id',15)->where('percent',45)->get();
        $room_bad=Offre::where('sub_category_id',17)->where('percent',40)->get();
        $smart_phone=Offre::where('sub_category_id',9)->where('percent',20)->get();
        $accesoir=Offre::where('sub_category_id',9)->where('percent',60)->get();
        $casque=Offre::where('sub_category_id',5)->where('percent',15)->get();
        $laptop=Offre::where('sub_category_id',2)->where('percent',35)->get();
        $accesoir_laptop=Offre::where('sub_category_id',2)->where('percent',60)->get();
        $ordinateur_offre=Offre::where('sub_category_id',2)->where('percent',50)->get();
        
        
        return view('livewire.home-component',
        ['sliders'=>$sliders,
        'lproducts'=>$lproducts,
        'images'=>$images,
        'subcategories'=>$subcategories,
        'carousel_product_offre'=>$carousel_product_offre,
        'sale'=>$sale,
        'offres_shoes'=>$offres_shoes,
        'offfes_chockolate'=>$offfes_chockolat,
        'offres_TV_washing'=>$offres_TV_washing,
        'offre_shoes_boat_livrison'=>$offre_shoes_boat_livrison,
        'offre_cousin'=>$offre_cousin,
        'visage_soin'=>$visage_soin,
        'lc_wikiki'=>$lc_wikiki,
        'free_livrison'=>$free_livrison,
        'food_offre'=>$food_offre,
        'offre_tv_32'=>$offre_tv_32,
        'offre_tv_40'=>$offre_tv_40,
        'offre_tv_50'=>$offre_tv_50,
        'maquikage'=>$maquikage,
        'soin_visage_70'=>$soin_visage_70,
        'cheaveau'=>$cheaveau,
        'cousine_machine'=>$cousine_machine,
        'aspirateur'=>$aspirateur,
        'room_bad'=>$room_bad,
        'smart_phone'=>$smart_phone,
        'accesoir'=>$accesoir,
        'casque'=>$casque,
        'laptop'=>$laptop,
        'accesoir_laptop'=>$accesoir_laptop,
        'ordinateur_offre'=>$ordinateur_offre,
        'products_shoes'=>$products_shoes,
        'products_cousine_machine'=>$products_cousine_machine,
        'products_propre'=>$products_propre,
        'products_TV'=>$products_TV,
        'products_propse_2'=>$products_propse_2,
        'tools_home'=>$tools_home,
        'phones'=>$phones,
        'laptop_slider'=>$laptop_slider,
     ]);      
    }
}
