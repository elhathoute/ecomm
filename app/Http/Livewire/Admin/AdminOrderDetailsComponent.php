<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Image;

class AdminOrderDetailsComponent extends Component
{
    public $order_id;
    public function mount($order_id){
        $this->order_id = $order_id;
    }
    public function render(){
        $orders =Order::find($this->order_id) ;
        $image=Image::all();
        return view('livewire.admin.admin-order-details-component',['orders'=>$orders,'image'=>$image])->layout('layouts.base');
    }
}
