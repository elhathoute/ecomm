<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Order;
class UserOrdersComponent extends Component
{
    use WithPagination;
    public function updateStatusOrder($order_id,$status){
        $order = Order::find($order_id);
        $order->status = $status;
        if($status=="delivered"){
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }else if($status=="canceled"){
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('message','Order status has been updated successfully');
    }


    public function render(){
        $orders=Order::with('user','shipping','country','city')
        ->orderBy('created_at','DESC')->where('user_id',session('loginId'))->paginate(12);
        return view('livewire.user.user-orders-component',['orders'=>$orders])->layout('layouts.base');
    }
}
