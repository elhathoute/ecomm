<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Image;
use App\Models\Coupon;
use Carbon\Carbon;
use App\Models\User;
use Cart;
use Auth;
class CartComponent extends Component{
    //coupon code 
    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;
    public $color;
    public $size;
    //increment quantity
    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        //emitTo using for refresh component when add item to cart
        $this->emitTo('cart-icon-component','refreshComponent');
    }
    //decrement quantity
    public function decreaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        //emitTo using for refresh component when add item to cart
        $this->emitTo('cart-icon-component','refreshComponent');
    }
    //remove item from cart
    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        //emitTo using for refresh component when add item to cart
        $this->emitTo('cart-icon-component','refreshComponent');
        session()->flash('success_message','Item has been removed');
        
    }

    //destroy all items from cart
    public function destroyAll(){
        Cart::instance('cart')->destroy();
        //emitTo using for refresh component when add item to cart
        $this->emitTo('cart-icon-component','refreshComponent');
    }

    //save forlater
    public function saveForLater($rowId){
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        //emitTo using for refresh component when add item to cart
        $this->emitTo('cart-icon-component','refreshComponent');
        session()->flash('success_message','Item has been saved for later');
    }

    //move to cart
    public function moveToCart($rowId){
        $item = Cart::instance('saveForLater')->get($rowId);
        //dd($item);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-icon-component','refreshComponent');
        session()->flash('success_message','Item has been moved to cart');
    }

    //remove item from save for later
    public function removeItemFromSaveLater($rowId){
        Cart::instance('saveForLater')->remove($rowId);
        //emitTo using for refresh component when add item to cart
        //$this->emitTo('cart-icon-component','refreshComponent');
        session()->flash('r_success_message','Item has been removed');
    }
    //apply coupon code
    public function applyCouponCode(){ 
        $coupon=Coupon::where('code',$this->couponCode)
        ->where('expiry_date','>=',Carbon::today())
        ->where('cart_value','<=',Cart::instance('cart')->subtotal())
        ->first();
        if(!$coupon){
            session()->flash('coupon_message','Coupon code is invalid');
            return;
        }
        session()->put('coupon',[
            'code'=>$coupon->code,
            'type'=>$coupon->type,
            'value'=>$coupon->value,
            'cart_value'=>$coupon->cart_value,
        ]);
    }
    //calculate discount
    public function calculateDiscounts(){
        if(session()->has('coupon')){
            if(session()->get('coupon')['type']=='fixed'){
                $this->discount=session()->get('coupon')['value'];
            }else{
                $this->discount=(Cart::instance('cart')->subtotal()*session()->get('coupon')['value'])/100;
            }
            $this->subtotalAfterDiscount=Cart::instance('cart')->subtotal()-$this->discount;
            $this->taxAfterDiscount=($this->subtotalAfterDiscount*config('cart.tax'))/100;
            $this->totalAfterDiscount=$this->subtotalAfterDiscount+$this->taxAfterDiscount;
        }
    }

    //remove coupon code
    public function removeCoupon(){
        session()->forget('coupon');
    }

    //checkout
    public function checkout(){
        $user=User::find(session('loginId'));
        if($user){
            return redirect()->route('checkout');
        }else{
            return redirect()->route('login');
        }
    }
    //set amount for checkout
    public function setAmountForCheckout(){
        if(!Cart::instance('cart')->count() > 0){
            session()->forget('checkout');
            return;
        }
        if(session()->has('coupon')){
           session()->put('checkout',[
               'discount'=>$this->discount,
               'subtotal'=>$this->subtotalAfterDiscount,
               'tax'=>$this->taxAfterDiscount,
               'total'=>$this->totalAfterDiscount,
           ]);
        }else{
            session()->put('checkout',[
                'discount'=>0,
                'subtotal'=>Cart::instance('cart')->subtotal(),
                'tax'=>Cart::instance('cart')->tax(),
                'total'=>Cart::instance('cart')->total(),
            ]);
        }
    }
    //render
    public function render(){
        $images = Image::all();
        if(Session()->has('coupon')){
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']){
                session()->forget('coupon');
            }else{
                $this->calculateDiscounts();
            }
        }

        $this->setAmountForCheckout();
        return view('livewire.cart-component',['images'=>$images]);
    }
}
