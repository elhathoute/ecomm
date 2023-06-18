<div class="cart-shopping relative cart cart__parent">
    <div class="icon-cart-shopping cart">
        <div class="relative cart">
            @if(Cart::instance('cart')->count() >0)
            <span class="absolute bg-color-red-button cart">
                {{Cart::instance('cart')->count()}}
            </span>
            @endif 
            <a href='{{route('cart')}}'><i class='bx bx-cart-alt 
                text-color-gray-background-light cart' ></i></a>
        </div>
    </div>
    <div class="cart-boxing cart">
        <span class="cart">My Cart</span>
        <p class="text-md cart">
            @if(Cart::instance('cart')->count() > 0)
                289$ 
                <i class='bx bx-chevron-down text-lg text-left font-bold cart '></i>
            @else 
                00$
                <i class='bx bx-chevron-down text-lg text-left font-bold cart '></i>
            @endif
            
        </p>
    </div>
    @if(Cart::instance('cart')->count() >0)
        <div class="body  box-carts fixed z-[900000] rounded w-60 h-[360px]  md:w-[400px] md:h-[400px] 
                shadow-lg top-[120px]  md:top-[120px] border-[#cbd5e1] border 
                bg-while
                right-[30px]    md:right-[70px]  p-5  flex flex-col cart-menu">
            <p class="p-2 h-[70%] 
                overflow-y-auto w-[100%] relative">
                @foreach(Cart::instance('cart')->content() as $item)
                    <span class="border-[#cbd5e1] bg-while h-20 flex items-center cursor-pointer
                        border-b border-[#cbd5e1]">
                        @foreach($images as $image)
                            @if($image->id == $item->model->img_id)
                            <a href="{{route('product.details',['slug'=>$item->model->slug])}}">
                                <img class="w-16 h-16" 
                                src="{{asset('products/'.$image->img)}}"
                                alt=" shoes"/>
                            </a>
                            @endif 
                        @endforeach
                        <span class="flex flex-col">
                            <a href="{{route('product.details',['slug'=>$item->model->slug])}}">
                                <span class="font-bold">{{$item->model->name}}</span>
                            </a>
                            <span class="text-color-red-button">${{$item->model->sale_price}}x 
                                <b class="text-[#000]" style="font-size: 12px;">{{$item->qty}}</b>
                            </span>
                        </span>
                    </span>
                @endforeach
            </p>
            <p class="p-2 flex mt-4 justify-between text-lg">
                <span class="text-[14px] md:text-lg">Total: 
                    <b class="text-color-red-button text-[14px] md:text-lg font-normal">${{Cart::total()}}</b>
                    <b style="font-size: 12px;" class="text-color-red-button font-normal"></b>
                </span>
                <button class="border rounded text-[10px] px-1 py-0   md:text-sm md:py-2 md:px-3 border-[#cbd5e1]">
                    Expand now >
                </button>
            </p>
            <button class="rounded bg-color-red-button flex 
                justify-center items-center w-[90%] mx-auto py-2 cursor-pointer text-while
                ">
                <i class='bx bxl-paypal text-[#455aab]'></i>
                <span><a href='{{route('checkout')}}'>Check Out</a></span>
            </button>
        </div>
    @endif 
</div>