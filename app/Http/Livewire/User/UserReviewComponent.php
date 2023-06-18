<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Review;
use App\Models\Image;
use App\Models\OrderItem;
class UserReviewComponent extends Component
{
    public $order_item_id;
    public $rating;
    public $comment;
    public $id_item;

    public function mount($order_item_id){
        $this->order_item_id=$order_item_id;
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'rating'=>'required',
            'comment'=>'required'
        ]);
    }
    public function addReview(){
        $this->validate([
            'rating'=>'required',
            'comment'=>'required'
        ]);
        $review=new Review();
        $review->rating=$this->rating;
        $review->comment=$this->comment;
        $review->user_id=session('loginId');
        $review->order_item_id=$this->order_item_id;
        $review->save();
        session()->flash('message','Your review has been added succesfully !');

        //order item 
        $orderItem=new OrderItem;
        $ourOrderItem=OrderItem::where('id',$this->order_item_id)
        ->update([
            'rstatus'=>true 
        ]);
        //$orderItemData=
    }

    public function render()
    {
        $images=Image::all();
        
        $order_item=OrderItem::where('id',$this->order_item_id)->first(); 
        $this->id_item=$order_item->id;
        
        return view('livewire.user.user-review-component',['order_item'=>$order_item,'images'=>$images]);
    }
}
