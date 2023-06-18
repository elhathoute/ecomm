<div>
    <!--cart shopping-->
    <div class="cart-shopping__ecommerce mt-3  w-[95%] lg:w-[90%] mx-auto" >
        <style>
            .success-message{
                background-color: #e6f4ea;
                color: #2a8f42;
                border-color: #c3e6cb;
            }
            .button-delete{
                background-color: #ffd7cb;
                color: #ff5959;
                border-color: #cbd5e0;
                padding:5px 10px;
                border-radius: 5px;
            }
        </style>
        @if(Cart::instance('cart')->count() > 0)
        <div class="cart-shopping__product">
            <div class="content__products-cart flex flex-col">
                <div class="products-cart-shopping-columns p-2">
                    <div class="product-img-name" >
                        <h3>Product</h3>
                    </div>
                    <div class="product-price-cart-shoppping">
                        <h3>Price</h3>
                    </div>
                    <div class="product-quantity-cart-shoppping">
                        <h3>Quality</h3>
                    </div>
                    <div class="product-total-cart-shoppping">
                        <h3>Total</h3>
                    </div>
                    <div class="product-action-cart-shoppping">
                        <h3>Action</h3>
                    </div>
                </div> 
                <hr class="border-none bg-color-gray-background-light h-[1px]"/>
                @if(Session::has('success_message'))
                    <div class="alert alert-success success-message py-3 text-center">
                        <strong>Success |  {{Session::get('success_message')}}</strong>
                    </div>
                @endif 
                @if(Cart::instance('cart')->count() > 0)
                @foreach(Cart::instance('cart')->content() as $item)
                    <div class="products-cart-shopping-columns p-1 border-b border-color-gray-background-light">
                        <div class="product-img-name photo-img-column">
                            <div class="flex items-center ">
                                @foreach($images as $image)
                                    @if($image->id == $item->model->img_id)
                                    <img 
                                    src="{{asset('products/'.$image->img)}}" 
                                    alt="" class="w-[80px] lg:w-[100px] h-[80px] lg:h-[110px] object-cover" />
                                    @endif
                                @endforeach
                                <p class="mx-3 text-xs md:text-sm lg:text-md">{{$item->model->name}}</p>
                            </div>
                        </div>
                        <div class="product-price-cart-shoppping justify-center flex items-center"> 
                            <p>{{$item->model->sale_price}}$</p>
                        </div>
                        <div class="product-quantity-cart-shoppping flex items-center justify-center">
                            <button class="bg-while flex w-[120px] items-center   overflow-hidden rounded-xl 
                                text-sm cursor-pointer p-0 outline-none border border-color-gray-background-light">
                                <i wire:click.prevent="decreaseQuantity('{{$item->rowId}}')" class='bx bx-minus w-[33.33%] flex justify-center h-[100%]  p-1'></i>
                                <span class="w-[33.33%] flex justify-center border-r border-l h-[100%] border-r-color-gray-background-light border-l-color-gray-background-light p-1">
                                    {{$item->qty}}
                                </span>
                                <i wire:click.prevent="increaseQuantity('{{$item->rowId}}')" class='bx bx-plus flex justify-center w-[33.33%] h-[100%]  p-1'></i>
                            </button>
                        </div>
                        <div class="product-quantity-cart-shoppping flex items-center justify-center">
                            <p>
                                <a href="#" wire:click.prevent="saveForLater('{{$item->rowId}}')">
                                    Save For Later
                                </a>
                            </p>
                        </div>
                        <div class="product-total-cart-shoppping flex justify-center items-center">
                            <h3>{{$item->subtotal}}$</h3>
                        </div>
                        <div class="product-action-cart-shoppping flex items-center">
                            <button wire:click.prevent="destroy('{{$item->rowId}}')" 
                            class="p-1 rounded-md text-xl">
                                <i class='bx bx-trash text-color-red-button'></i>
                            </button>
                            <button class="text-xl">
                                <i class='bx bx-heart '></i>
                            </button>
                            <button class="text-xl">
                                <i class='bx bx-edit-alt' ></i>
                            </button>
                        </div>
                    </div>
                @endforeach
                @else 
                <p>No Item in cart</p>
                @endif 
            </div>
            <div style='justify-content:flex-end' class='flex mt-2'>
                <button wire:click.prevent="destroyAll()" class='button-delete'>Clear All</button>
            </div>
            <div class="flex justify-between mt-3">
                <a href="#" class="flex opacity-90 transition hover:opacity-100 text-while justify-center items-center py-1 px-3  bg-color-red-button rounded-lg">
                    <i class='bx bx-chevron-left w-[25px]'></i>
                    <span class="">continue shopping</span>
                </a>
                
            </div>
        </div> 
        <div class="total__checkout  h-[500px] p-8">
            @if(!Session::has('coupon'))
            <div class="coupon__product-cart-shopping border border-color-gray-background-light rounded-xl overflow-hidden p-3">
                <div class="flex">
                    <input value="1" wire:model="haveCouponCode" type="checkbox"/>
                    <p class="text-sm mx-1 text-color-gray-dark">Have Coupon?</p>
                </div>
                @if($haveCouponCode==1)
                <form wire:submit.prevent="applyCouponCode">
                    @if(Session::has('coupon_message'))
                        <div class="alert ">{{Session::get('coupon_message')}}</div>
                    @endif
                    <div class=" w-[95%] mt-2 relative border border-color-gray-background-light rounded-md overflow-hidden"> 
                        <input wire:model="couponCode" name="coupon-code" type="text" placeholder="Coupon Code"  class=" p-2 outline-none text-sm"/>
                        <button class="absolute text-sm text-while right-0 top-0 h-[100%] w-[70px] bg-color-red-button">
                            Apply
                        </button>
                    </div>
                </form>
                @endif
            </div>
            @endif 
            <div class="coupon__product-cart-shopping border mt-3 border-color-gray-background-light rounded-xl overflow-hidden p-5">
                <ul>
                    <li class="flex justify-between mb-2">
                        <span>SubTotal Price</span>
                        <span>${{Cart::instance('cart')->subtotal()}}</span>
                    </li>
                    @if(Session::has('coupon'))
                    <li class="flex justify-between mb-2">
                        <span class="flex items-center gap-3">
                            Discount ({{Session::get('coupon')['code']}})
                            <a href="#"  wire:click.prevent="removeCoupon">
                                <i style='color:red' class='bx bx-x text-xl'></i>
                            </a>
                        </span>
                        <span>${{number_format($discount,2)}}</span>
                    </li>
                    <li class="flex justify-between mb-2">
                        <span>SubTotal with Discount</span>
                        <span>${{number_format($subtotalAfterDiscount,2)}}</span>
                    </li>
                    <li class="flex justify-between mb-2">
                        <span>Tax ({{config('cart.tax')}}%)</span>
                        <span>${{number_format($taxAfterDiscount,2)}}</span>
                    </li>
                    <li class="flex justify-between ">
                        <span>Total</span>
                        <span class="font-bold">${{number_format($totalAfterDiscount,2)}}</span>
                    </li>
                    @else 
                    <li class="flex justify-between mb-2">
                        <span>Tax</span>
                        <span>${{Cart::instance('cart')->tax()}}</span>
                    </li>
                    <li class="flex justify-between mb-2">
                        <span>Shipping</span>
                        <span>Free Shipping</span>
                    </li>
                    <li class="flex justify-between ">
                        <span>Total</span>
                        <span class="font-bold">${{Cart::instance('cart')->total()}}</span>
                    </li>
                    @endif 
                </ul>
                <hr class="border-0 w-[100%] inline-block  h-[1px] bg-color-gray-background-light" />
                <ul class="flex mt-2">
                    <li class="mx-2"><img class="w-[60px] h-[30px]" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/PayPal_logo.svg/2560px-PayPal_logo.svg.png" /></li>
                    <li class="mx-2"><img class="w-[60px] h-[30px]" src="data:image/png;base64,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" /></li>
                    <li class="mx-2"><img class="w-[60px] h-[30px]" src="data:image/png;base64,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" /></li>
                    <li class="mx-2"><img class="w-[60px] h-[30px]" src="data:image/png;base64,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" /></li>
                </ul>
            </div>
            <button wire:click.prevent="checkout" class="rounded bg-color-red-button flex 
                justify-center items-center w-[90%] mx-auto py-2 mt-3 cursor-pointer text-while
                ">
                <i class='bx bxl-paypal text-2xl text-[#455aab]'></i>
                <span><a href='#'>Check Out</a></span>
            </button>
        </div>
        @else 
        <h3 class="text-center text-3xl my-4 space-y-4">Cart Shopping is Empty</h3>
        <h4 class="text-center text-md my-4 mt-4">Add Products to it now</h4>
        <a class="bg-color-rating p-2 text-while mt-4 font-bold w-[140px] text-center mx-auto inline-block px-4 rounded-md" 
        href='{{route("shop")}}'>
            Shop Now
        </a>
        @endif
    </div>
    <div class="cart-shopping__ecommerce mt-3  w-[95%] lg:w-[90%] mx-auto" >
        <div class="cart-shopping__product">
            <h3 class="text-2xl">({{Cart::instance('saveForLater')->count()}}) item(s) Save For Later</h3>
            <div class="content__products-cart flex flex-col">
                <div class="products-cart-shopping-columns p-2">
                    <div class="product-img-name" >
                        <h3>Product</h3>
                    </div>
                    <div class="product-price-cart-shoppping">
                        <h3>Price</h3>
                    </div>
                    <div class="product-action-cart-shoppping">
                        <h3>Action</h3>
                    </div>
                </div> 
                <hr class="border-none bg-color-gray-background-light h-[1px]"/>
                @if(Session::has('success_message'))
                    <div class="alert alert-success success-message py-3 text-center">
                        <strong>Success |  {{Session::get('success_message')}}</strong>
                    </div>
                @endif 
                @if(Cart::instance('saveForLater')->count() > 0)
                @foreach(Cart::instance('saveForLater')->content() as $item)
                    <div class="products-cart-shopping-columns p-1 border-b border-color-gray-background-light">
                        <div class="product-img-name photo-img-column">
                            <div class="flex items-center ">
                                @foreach($images as $image)
                                    @if($image->id == $item->model->img_id)
                                    <img 
                                    src="{{asset('products/'.$image->img)}}" 
                                    alt="" class="w-[80px] lg:w-[100px] h-[80px] lg:h-[110px] object-cover" />
                                    @endif
                                @endforeach
                                <p class="mx-3 text-xs md:text-sm lg:text-md">{{$item->model->name}}</p>
                            </div>
                        </div>
                        <div class="product-price-cart-shoppping justify-center flex items-center"> 
                            <p>{{$item->model->sale_price}}$</p>
                        </div>
                        <div class="product-quantity-cart-shoppping flex items-center justify-center">
                            <p>
                                <a href="#" wire:click.prevent="moveToCart('{{$item->rowId}}')">
                                    Move to Cart
                                </a>
                            </p>
                        </div>
                        
                        <div class="product-action-cart-shoppping flex items-center">
                            <button wire:click.prevent="removeItemFromSaveLater('{{$item->rowId}}')" 
                            class="p-1 rounded-md text-xl">
                                <i class='bx bx-trash text-color-red-button'></i>
                            </button>
                            <button class="text-xl">
                                <i class='bx bx-heart '></i>
                            </button>
                            <button class="text-xl">
                                <i class='bx bx-edit-alt' ></i>
                            </button>
                        </div>
                    </div>
                @endforeach
                @else 
                <p>No Item Save for later</p>
                @endif 
            </div>
            <div style='justify-content:flex-end' class='flex mt-2'>
                <button wire:click.prevent="destroyAll()" class='button-delete'>Clear All</button>
            </div>
            <div class="flex justify-between mt-3">
                <a href="#" class="flex opacity-90 transition hover:opacity-100 text-while justify-center items-center py-1 px-3  bg-color-red-button rounded-lg">
                    <i class='bx bx-chevron-left w-[25px]'></i>
                    <span class="">continue shopping</span>
                </a>
                <a href="#" class="flex text-md opacity-90 transition hover:opacity-100 text-while justify-center items-center py-1 px-3  bg-color-rating rounded-lg">
                    Pay
                </a>
            </div>
        </div>
    </div>
</div>
