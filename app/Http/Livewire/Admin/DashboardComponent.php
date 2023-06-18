<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\Brands;
use App\Models\SubCategory;
use App\Models\Country;
use App\Models\City;
use App\Models\Image;
use App\Models\OrderItem; 
use App\Models\Review;
use App\Models\Shipping;
use App\Models\Sale;
use App\Models\Transaction;



class DashboardComponent extends Component
{
    public $user;
   
    public function render()
    {
        //gel all user 
        #---------------------------------------------------------------------------------------
        
        #---------------------------------------------------------------------------------------
        /*
        #---------------------------------------------------------------------------------------
        
        #---------------------------------------------------------------------------------------
        
        #---------------------------------------------------------------------------------------
        
        #---------------------------------------------------------------------------------------
        //get from orderItem quntity product sale where status delivered
        $products=OrderItem::whereHas('order',function($query){$query->where('status','delivered');})->get();
        
        $product_id=[];
        //get country from $products 
        //$orders=Order::where('status','delivered')->get();
        //get all orders with order items 
        
        
        #---------------------------------------------------------------------------------------

        //foreach $products get product_id no repeat with all quantity 
        foreach($products as $key=>$product){
            $product_id[$key]['product_id']=$product->product_id;
            $product_id[$key]['quantity']=$product->quantity;
        }
        $product_id2=[];
        for($i=0;$i<count($product_id);$i++){
            for($j=0;$j<count($product_id);$j++){
                if($product_id[$i]['product_id']==$product_id[$j]['product_id']){
                    $product_id2[$i]['product_id']=$product_id[$i]['product_id'];
                    $product_id2[$i]['quantity']=$product_id[$i]['quantity']+$product_id[$j]['quantity'];
                }
            }
        }
        $product_id3=[];
        //i have quantity min and max i will transofm to quantity max 
        for($i=0;$i<count($product_id2);$i++){
            for($j=0;$j<count($product_id2);$j++){
                if($product_id2[$i]['product_id']==$product_id2[$j]['product_id']){
                    if($product_id2[$i]['quantity']>=$product_id2[$j]['quantity']){
                        $product_id3[$i]['product_id']=$product_id2[$i]['product_id'];
                        $product_id3[$i]['quantity']=$product_id2[$i]['quantity'];
                    }
                    else{
                        $product_id3[$i]['product_id']=$product_id2[$j]['product_id'];
                        $product_id3[$i]['quantity']=$product_id2[$j]['quantity'];
                    }
                }
            }
        }
        $product_id3=array_unique($product_id3,SORT_REGULAR);
        $products=collect($product_id3);    
        $dd=[];
        $products=$products->sortByDesc('quantity');
        $products_sale=Product::whereIn('id',$products->pluck('product_id'))->get();
        for($i=0;$i<count($products_sale) - 1;$i++){
            for($j=0;$j<count($products) - 1;$j++){
                if($products_sale[$i]['id']==$products[$j]['product_id']){
                    $products_sale[$i]['quantity']=$products[$j]['quantity'];
                }
            }
        }
        
        
        
        
        */
        #-----------------------------------------------------------
        $totalSale=Order::where('status','delivered')->sum('total');
        $totalSale=$totalSale/1000;
        $totalSale=substr($totalSale,0,-3);
        #-----------------------------------------------------------
        $countUser=User::count();
        #-----------------------------------------------------------
        $totalCancel=Order::where('status','canceled')->sum('total');
        $totalCancel=$totalCancel/1000;
        $totalCancel=substr($totalCancel,0,-3);
        #-----------------------------------------------------------
        $quantitySale=OrderItem::whereHas('order',function($query){
            $query->where('status','delivered');
        })->sum('quantity');
        #-----------------------------------------------------------
        $this->user=User::all();
        #-----------------------------------------------------------
        $products=OrderItem::whereHas('order',function($query){$query->where('status','delivered');})->get();
        $product_id=[];
        //foreach $products get product_id no repeat with all quantity 
        foreach($products as $key=>$product){
            $product_id[$key]['product_id']=$product->product_id;
            $product_id[$key]['quantity']=$product->quantity;
        }
        $unique_products = array();
        foreach ($product_id as $product) {
            $product_id = $product['product_id'];
            $quantity = $product['quantity'];
            // Check if the product ID already exists in the $unique_products array
            if (array_key_exists($product_id, $unique_products)) {
                // If it does, add the quantity to the existing value
                $unique_products[$product_id] += $quantity;
            } else {
                // If it doesn't, create a new entry in the $unique_products array
                $unique_products[$product_id] = $quantity;
            }
        }
        $unique_products;
        $products_sale=Product::whereIn('id',array_keys($unique_products))->get();
        for($i=0;$i<count($products_sale) - 1;$i++){
            for($j=0;$j<count($unique_products) - 1;$j++){
                if($products_sale[$i]['id']==array_keys($unique_products)[$j]){
                    $products_sale[$i]['quantity']=array_values($unique_products)[$j];
                }
            }
        }
        //get all images
        $images=Image::all();
        //get all product name
        //order products_sale by quantity
        $products_sale=$products_sale->sortByDesc('quantity');
        //select name from products_sale
        $product_sale_name=$products_sale->pluck('name');
        //select quantity from products_sale
        $product_sale_quantity=$products_sale->pluck('quantity');
        //select brand from products_sale
        $brand_id=$products_sale->pluck('brand_id');
        //
        $brand_qty=[];
        for($i=0;$i<count($brand_id);$i++){
            $brand_qty[$i]['brand_id']=$brand_id[$i];
            $brand_qty[$i]['quantity']=$product_sale_quantity[$i];
        }
        $unique_brands = array();
        foreach ($brand_qty as $product) {
            $brand_qty = $product['brand_id'];
            $quantity = $product['quantity'];
            // Check if the product ID already exists in the $unique_products array
            if (array_key_exists($brand_qty, $unique_brands)) {
                // If it does, add the quantity to the existing value
                $unique_brands[$brand_qty] += $quantity;
            } else {
                // If it doesn't, create a new entry in the $unique_products array
                $unique_brands[$brand_qty] = $quantity;
            }
        }
        $brands_sale2=Brands::whereIn('id',array_keys($unique_brands))->get();
        for($i=0;$i<count($brands_sale2) - 1;$i++){
            for($j=0;$j<count($unique_brands) - 1;$j++){
                if($brands_sale2[$i]['id']==array_keys($unique_brands)[$j]){
                    $brands_sale2[$i]['quantity']=array_values($unique_brands)[$j];
                }
            }
        }
        $brands_sale2=$brands_sale2->sortByDesc('quantity');
        //brand name from brands_sale2
        $brands_sale2_name=$brands_sale2->pluck('name');
        //brand quantity from brands_sale2
        $brands_sale2_quantity=$brands_sale2->pluck('quantity');
        //dd($brands_sale2);

        
        ///////////////////////////////////////////////////////////////////////////
        $orders=Order::where('status','delivered')->get();
        //get total from orders group by day of month
        $total=[];
        foreach($orders as $key=>$order){
            $total[$key]['total']=$order->total;
            //total day of month (date has date and this month and this year)
            $total[$key]['day']=date('d',strtotime($order->created_at));
        }   
        $unique_total = array();
        foreach ($total as $product) {
            $total = $product['total'];
            $day = $product['day'];
            // Check if the product ID already exists in the $unique_products array
            if (array_key_exists($day, $unique_total)) {
                // If it does, add the quantity to the existing value
                $unique_total[$day] += $total;
            } else {
                // If it doesn't, create a new entry in the $unique_products array
                $unique_total[$day] = $total;
            }
        }
        //create array for day of month
        $new_aaray=[];
        foreach($unique_total as $key=>$value){
            $new_aaray[$key]['day']=$key;
            $new_aaray[$key]['total']=$value;
        }
        //get total from orders group by day of month
        $statistique_sales=$new_aaray;
        //i have quantity min and max i will transofm to quantity max 

        return view('livewire.admin.dashboard-component',[
            'user'=>$this->user,
            'quantitySale'=>$quantitySale,
            'totalSale'=>$totalSale,
            'countUser'=>$countUser,
            'totalCancel'=>$totalCancel,
            'products_sale'=>$products_sale,
            'images'=>$images, 
            'product_sale_name'=>$product_sale_name,
            'product_sale_quantity'=>$product_sale_quantity,
            'brands_sale2'=>$brands_sale2,
            'brands_sale2_name'=>$brands_sale2_name,
            'brands_sale2_quantity'=>$brands_sale2_quantity,
            'statistique_sales'=>$statistique_sales,
        ])->layout('layouts.base');

    }
}
