<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
class AdminCouponsComponent extends Component
{
    //delete coupon 
    public function deleteCoupon($id){
        $coupon=Coupon::find($id);
        $coupon->delete();
        session()->flash('message','Coupon has been deleted successfully');
    }
    public function render(){
        $coupon=Coupon::all();
        return view('livewire.admin.admin-coupons-component',['coupons'=>$coupon])->layout('layouts.base');
    }
}
