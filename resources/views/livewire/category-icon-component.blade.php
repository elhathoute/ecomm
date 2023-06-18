<div class="relative flex gap-2 departement-products-categories" style="flex-wrap: wrap;">
    @foreach($subcategories as $subcategory)
        <a href="{{route('product.subcategory',['slug'=>$subcategory->slug])}}" class="box relative rounded-lg overflow-hidden w-[24%] h-[100px]">
            <img src="{{asset('subcategories/'.$subcategory->image)}}"
            alt ="one" class="h-full w-full"/>
            <span class="absolute top-0 left-0 w-full h-full">{{$subcategory->name}}</span>
        </a>
    @endforeach  
</div>