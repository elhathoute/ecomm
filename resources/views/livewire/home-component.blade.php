<div>
    <!--navbar slider img-->
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
    <div class="slider__home">
        @foreach($sliders as $slider)
        <div class="container-slide">
            <div>
                <div  
                class="content-slider"  style="background-color:{{$slider->colors}};">
                <div class="info__slider">
                    <p class="paragraph__slide hidden-motion">Has just arrived!</p>
                    <h2 class="heading__slide hidden-motion">{{$slider->title}}</h2>
                    <span class="span__slide hidden-motion">{{$slider->description}}</span>
                </div>
                @php  $slug = Str::slug($slider->title, '-');@endphp
                <a style="z-index: 10000" class="opacity-100" href="{{route('slider.products',['slug'=>$slug])}}">
                    Show Now <i class='bx bx-chevron-right'></i>
                </a>
                </div>
                <div class="img-slider bg-color-red-button" 
                style="background-image: url('{{asset('sliders/'.$slider->image)}}');
                background-size: cover;
                background-position: center;
                "
                >
                    
                </div>
            </div>
        </div>
        @endforeach 
        <ul class="bullets-pagination left-[50%] z-30  
            absolute flex bottom-2  h-5 
            translate-x-[-50%] items-center justify-center">
        <!--
            
            <li class="w-3 h-3 p-0 transition  mx-1 border border-1 border-color-red-button rounded-full cursor-pointer active"></li>
            <li class="w-3 h-3 p-0  mx-1 border border-1 transition border-color-red-button rounded-full cursor-pointer"></li>
            <li class="w-3 h-3 p-0  mx-1 border border-1 transition border-color-red-button rounded-full cursor-pointer"></li>
            <li class="w-3 h-3 p-0  mx-1 border border-1 transition border-color-red-button rounded-full cursor-pointer"></li>
        
        -->
        </ul>
        <span class="absolute right-5 opacity-0 flex  invisible top-[50%] translate-y-[-50%] w-11 h-11 
            items-center justify-center  z-20 rounded-full cursor-pointer
            span-icons-slier span-icons-slier-right">
            <i class='bx bxs-chevron-right scale-x-[1.5] scale-y-[1.9] icon-right-slider icon-slider'></i>
        </span> 
        <span class="absolute left-5 opacity-0 flex invisible top-[50%] translate-y-[-50%] w-11 h-11  
            items-center justify-center  z-20 rounded-full cursor-pointer
            span-icons-slier span-icons-slier-left">
            <i class='bx bxs-chevron-left scale-x-[1.5] scale-y-[1.9] icon-left-slider icon-slider' ></i>
        </span>
    </div>
    <!--categories products -->
    <div class="category__slider-product-home h-[100px] sm:h-[100px] md:h-[150px] lg:h-[160]  mx-1 md:mx-10 lg:mx-28 my-1 bg-color-red-button relative shadow-md">
        <div class="content__categories">
            <div class="category-home">
                @foreach($subcategories as $subcategory)
                    <a href="{{route('product.subcategory',['slug'=>$subcategory->slug])}}">
                        <div style="overflow:hidden" 
                        class="box-category mx-2 md:mx-3 sm:min-w-[80px] sm:h-[80px] md:min-w-[120px] md:h-[120px] lg:min-w-[140px] lg:h-[140px]">
                            <img style="width:100%;height:100%" src="{{asset('subcategories/'.$subcategory->image)}}"/>
                        </div>
                    </a>
                @endforeach 
            </div>
        </div>
        <i class='bx bx-chevron-right arrow-categories-slider-home arrow_right-categories-slider-home'></i>
        <i class='bx bx-chevron-left arrow-categories-slider-home arrow_left-categories-slider-home' ></i>
    </div>
    <!--products offre-->
    @if($carousel_product_offre->count() > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now()) 
        <div class="products__offre-home mt-2 rounded-lg h-[100px] sm:h-[480px] md:h-[400px] lg:h-[420px] overflow-hidden  mx-1 md:mx-10 lg:mx-28  shadow-md relative">
            <div class="offre__header-home  h-10 md:h-12 lg:h-14  bg-color-red-button flex justify-between px-4 items-center">
                <h3 class="flex items-center text-while">
                    <p class='w-6 h-6 md:w-8 md:h-8 bg-[url("https://cdn-icons-png.flaticon.com/128/5775/5775289.png")] mx-2 bg-center bg-cover bg-color-gray-dark'></p>
                    <p>Vite</p> 
                </h3>
                <div class="crono__offre-home ">
                    <h3 data-expire='{{Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s')}}' class="text-lg timer-crono md:text-2xl lg:text-3xl font-bold text-while">
                        
                    </h3>
                </div>
                <p><a class="text-md md:text-xl text-while" href="#">more...</a></p>
            </div>
            <div class="offre__body-home p-3 relative">
                @php 
                    $witems=Cart::instance('wishlist')->content()->pluck('id');
                @endphp
                @foreach($carousel_product_offre as $product)
                <div class="product__offre sm:min-w-[200px]    md:min-w-[210px] lg:min-w-[270px]">
                    @foreach ($images as $image) 
                    @if ($product->img_id == $image->id)
                    <a href="{{route('product.details',['slug'=>$product->slug])}}">
                        <div class="header-product bg-center bg-cover h-[50%] bg-color-rating transition">
                            <img style='width:100%;height:100%' src="{{asset("products/".$image->img)}}" alt="" />
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
                                    <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})" 
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
            <i class='bx bxs-chevron-right icon-offre-home right-icon-offre-product-home'></i>
            <i class='bx bxs-chevron-left  icon-offre-home left-icon-offre-product-home' ></i>
        </div> 
    @endif 
    <script> 
        console.log();
        //date 
        var date_finals=document.querySelector('.timer-crono').dataset.expire
        let timer=setInterval(function(){
            let date_now=new Date().getTime()
            let date_final=new Date(date_finals).getTime()
            console.log(date_final)
            console.log(date_now)
            let distance=date_final - date_now
            let days=Math.floor(distance/(1000*60*60*24))
            let hours=Math.floor((distance%(1000*60*60*24))/(1000*60*60))
            let minutes=Math.floor((distance%(1000*60*60))/(1000*60))
            let seconds=Math.floor((distance%(1000*60))/1000)
            document.querySelector('.timer-crono').innerHTML=days+"d "+hours+"h "+minutes+"m "+seconds+"s "
            if(distance<0){
                clearInterval(timer)
                document.querySelector('.timer-crono').innerHTML="EXPIRED"
            }
        },1000)
    </script>
    <!--start adds home-->
    <div class="offre-ads-home-one mt-2 mx-1 md:mx-10 lg:mx-28  gap-1">
        <div class="content-ads-home-offre h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$offres_shoes[0]->name])}}" class="ads-photo ads-photo-hide  absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Destockage/NewArrivageADI/378X252_copie_3_copy_3_copie_5.png')]
                bg-center bg-cover
                ">
            </a>
            <a href="{{route('offre.products',['offre'=>$offres_shoes[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Destockage/Mode/378X252_copie_3_copy_3_copie_7.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$offfes_chockolate[0]->name])}}" class="ads-photo ads-photo-hide absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Destockage/Beaute/378X252_copie_3_copy_3_copie_9.png')]
                bg-center bg-cover
                ">
            </a>
            <a href="{{route('offre.products',['offre'=>$offfes_chockolate[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Destockage/Supermarche/v2/378X252_copie_3_copy_3_copie_3.jpg')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$offres_TV_washing[0]->name])}}" class="ads-photo ads-photo-hide absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/7-Tvs/378X252_copie_3_copy_3_copie_5.png')]
                bg-center bg-cover
                ">
            </a>
            <a href="{{route('offre.products',['offre'=>$offres_TV_washing[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Ads/ElectroBousfiha/Promos/378X252_copie_3_copy_3_Electro_Bou.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
    </div>
    <!--product-slider 1-->
    <div class="products__slider-home-one products__offre-home mt-2 rounded-lg h-[100px] sm:h-[480px] md:h-[400px] lg:h-[420px] overflow-hidden  mx-1 md:mx-10 lg:mx-28  shadow-md relative">
        <div class="offre__header-home  h-10 md:h-12 lg:h-14  bg-color-red-button flex justify-between px-4 items-center">
            <h3 class="flex items-center text-while">
                <p class='w-6 h-6 md:w-8 md:h-8 bg-[url("https://cdn-icons-png.flaticon.com/128/5775/5775289.png")] mx-2 bg-center bg-cover bg-color-gray-dark'></p>
                <p>Vite</p>
            </h3>
            <p><a class="text-md md:text-xl text-while" href="#">more...</a></p>
        </div>
        <div class="offre__body-home p-3 relative">
            @php 
                $witems=Cart::instance('wishlist')->content()->pluck('id');
            @endphp
            @foreach($lproducts as $product)
                <div class="product__offre sm:min-w-[200px]    md:min-w-[210px] lg:min-w-[270px]">
                    <div class="header-product bg-cover h-[50%] bg-color-rating ">
                        @foreach ($images as $image)
                            @if ($product->img_id == $image->id)
                                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                        <img style='width:100%;height:100%' src="{{asset("products/".$image->img)}}" alt="">
                                </a>
                            @endif
                        @endforeach
                    </div>
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
                                    <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"
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
        <i class='bx bxs-chevron-right icon-offre-home right-icon-offre-product-home'></i>
        <i class='bx bxs-chevron-left  icon-offre-home left-icon-offre-product-home' ></i>
    </div>
    <!--offre-two-->
    <div class="offre-ads-home-two mt-2 mx-1 md:mx-10 lg:mx-28  gap-1">
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$offre_shoes_boat_livrison[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Ads/FLO/3/572x250.jpg')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$offre_cousin[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Ads/GroupeSEB/572x250_.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
    </div>
    <div class="offre-ads-home-two mt-2 mx-1 md:mx-10 lg:mx-28  gap-1">
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$visage_soin[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Ads/Nivea/572x250.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$lc_wikiki[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Ads/Waikiki/DDB.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
    </div>
    <!--product-slider 2-->
    <div class="products__slider-home-one products__offre-home mt-2 rounded-lg h-[100px] sm:h-[480px] md:h-[400px] lg:h-[420px] overflow-hidden  mx-1 md:mx-10 lg:mx-28  shadow-md relative">
        <div class="offre__header-home  h-10 md:h-12 lg:h-14  bg-color-red-button flex justify-between px-4 items-center">
            <h3 class="flex items-center text-while">
                <p class='w-6 h-6 md:w-8 md:h-8 bg-[url("https://cdn-icons-png.flaticon.com/128/5775/5775289.png")] mx-2 bg-center bg-cover bg-color-gray-dark'></p>
                <p>Vite</p>
            </h3>
            <p><a class="text-md md:text-xl text-while" href="#">more...</a></p>
        </div>
        <div class="offre__body-home p-3 relative">
            @php 
                $witems=Cart::instance('wishlist')->content()->pluck('id');
            @endphp
            @foreach($products_shoes as $product)
                <div class="product__offre sm:min-w-[200px]    md:min-w-[210px] lg:min-w-[270px]">
                    <div class="header-product bg-cover h-[50%] bg-color-rating ">
                        @foreach ($images as $image)
                            @if ($product->img_id == $image->id)
                                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                        <img style='width:100%;height:100%' src="{{asset("products/".$image->img)}}" alt="">
                                </a>
                            @endif
                        @endforeach
                    </div>
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
                                    <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"
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
        <i class='bx bxs-chevron-right icon-offre-home right-icon-offre-product-home'></i>
        <i class='bx bxs-chevron-left  icon-offre-home left-icon-offre-product-home' ></i>
    </div>
    <!--product-slider 3-->
    <div class="products__slider-home-one products__offre-home mt-2 rounded-lg h-[100px] sm:h-[480px] md:h-[400px] lg:h-[420px] overflow-hidden  mx-1 md:mx-10 lg:mx-28  shadow-md relative">
        <div class="offre__header-home  h-10 md:h-12 lg:h-14  bg-color-red-button flex justify-between px-4 items-center">
            <h3 class="flex items-center text-while">
                <p class='w-6 h-6 md:w-8 md:h-8 bg-[url("https://cdn-icons-png.flaticon.com/128/5775/5775289.png")] mx-2 bg-center bg-cover bg-color-gray-dark'></p>
                <p>Vite</p>
            </h3>
            <p><a class="text-md md:text-xl text-while" href="#">more...</a></p>
        </div>
        <div class="offre__body-home p-3 relative">
            @php 
                $witems=Cart::instance('wishlist')->content()->pluck('id');
            @endphp
            @foreach($products_cousine_machine as $product)
                <div class="product__offre sm:min-w-[200px]    md:min-w-[210px] lg:min-w-[270px]">
                    <div class="header-product bg-cover h-[50%] bg-color-rating ">
                        @foreach ($images as $image)
                            @if ($product->img_id == $image->id)
                                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                        <img style='width:100%;height:100%' src="{{asset("products/".$image->img)}}" alt="">
                                </a>
                            @endif
                        @endforeach
                    </div>
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
                                    <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"
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
        <i class='bx bxs-chevron-right icon-offre-home right-icon-offre-product-home'></i>
        <i class='bx bxs-chevron-left  icon-offre-home left-icon-offre-product-home' ></i>
    </div>
    <!--product-slider 4-->
    <div class="products__slider-home-one products__offre-home mt-2 rounded-lg h-[100px] sm:h-[480px] md:h-[400px] lg:h-[420px] overflow-hidden  mx-1 md:mx-10 lg:mx-28  shadow-md relative">
        <div class="offre__header-home  h-10 md:h-12 lg:h-14  bg-color-rating flex justify-between px-4 items-center">
            <h3 class="flex items-center text-while">
                <p class='w-6 h-6 md:w-8 md:h-8 bg-[url("https://cdn-icons-png.flaticon.com/128/5775/5775289.png")] mx-2 bg-center bg-cover bg-color-gray-dark'></p>
                <p>Vite</p>
            </h3>
            <p><a class="text-md md:text-xl text-while" href="#">more...</a></p>
        </div>
        <div class="offre__body-home p-3 relative">
            @php 
                $witems=Cart::instance('wishlist')->content()->pluck('id');
            @endphp
            @foreach($products_propre as $product)
                <div class="product__offre sm:min-w-[200px] md:min-w-[210px] lg:min-w-[270px]">
                    <div class="header-product bg-cover h-[50%] bg-color-rating ">
                        @foreach ($images as $image)
                            @if ($product->img_id == $image->id)
                                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                        <img style='width:100%;height:100%' src="{{asset("products/".$image->img)}}" alt="">
                                </a>
                            @endif
                        @endforeach
                    </div>
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
                                    <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"
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
        <i class='bx bxs-chevron-right icon-offre-home right-icon-offre-product-home'></i>
        <i class='bx bxs-chevron-left  icon-offre-home left-icon-offre-product-home' ></i>
    </div>
     <!--offre-two-->
     <div class="offre-ads-home-two mt-2 mx-1 md:mx-10 lg:mx-28  gap-1">
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$free_livrison[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/Z-Jex/DB.jpg')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$food_offre->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2022/Z-HP-Elements/572x250_copy.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
    </div>
    <!--offre-for-->
    <div class="offre-ads-home-three mt-2 mx-1 md:mx-10 lg:mx-28  gap-1">
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$offre_tv_32[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/7-Tvs/378X252_copie_3_copy_3_copie_6-2.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$offre_tv_40[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/7-Tvs/378X252_copie_3_copy_3_copie_6v2.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$offre_tv_50[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/7-Tvs/378X252_copie_3_copy_3_copie_6-1v2.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
    </div>
    <!--product-slider 4-->
    <div class="products__slider-home-one products__offre-home mt-2 rounded-lg h-[100px] sm:h-[480px] md:h-[400px] lg:h-[420px] overflow-hidden  mx-1 md:mx-10 lg:mx-28  shadow-md relative">
        <div class="offre__header-home  h-10 md:h-12 lg:h-14  bg-color-red-button flex justify-between px-4 items-center">
            <h3 class="flex items-center text-while">
                <p class='w-6 h-6 md:w-8 md:h-8 bg-[url("https://cdn-icons-png.flaticon.com/128/5775/5775289.png")] mx-2 bg-center bg-cover bg-color-gray-dark'></p>
                <p>Vite</p>
            </h3>
            <p><a class="text-md md:text-xl text-while" href="#">more...</a></p>
        </div>
        <div class="offre__body-home p-3 relative">
            @php 
                $witems=Cart::instance('wishlist')->content()->pluck('id');
            @endphp
            @foreach($products_TV as $product)
                <div class="product__offre sm:min-w-[200px] md:min-w-[210px] lg:min-w-[270px]">
                    <div class="header-product bg-cover h-[50%] bg-color-rating ">
                        @foreach ($images as $image)
                            @if ($product->img_id == $image->id)
                                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                        <img style='width:100%;height:100%' src="{{asset("products/".$image->img)}}" alt="">
                                </a>
                            @endif
                        @endforeach
                    </div>
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
                                    <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"
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
        <i class='bx bxs-chevron-right icon-offre-home right-icon-offre-product-home'></i>
        <i class='bx bxs-chevron-left  icon-offre-home left-icon-offre-product-home' ></i>
    </div>
    <!--offre-five-->
    <div class="offre-ads-home-three mt-2 mx-1 md:mx-10 lg:mx-28  gap-1">
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$maquikage[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/4-Beaute/378X252_copie_3_copy_3_copie_4.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$soin_visage_70[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/4-Beaute/378X252_copie_3_copy_3_copie_5.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$cheaveau[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/4-Beaute/378X252_copie_3_copy_3_copie_3.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
    </div> 
    <!--product-slider 4-->
    <div class="products__slider-home-one products__offre-home mt-2 rounded-lg h-[100px] sm:h-[480px] md:h-[400px] lg:h-[420px] overflow-hidden  mx-1 md:mx-10 lg:mx-28  shadow-md relative">
        <div class="offre__header-home  h-10 md:h-12 lg:h-14  bg-color-red-button flex justify-between px-4 items-center">
            <h3 class="flex items-center text-while">
                <p class='w-6 h-6 md:w-8 md:h-8 bg-[url("https://cdn-icons-png.flaticon.com/128/5775/5775289.png")] mx-2 bg-center bg-cover bg-color-gray-dark'></p>
                <p>Vite</p>
            </h3>
            <p><a class="text-md md:text-xl text-while" href="#">more...</a></p>
        </div>
        <div class="offre__body-home p-3 relative">
            @php 
                $witems=Cart::instance('wishlist')->content()->pluck('id');
            @endphp
            @foreach($products_propse_2 as $product)
                <div class="product__offre sm:min-w-[200px] md:min-w-[210px] lg:min-w-[270px]">
                    <div class="header-product bg-cover h-[50%] bg-color-rating ">
                        @foreach ($images as $image)
                            @if ($product->img_id == $image->id)
                                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                        <img style='width:100%;height:100%' src="{{asset("products/".$image->img)}}" alt="">
                                </a>
                            @endif
                        @endforeach
                    </div>
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
                                    <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"
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
        <i class='bx bxs-chevron-right icon-offre-home right-icon-offre-product-home'></i>
        <i class='bx bxs-chevron-left  icon-offre-home left-icon-offre-product-home' ></i>
    </div>
    <!--offre-six-->
    <div class="offre-ads-home-three mt-2 mx-1 md:mx-10 lg:mx-28  gap-1">
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$cousine_machine[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/5-Maison/378X252_copie_3_copy_3_copie_4.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$aspirateur[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/5-Maison/378X252_copie_3_copy_3_copie_5.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$room_bad[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/5-Maison/378X252_copie_3_copy_3_copie_3_copy.jpg')]
                bg-center bg-cover
                ">
            </a>
        </div>
    </div>
    <!--product-slider 4-->
    <div class="products__slider-home-one products__offre-home mt-2 rounded-lg h-[100px] sm:h-[480px] md:h-[400px] lg:h-[420px] overflow-hidden  mx-1 md:mx-10 lg:mx-28  shadow-md relative">
        <div class="offre__header-home  h-10 md:h-12 lg:h-14  bg-color-red-button flex justify-between px-4 items-center">
            <h3 class="flex items-center text-while">
                <p class='w-6 h-6 md:w-8 md:h-8 bg-[url("https://cdn-icons-png.flaticon.com/128/5775/5775289.png")] mx-2 bg-center bg-cover bg-color-gray-dark'></p>
                <p>Vite</p>
            </h3>
            <p><a class="text-md md:text-xl text-while" href="#">more...</a></p>
        </div>
        <div class="offre__body-home p-3 relative">
            @php 
                $witems=Cart::instance('wishlist')->content()->pluck('id');
            @endphp
            @foreach($tools_home as $product)
                <div class="product__offre sm:min-w-[200px] md:min-w-[210px] lg:min-w-[270px]">
                    <div class="header-product bg-cover h-[50%] bg-color-rating ">
                        @foreach ($images as $image)
                            @if ($product->img_id == $image->id)
                                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                        <img style='width:100%;height:100%' src="{{asset("products/".$image->img)}}" alt="">
                                </a>
                            @endif
                        @endforeach
                    </div>
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
                                    <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"
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
        <i class='bx bxs-chevron-right icon-offre-home right-icon-offre-product-home'></i>
        <i class='bx bxs-chevron-left  icon-offre-home left-icon-offre-product-home' ></i>
    </div>
    <!--offre-six-->
    <div class="offre-ads-home-three mt-2 mx-1 md:mx-10 lg:mx-28  gap-1">
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$smart_phone[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/6-Telephonie/1v3.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$accesoir[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/6-Telephonie/3v3.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$casque[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/6-Telephonie/378X252_copie_3_copy_3_copie_5.png')]
                bg-center bg-cover
                ">
            </a>
        </div>
    </div>
    <!--product-slider 4-->
    <div class="products__slider-home-one products__offre-home mt-2 rounded-lg h-[100px] sm:h-[480px] md:h-[400px] lg:h-[420px] overflow-hidden  mx-1 md:mx-10 lg:mx-28  shadow-md relative">
        <div class="offre__header-home  h-10 md:h-12 lg:h-14  bg-color-red-button flex justify-between px-4 items-center">
            <h3 class="flex items-center text-while">
                <p class='w-6 h-6 md:w-8 md:h-8 bg-[url("https://cdn-icons-png.flaticon.com/128/5775/5775289.png")] mx-2 bg-center bg-cover bg-color-gray-dark'></p>
                <p>Vite</p>
            </h3>
            <p><a class="text-md md:text-xl text-while" href="#">more...</a></p>
        </div>
        <div class="offre__body-home p-3 relative">
            @php 
                $witems=Cart::instance('wishlist')->content()->pluck('id');
            @endphp
            @foreach($phones as $product)
                <div class="product__offre sm:min-w-[200px] md:min-w-[210px] lg:min-w-[270px]">
                    <div class="header-product bg-cover h-[50%] bg-color-rating ">
                        @foreach ($images as $image)
                            @if ($product->img_id == $image->id)
                                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                        <img style='width:100%;height:100%' src="{{asset("products/".$image->img)}}" alt="">
                                </a>
                            @endif
                        @endforeach
                    </div>
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
                                    <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"
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
        <i class='bx bxs-chevron-right icon-offre-home right-icon-offre-product-home'></i>
        <i class='bx bxs-chevron-left  icon-offre-home left-icon-offre-product-home' ></i>
    </div>
    <!--offre-six-->
    <div class="offre-ads-home-three mt-2 mx-1 md:mx-10 lg:mx-28  gap-1">
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$laptop[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/8-Informatique/378X252_copie_3_copy_3_copie_3_copy_3.jpg')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$accesoir_laptop[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/8-Informatique/378X252_copie_3_copy_3_copie_3_copy_2.jpg')]
                bg-center bg-cover
                ">
            </a>
        </div>
        <div class="content-ads-home-offre-2 h-96 bg-color-red-button  rounded-lg relative overflow-hidden">
            <a href="{{route('offre.products',['offre'=>$ordinateur_offre[0]->name])}}" class="ads-photo absolute top-0 left-0 w-full h-full 
                bg-[url('https://ma.jumia.is/cms/000_2023/000001_Janvier/Camps/2-Promotions/8-Informatique/378X252_copie_3_copy_3_copie_3_copy.jpg')]
                bg-center bg-cover
                ">
            </a>
        </div>
    </div>
    <!--product-slider 4-->
    <div class="products__slider-home-one products__offre-home mt-2 rounded-lg h-[100px] sm:h-[480px] md:h-[400px] lg:h-[420px] overflow-hidden  mx-1 md:mx-10 lg:mx-28  shadow-md relative">
        <div class="offre__header-home  h-10 md:h-12 lg:h-14  bg-color-red-button flex justify-between px-4 items-center">
            <h3 class="flex items-center text-while">
                <p class='w-6 h-6 md:w-8 md:h-8 bg-[url("https://cdn-icons-png.flaticon.com/128/5775/5775289.png")] mx-2 bg-center bg-cover bg-color-gray-dark'></p>
                <p>Vite</p>
            </h3>
            <p><a class="text-md md:text-xl text-while" href="#">more...</a></p>
        </div>
        <div class="offre__body-home p-3 relative">
            @php 
                $witems=Cart::instance('wishlist')->content()->pluck('id');
            @endphp
            @foreach($laptop_slider as $product)
                <div class="product__offre sm:min-w-[200px] md:min-w-[210px] lg:min-w-[270px]">
                    <div class="header-product bg-cover h-[50%] bg-color-rating ">
                        @foreach ($images as $image)
                            @if ($product->img_id == $image->id)
                                <a href="{{route('product.details',['slug'=>$product->slug])}}">
                                        <img style='width:100%;height:100%' src="{{asset("products/".$image->img)}}" alt="">
                                </a>
                            @endif
                        @endforeach
                    </div>
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
                                    <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"
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
        <i class='bx bxs-chevron-right icon-offre-home right-icon-offre-product-home'></i>
        <i class='bx bxs-chevron-left  icon-offre-home left-icon-offre-product-home' ></i>
    </div>
</div>
