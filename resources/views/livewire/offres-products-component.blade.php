<div>
    <div class="w-[90%] mx-auto product__wishlist-page">
        <style>
            .paginations{
                width: 100%;
                display: flex;
                justify-content: center;
            }
            .paginations  div nav div:nth-child(1){
                display: none;
            }
            .wishlested{
                background-color: red !important;
               
            }
            .wishlested i{
                color: white !important;
            }
            
        </style>
        <div class="products-shop-page p-2 py-5">
            <div class="products-shop">
                @php 
                $witems=Cart::instance('wishlist')->content()->pluck('id');
                @endphp
                @foreach($products as $product)
                    <div class="product">
                        @foreach ($images as $image)
                            @if ($product->img_id == $image->id)
                                <a class="relative" href="{{route('product.details',['slug'=>$product->slug])}}">
                                    <span style="background: rgb(255, 244, 202);color:rgb(246, 184, 41);" class="absolute z-50 flex p-1 px-3 my-2 mx-3 rounded-2xl">
                                        -{{$percent}}%
                                    </span>
                                    <div class="header-product bg-cover bg-center  h-[50%] bg-color-rating ">
                                        <img style='width:100%;height:100%' src="{{asset("products/".$image->img)}}" alt="">
                                    </div>
                                </a>
                            @endif
                        @endforeach
                        <div class="body-product p-1">
                            <h3 class="md:text-sm lg:text-lg my-0">{{$product->name}}</h3>
                            @foreach($product->tags as $tag)
                                <a href="#" class="text-sm my-0 ">{{$tag->name}}</a> &
                            @endforeach
                            <div class="flex items-center">
                                <h2 class="text-xl font-bold text-color-red-button mx-1">${{$product->sale_price}}</h2>
                                <span class="text-xs old__price-span">${{$product->regular_price}}</span>
                            </div>
                            <p class="text-sm text-color-gray-background-light">Shipping Cost: <span class="font-bold">$20</span></p>
                            <p class="text-sm text-color-gray-background-light">Stock: <span class="font-bold" style="color:rgb(106, 240, 106)">Available</span></p>
                            <div class=" flex items-center justify-between mt-2">
                                <div class="ratings">
                                    <i class='bx bx-star text-color-rating'></i>
                                    <i class='bx bx-star text-color-rating'></i>
                                    <i class='bx bx-star text-color-rating'></i>
                                    <i class='bx bx-star text-color-rating'></i>
                                    <i class='bx bx-star text-color-rating'></i>
                                    <span class="text-color-gray-background-light text-sm ">(6)</span>
                                </div>
                                <div class="btns-cart-wish flex">
                                    <button class="btn__cart-shopping">
                                        
                                        @php 
                                        $new_price=$product->sale_price - ($product->sale_price * $percent)/100;
                                        @endphp 
                                        <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$new_price}})" 
                                            href="#"><i class='bx bx-cart-alt'></i>
                                        </a>
                                    </button>
                                    @if($witems->contains($product->id)) 
                                    <button wire:click.prevent="removeFromWishlist({{$product->id}})" class="btn__cart-wishlist wishlested"><a href="#"><i class='bx bx-heart'></i></a></button>
                                    @else 
                                    <button wire:click.prevent="addToWishlist({{$product->id}},'{{$product->name}}',{{$product->sale_price}})" class="btn__cart-wishlist">
                                        <a href="#"><i class='bx bx-heart'></i></a>
                                    </button>
                                    @endif 
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>