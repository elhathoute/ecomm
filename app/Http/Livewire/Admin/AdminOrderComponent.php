<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
class AdminOrderComponent extends Component
{


    //update order status 
    use WithPagination;
    public $delivered;
    
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
    public function render()
    {
        //get all orders with use and shipping and products and country and city with pagination
        $orders = Order::with('user','shipping','country','city')
        ->orderBy('created_at','DESC')
        ->paginate(10);
        return view('livewire.admin.admin-order-component',['orders' => $orders])->layout('layouts.base');
    }
}
