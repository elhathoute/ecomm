<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
class AdminEditCouponsComponent extends Component
{


    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;
    public $expiry_date;
    //mount(())
    public function mount($coupon_id){
        $coupon=Coupon::find($coupon_id);
        $this->code=$coupon->code;
        $this->type=$coupon->type;
        $this->value=$coupon->value;
        $this->cart_value=$coupon->cart_value;
        $this->coupon_id=$coupon->id;
        $this->expiry_date=$coupon->expiry_date;
    }
    //updated only 
    public function updated($fields){
        $this->validateOnly($fields,[
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required',
            'cart_value'=>'required',
            'expiry_date'=>'required',
        ]);
    }
    public function updateCoupon(){
        //validation 
        $this->validate([
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required',
            'cart_value'=>'required',
            'expiry_date'=>'required',
        ]);
        //update 
        $coupon=Coupon::find($this->coupon_id);
        //method opdate orm 
        $update=Coupon::where('id',$this->coupon_id)->update([
            'code'=>$this->code,
            'type'=>$this->type,
            'value'=>$this->value,
            'cart_value'=>$this->cart_value,
            'expiry_date'=>$this->expiry_date,
        ]);
        
        //redirect to admin coupons page
        return redirect()->route('admin.coupons');
        session()->flash('message','Coupon has been edited successfully');
    }
    public function render(){
        return view('livewire.admin.admin-edit-coupons-component')->layout('layouts.base');
    }
}
