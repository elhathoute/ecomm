<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Image;
class WishlistComponent extends Component
{
    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id==$product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-icon-component','refreshComponent');
                return;
            }
        }
    }
    //move to cart
    public function moveToCart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        //dd($item);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-icon-component','refreshComponent');
        $this->emitTo('wishlist-icon-component','refreshComponent');
    }
    public function render()
    {
        $images = Image::all();
        return view('livewire.wishlist-component',['images'=>$images]);
    }
}
