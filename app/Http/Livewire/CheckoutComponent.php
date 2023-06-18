<?php

namespace App\Http\Livewire;

use Livewire\Component;
//model country 
use App\Models\Country;
//model city 
use App\Models\Order;
use App\Models\City;
//class Session 
use Session;
use App\Models\Shipping;
use App\Models\SizeColor;
use App\Models\Transaction;
use Cart;
use Stripe;
use Auth;
class CheckoutComponent extends Component
{
    /////////////////
    public $size_color_array=[];
    ////////////////
    public $ship_to_different;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $address1;
    public $address2;
    public $city;
    public $country;
    public $zipcode;

    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_phone;
    public $s_address1;
    public $s_address2;
    public $s_province;
    public $s_country;
    public $s_zipcode;

    //payment method
    public $paymentmode_cod;
    public $paymentmode_paypal;
    public $paymentmode_card;
    public $thankyou;


    //tools 
    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;

    //function updated 
    public function updated($fields){
        $this->validateOnly($fields,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            //validation phone regex accept +212 6 00 00 00 00 or 06 00 00 00 00 or 06-00-00-00-00 or +212600000000 or 0600000000 
            'phone'=>'required',
            'address1'=>'required',
            'city'=>'required|numeric',
            'country'=>'required|numeric',
            'zipcode'=>'required|numeric',
            'paymentmode_cod'=>'required',
        ]);
        //if ship to different
        if($this->ship_to_different){
            $this->validateOnly($fields,[
                's_firstname'=>'required',
                's_lastname'=>'required',
                's_email'=>'required|email',
                's_phone'=>'required',
                's_address1'=>'required',
                's_province'=>'required',
                's_country'=>'required',
                's_zipcode'=>'required',
            ]);
        }

        if($this->paymentmode_card=="card"){
            $this->validateOnly($fields,[
                'card_no'=>'required',
                'exp_month'=>'required',
                'exp_year'=>'required',
                'cvc'=>'required',
            ]);
        }
    }

    //function placeOrder
    public function placeOrder(){
        //validate data
        $this->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email', 
            //validation phone regex accept +212 6 00 00 00 00 or 06 00 00 00 00 or 06-00-00-00-00 or +212600000000 or 0600000000 
            'phone'=>'required',
            'address1'=>'required',
            'city'=>'required|numeric',
            'country'=>'required|numeric',
            'zipcode'=>'required|numeric',
            'paymentmode_cod'=>'required',
        ]);
        //if ship to different
        if($this->paymentmode_card=="card"){
            $this->validate([
                'card_no'=>'required',
                'exp_month'=>'required',
                'exp_year'=>'required',
                'cvc'=>'required',
            ]);
        }
        

        //save order in database using orm create 
        $order=Order::create([
            'user_id'=>session('loginId'),
            'subtotal'=>session()->get('checkout')['subtotal'],
            'discount'=>session()->get('checkout')['discount'],
            'tax'=>session()->get('checkout')['tax'],
            'total'=>session()->get('checkout')['total'],
            'firstname'=>$this->firstname,
            'lastname'=>$this->lastname,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'line1'=>$this->address1,
            'line2'=>$this->address2,
            'city_id'=>$this->city,
            'province'=>$this->s_province,
            'country_id'=>$this->country,
            'zipcode'=>$this->zipcode,
            'status'=>'ordered',
            'is_shipping_different'=>$this->ship_to_different ? 1 : 0,
        ]);

        //indert into order_item table
        $count=0;
        foreach(Cart::instance('cart')->content() as $key=>$item){
            $order->orderItems()->create([ 
                'product_id'=>$item->model->id,
                'order_id'=>$order->id,
                'quantity'=>$item->qty,
                'price'=>$item->price,
                'color_id'=>$item->color,
                'size_id'=>$item->size,
            ]);
            $this->size_color_array[$count]=[
                'color'=>$item->color,
                'size'=>$item->size,
                'product_id'=>$item->model->id,
                'quantity'=>$item->qty,
            ];
            $count++;
        }

        //if ship to different
        if($this->ship_to_different){
            //validation 
            $this->validate([
                's_firstname'=>'required',
                's_lastname'=>'required',
                's_email'=>'required|email',
                's_phone'=>'required',
                's_address1'=>'required',
                's_province'=>'required',
                's_country'=>'required',
                's_zipcode'=>'required',
            ]);
            //orm create in shipping table
            $shipping=Shipping::create([
                'order_id'=>$order->id,
                'firstname'=>$this->s_firstname,
                'lastname'=>$this->s_lastname,
                'email'=>$this->s_email,
                'phone'=>$this->s_phone,
                'line1'=>$this->s_address1,
                'line2'=>$this->s_address2,
                'province'=>$this->s_province,
                'country_id'=>$this->s_country,
                'zipcode'=>$this->s_zipcode,
            ]);

            
            
        }
        //^payment method 
        if($this->paymentmode_cod=='cod'){
            //orm transaction table 
            $transaction=Transaction::create([
                'order_id'=>$order->id,
                'user_id'=>session('loginId'),
                'mode'=>'cod',
                'status'=>'pending',
            ]);
            $this->resetCart();

        }else if($this->paymentmode_paypal=="paypal"){
            $transaction=Transaction::create([
                'order_id'=>$order->id,
                'user_id'=>session('loginId'),
                'mode'=>'paypal',
                'status'=>'pending',
            ]);
            $this->resetCart();
        }
        //if payment mode card
        else if($this->paymentmode_card=="card"){
            $stripe=Stripe::make(env('STRIPE_KEY'));
            try{
                $token=$stripe->tokens()->create([
                    'card'=>[
                        'number'=>$this->card_no,
                        'exp_month'=>$this->exp_month,
                        'exp_year'=>$this->exp_year,
                        'cvc'=>$this->cvc,
                    ],
                ]);
                if(!isset($token['id'])){
                    return redirect()->route('checkout')->with('error','The Stripe Token was not generated correctly');
                    $this->thankyou=0;
                }
                $customer=$stripe->customers()->create([
                    'name'=>$this->firstname.' '.$this->lastname,
                    'email'=>$this->email,
                    'phone'=>$this->phone,
                    'address'=>[
                        'line1'=>$this->address1,
                        'city'=>$this->city,
                        'country'=>$this->country,
                        'postal_code'=>$this->zipcode,
                        'state'=>$this->s_province,
                    ],
                    'shipping'=>[
                        'name'=>$this->s_firstname.' '.$this->s_lastname,
                        'address'=>[
                            'line1'=>$this->s_address1,
                            'country'=>$this->s_country,
                            'postal_code'=>$this->s_zipcode,
                            'state'=>$this->s_province,
                        ],
                    ],
                    'source'=>$token['id'],
                ]);
                $charge=$stripe->charges()->create([
                    'customer'=>$customer['id'],
                    'currency'=>'USD',
                    'amount'=>session()->get('checkout')['total'],
                    'description'=>'payment for Order no' . $order->id 
                ]);
                if($charge['status']=='succeeded'){
                    $transaction=Transaction::create([
                        'order_id'=>$order->id,
                        'user_id'=>session('loginId'),
                        'mode'=>'card',
                        'status'=>'approved',
                    ]);
                    $this->resetCart();
                    //get size_id and color_id from order_item table
                    

                }else{
                    session()->flash('stripe_error','Error in Transaction!');
                    $this->thankyou=0;
                }


            }catch(Exception $e){
                session()->flash('stripe_error',$e->getMessage());
                $this->thankyou=0;
            }
            $transaction=Transaction::create([
                'order_id'=>$order->id,
                'user_id'=>session('loginId'),
                'mode'=>'card',
                'status'=>'pending',
            ]);
            $this->resetCart();
        }
        

    }
    public function resetCart(){
        $this->thankyou=1;
        //destroy cart
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    //verify checkout
    public function verifyCheckout(){
        if(!Session::has('loginId')){
            return redirect()->route('login');
        }else if($this->thankyou){
            //get table size_color and update quantity
            //dd($this->size_color_array);
            foreach($this->size_color_array as $key=>$item){
                
                $size_color=SizeColor::where('product_id',$item['product_id'])->where('color_id',$item['color'])->where('size_id',$item['size'])->first();
                
                $size_color->quantity=$size_color->quantity - $item['quantity'];
                
                $size_color->save();
            }
            //update size and color quantity in table 

            return redirect()->route('thankyou');
        }else if(!session()->get('checkout')){
            return redirect()->route('cart');
        }
    }
    public function render(){
        
        $this->verifyCheckout();
        $countries=Country::where('status',1)->whereNull('deleted_at')->get();
        $cities=City::where('status',1)->whereNull('deleted_at')->get();
        return view('livewire.checkout-component',['countries'=>$countries,'cities'=>$cities]);
    }
}
