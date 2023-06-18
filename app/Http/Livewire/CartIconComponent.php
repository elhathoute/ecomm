<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Image;
class CartIconComponent extends Component{
    //refresh component using for cart icon when add item to cart
    protected $listeners=['refreshComponent'=>'$refresh'];
    public function render(){
        $images = Image::all();
        return view('livewire.cart-icon-component',['images'=>$images]);
    }
}
