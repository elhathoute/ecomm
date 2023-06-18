<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
//DB 
use Illuminate\Support\Facades\DB;
//image 
use App\Models\Image;
class UserOrderDetailsComponent extends Component
{
    public $order_id;
    public function mount($order_id){
        $this->order_id = $order_id;
    }
    public function cancelOrder(){
        $order=Order::find($this->order_id);
        $order->status='canceled';
        $order->canceled_date=DB::raw('CURRENT_DATE');
        $order->save();
        session()->flash('order_message','Order has been canceled');
    }
    public function render(){
        //get order has id=$order_id and where user_id=session('loginId')
        $orders=Order::where('id',$this->order_id)->where('user_id',session('loginId'))->first();
        $image=Image::all();
        return view('livewire.user.user-order-details-component',['orders'=>$orders,'image'=>$image])->layout('layouts.base');
    }
}


