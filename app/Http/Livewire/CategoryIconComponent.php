<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SubCategory;
class CategoryIconComponent extends Component
{
     public function render(){
        $subcategories=SubCategory::where('status',1)->whereNull('deleted_at')->get();
        return view('livewire.category-icon-component',['subcategories'=>$subcategories]);
     }
}
