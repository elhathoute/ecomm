<div>
    <!--product details-->
    <style>
        .sizes{
            opacity: .5;
            transition: .3s
        }
        .colors{
            opacity: .5;
            transition: .3s
        }
        .sizes:hover,.colors:hover{
            opacity: 1;
        }
        .sizes.click,.colors.click{
            opacity:1;
        }
    </style>
    <div class="product__details-page mx-2 md:mx-8 lg:mx-24 flex">
        <div class="products__details">
            <div class="product__principalte-details ">
                @foreach($images as $image)
                    @if($image->id==$product->img_id)
                        <img class="w-[100%] h-[370px]" 
                        src="{{asset('products/'.$image->img)}}" alt="" />
                    @endif 
                @endforeach
                <i class='bx bxs-chevron-right right-icon__product-details'></i>
                <i class='bx bxs-chevron-left  left-icon__product-details' ></i>
            </div>
            <div class="products__secondaires-details">
                <div class="product__secondary-detail">
                    @foreach($images as $image)
                        @if($image->id==$product->img_id)
                            <img data-index="0" class="w-[100%] h-[100%]" 
                            src="{{asset('products/'.$image->img)}}" alt="" />
                        @endif 
                    @endforeach
                </div>
                <div class="product__secondary-detail">
                    @foreach($images as $image)
                        @if($image->id==$product->img2_id)
                            <img data-index="1" class="w-[100%] h-[100%]" 
                            src="{{asset('products/'.$image->img)}}" alt="" />
                        @endif 
                    @endforeach
                </div>
                <div class="product__secondary-detail">
                    @foreach($images as $image)
                        @if($image->id==$product->img3_id)
                            <img data-index="2" class="w-[100%] h-[100%]" 
                            src="{{asset('products/'.$image->img)}}" alt="" />
                        @endif 
                    @endforeach
                </div>
                <div class="product__secondary-detail">
                    @foreach($images as $image)
                        @if($image->id==$product->img3_id)
                            <img data-index="3" class="w-[100%] h-[100%]" 
                            src="{{asset('products/'.$image->img)}}" alt="" />
                        @endif 
                    @endforeach
                </div>
            </div>
        </div>
        <div class="details___product-details">
            <h3>{{$product->name}}</h3>
            <p>
                @foreach($product->tags as $tag)
                    <a href="#" class="">{{$tag->name}}</a> 
                @endforeach
            </p>
            @php 
            $avgrating=0;
            @endphp
            <div class="ratings-product-details flex items-center gap-1">
                @if($product->orderItems->where('rstatus',1)->count()>0)
                    @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                        @php 
                            $avgrating+=$orderItem->review->rating;
                        @endphp
                    @endforeach 
                    @php 
                        $avgrating=round($avgrating/$product->orderItems->where('rstatus',1)->count());
                    @endphp
                    @for($i=1;$i<=5;$i++)
                        @if($i<=$avgrating)
                            <i style='color:gold' class='bx bxs-star'></i>
                        @else 
                            <i style='color:gray' class='bx bxs-star'></i>
                        @endif
                    @endfor 
                    <span class="text-lg text-gray-500">
                        review({{$product->orderItems->where('rstatus',1)->count()}})
                    </span>
                @else
                    <span class="text-lg text-gray-500">
                        No reviews yet
                    </span>
                @endif
                
            </div>
            <p class="description-details-products">
                {{$product->short_description}}
            </p>
            <div class="price__product-details">
                <h3>${{$product->regular_price}} <span>${{$product->sale_price}} -50%</span></h3>
            </div>
            <p class="shipping-product-details">Shipping Cost: <span>$50</span></p>
            <p class="stock__product-details">Stock: <span class="font-bold">Available</span></p>
            <div class="tags__product-details">
                <p><span>Tags : </span>
                    <span>
                        @foreach($product->tags as $tag)
                            <a href="#" class="">{{$tag->name}}</a> 
                        @endforeach
                    </span>
                </p>
            </div>
            <div class="size___products">
                <p><span>Size : </span>
                    <div class="flex gap-2">
                        @foreach($product->sizes as $size)
                            <div>
                                <label  onClick="add(event)" wire:click.model="size({{$size->id}})" for="{{$size->id}}" class="w-8 items-center justify-center h-8 bg-color-gray-background-light 
                                    font-bold inline-block p-3 rounded-sm cursor-pointer flex sizes">
                                    {{$size->name}}
                                </label>
                                <input hidden type="radio" id="{{$size->id}}" name="size" value="{{$size->id}}" />
                            </div>
                        @endforeach
                    </div>
                </p>
            </div>
            <div class="color__products">
                <p><span>Color : </span>
                    @php 
                        $colorss=array() ;
                        $quantity=array();
                        $pro=array();
                    @endphp
                    @foreach($product->sizes as $size)
                        @foreach($size->colors as $color)
                            @if($color->pivot->product_id == $product->id)
                            @php 
                            $colorss[]=$color->id  ;
                            $quantity['id']=$color->id;
                            $quantity['qty']=$color->pivot->quantity;
                            //push to array
                            array_push($pro,$quantity);

                            
                            @endphp
                            
                            @endif 
                        @endforeach 
                    @endforeach 
                    
                    @for($i=0;$i<count($pro);$i++)
                        @for($j=$i+1;$j<count($pro);$j++)
                            @if($pro[$i]['id']==$pro[$j]['id'])
                                @php 
                                    $pro[$i]['qty']=$pro[$i]['qty']+$pro[$j]['qty'];
                                    unset($pro[$j]);
                                    $pro=array_values($pro);
                                @endphp
                            @endif
                        @endfor
                    @endfor
                    
                    @php 

                        $colorss=array_unique($colorss);
                        sort($colorss);
                        
                        $i=0; 
                    @endphp
                    <div class="flex gap-2">
                        @foreach($colors as $key=>$color)
                        @if($i < count($pro))
                            @if($color->id==$pro[$i]['id'])
                                <label wire:click.model="color({{$color->id}})" style="background:{{$color->code}}" onClick="addc(event)" for="{{$color->id}}" class="cursor-pointer relative rounded-full w-11 h-11 flex colors">
                                    <span style="font-size:10px;color:#000;background:#fff;padding:0.5px" class="absolute  font-bold rounded-full bottom-0 right-0 z-40 flex">
                                        {{$pro[$i]['qty']}}
                                    </span>
                                </label>
                                <input  hidden type="radio" id="{{$color->id}}" name="color" value="{{$color->id}}" />
                                @php $i++ @endphp
                            @endif
                        @endif 
                       @endforeach 
                    </div>
                </p>
            </div>
            <div class="buttons__product-details mt-3 flex gap-2">
                <button class="btn__qty-product-details flex bg-color-red-button w-[25%] items-center 
                    outline-none rounded">
                    <span wire:click.prevent="decreaseQuantity()" class="w-[30%] flex justify-center items-center ">-</span>
                    <span wire:model="qty" class="w-[40%] flex justify-center items-center">{{$qty}}</span>
                    <span wire:click.prevent="increaseQuantity()" class="w-[30%] flex justify-center items-center">+</span>
                </button>
                <button
                    wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})" 
                    class="btn__cart-shopping-product-details flex bg-color-red-button w-[35%] items-center 
                    outline-none rounded justify-center text-[#fff]">
                    <span class="flex  items-center mx-2">
                        <i class='bx bxs-cart-add text-lg'></i>
                    </span>
                    <span  class="flex items-center text-xs font-semibold">
                        Add To Cart
                    </span>
                </button>
                <button class="btn__cart-wishlist flex bg-color-red-button w-[20%] items-center 
                outline-none rounded justify-center text-[#fff]">
                <span class="flex  items-center mx-1">
                    <i class='bx bx-heart' ></i>
                </span>
                <span class="flex items-center"> 
                    256
                </span>
            </button>
            </div>
        </div>
        
    </div>
    <!--review & description-->
    <div class="review-description-products mx-2 md:mx-8 lg:mx-24 p-3">
        <div class="header-review-description-products flex">
            <p class="mx-2 font-bold description">DESCRIPTION</p>
            <p class="mx-2 font-bold thisOpacity infos">ADDITIONEL INFO</p>
            <p class="mx-2 font-bold thisOpacity reviews">
                REVIEWS({{$product->orderItems->where('rstatus',1)->count()}})
            </p>
        </div>
        <div class="description__product-details mt-4 w-[70%]">
            <p>
                Uninhibited carnally hired played in whimpered dear gorilla koala 
                depending and much yikes off far quetzal goodness and from for 
                grimaced goodness unaccountably and meadowlark near unblushingly 
                crucial scallop tightly neurotic hungrily some and dear furiously
                this apart.
            </p>
            <p class="mt-3">
                Spluttered narrowly yikes left moth in yikes bowed this that 
                grizzly much hello on spoon-fed that alas rethought much decently 
                richly and wow against the frequent fluidly at formidable 
                acceptably flapped besides and much circa far over the 
                bucolically hey precarious goldfinch mastodon goodness gnashed 
                a jellyfish and one however because.
            </p>
            <ul class="my-5 w-[100%]" >
                <div class="flex my-2 text-color-gray-dark">
                    <li class="w-[20%]">Type Of Packing </li>
                    <span class="inline-block w-[50%] ml-5">Bottle</span>
                </div>
                <div class="flex my-2 text-color-gray-dark">
                    <li class="w-[20%]">Color </li>
                    <span class="inline-block w-[50%] ml-5">Green, Pink, Powder Blue, Purple</span>
                </div>
                <div class="flex my-2 text-color-gray-dark">
                    <li class="w-[20%]">Quantity Per Case </li>
                    <span class="inline-block w-[50%] ml-5">100ml</span>
                </div>
                <div class="flex my-2 text-color-gray-dark">
                    <li class="w-[20%]">Ethyl Alcohol </li>
                    <span class="inline-block w-[50%] ml-5">70%</span>
                </div>
                <div class="flex my-2 text-color-gray-dark">
                    <li class="w-[20%]">Piece In One </li>
                    <span class="inline-block w-[50%] ml-5">Piece In One</span>
                </div>
            </ul>
            <hr class="h-[1px] bg-color-gray-background-light" />
            <p class="mt-4 mb-14">
                Laconic overheard dear woodchuck wow this outrageously taut beaver 
                hey hello far meadowlark imitatively egregiously hugged that yikes 
                minimally unanimous pouted flirtatiously as beaver beheld above 
                forward energetic across this jeepers beneficently cockily less 
                a the raucously that magic upheld far so the this where crud then 
                below after jeez enchanting drunkenly more much wow callously 
                irrespective limpet.
            </p>
            <h3 class="mb-3">Packaging & Delivery</h3>
            <hr/>
            <p>
                Less lion goodness that euphemistically robin expeditiously bluebird 
                smugly scratched far while thus cackled sheepishly rigid after due one 
                assenting regarding censorious while occasional or this more crane went 
                more as this less much amid overhung anathematic because much held one 
                exuberantly sheep goodness so where rat wry well concomitantly.<br>

                Scallop or far crud plain remarkably far by thus far iguana lewd precociously
                and and less rattlesnake contrary caustic wow this near alas and next and
                pled the yikes articulate about as less cackled dalmatian in much less 
                well jeering for the thanks blindly sentimental whimpered less across 
                objectively fanciful grimaced wildly some wow and rose jeepers outgrew 
                lugubrious luridly irrationally attractively dachshund.
            </p>
        </div>
        <div class="info__product-details mt-4 hiddens">
            <table class=" w-[100%] md:w-[50%]">
                <thead>
                  <tr>
                    <th class="border border-slate-600">Info</th>
                    <th class="border border-slate-600"></th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-slate-700 p-3 py-1">Size</td>
                        <td class="border border-slate-700 p-3 py-1">M, S</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-700 p-3 py-1">Color</td>
                        <td class="border border-slate-700 p-3 py-1">Black, Blue, Red, White</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-700 p-3 py-1">Width</td>
                        <td class="border border-slate-700 p-3 py-1">24″</td>
                    </tr>
                    <tr>
                        <td class="border border-slate-700 p-3 py-1">Frame</td>
                        <td class="border border-slate-700 p-3 py-1">Aluminum</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="rating__product-details mt-4 flex hiddens">
            <div class="profile__commenter w-[50%]">
                @foreach($product->orderItems->where('rstatus',1) as $orderItem)
                <div class="flex items-center p-1">
                    <div class="profile-info mt-4 flex flex-col items-end px-4 w-[20%]">
                        <img 
                            class="w-[55px] h-[55px]" style="border-radius: 50%;" 
                            src="{{$orderItem->order->user->img}}" alt="" 
                        />
                        <p class="text-xs font-bold py-1">{{$orderItem->order->user->username}}</p>
                    </div>
                    <div class="profile-commenter">
                        <div class="rating__commenter-user">
                            @php $avgrating2=0; @endphp
                                @php 
                                    $avgrating2=$orderItem->review->rating;
                                @endphp
                            @for($i=1;$i<=5;$i++)
                                @if($i<=$avgrating2)
                                    <i style='color:gold' class='bx bxs-star'></i>
                                @else 
                                    <i style='color:gray' class='bx bxs-star'></i>
                                @endif
                            @endfor 
                            
                            <p class="text-sm">
                                {{$orderItem->review->comment}}
                            </p>
                            <span class="text-sm text-color-gray-background-light">
                                {{Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A')}}
                            </span>
                        </div>
                    </div>
                </div>
                <hr class="h-[1px] w-[100%]  bg-color-gray-background-light">
                @endforeach 
            </div>
            <div class="rating__profile-commenter  w-[30%] pl-16">
                <h3>Customer reviews</h3>
                <div class="flex items-center mt-4 ">
                    <i class='bx bxs-star text-color-rating'></i>
                    <i class='bx bxs-star text-color-rating'></i>
                    <i class='bx bxs-star text-color-rating'></i>
                    <i class='bx bxs-star text-color-rating'></i>
                    <i class='bx bxs-star text-color-rating'></i>
                    <span class="font-bold text-xs inline-block mx-4">4.8 out of 5</span>
                </div>
                <div class="">
                    <div class="flex mt-6 items-center flex-col">
                        <div class="flex mt-3">
                            <span class="text-xs">5 star</span>
                            <div class="w-[250px] mx-3 h-5 bg-color-gray-background-light">
                                <span class="h-[100%] w-[60%] bg-color-red-button flex items-center text-xs px-1 justify-end">
                                    50%
                                </span>
                            </div>
                        </div>
                        <div class="flex mt-4">
                            <span class="text-xs">5 star</span>
                            <div class="w-[250px] mx-3 h-5 bg-color-gray-background-light">
                                <span class="h-[100%] w-[40%] bg-color-red-button flex items-center text-xs px-1 justify-end">
                                    50%
                                </span>
                            </div>
                        </div>
                        <div class="flex mt-4">
                            <span class="text-xs">5 star</span>
                            <div class="w-[250px] mx-3 h-5 bg-color-gray-background-light">
                                <span class="h-[100%] w-[90%] bg-color-red-button flex items-center text-xs px-1 justify-end">
                                    50%
                                </span>
                            </div>
                        </div>
                        <div class="flex mt-4">
                            <span class="text-xs">5 star</span>
                            <div class="w-[250px] mx-3 h-5 bg-color-gray-background-light">
                                <span class="h-[100%] w-[20%] bg-color-red-button flex items-center text-xs px-1 justify-end">
                                    50%
                                </span>
                            </div>
                        </div>
                        <div class="flex mt-4">
                            <span class="text-xs">5 star</span>
                            <div class="w-[250px] mx-3 h-5 bg-color-gray-background-light">
                                <span class="h-[100%] w-[55%] bg-color-red-button flex items-center text-xs px-1 justify-end">
                                    50%
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
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

    <script>
        function add(e){
            document.querySelectorAll('.sizes').forEach((item)=>{
                item.classList.remove('click')
                //sibling item 
                item.nextElementSibling.checked = false
            })
            e.target.classList.add('click')
            e.target.nextElementSibling.checked = true
            console.log(e.target)
        }
        function addc(e){
            document.querySelectorAll('.colors').forEach((item)=>{
                item.classList.remove('click')
                item.nextElementSibling.checked = false
            })
            e.target.classList.add('click')
            e.target.nextElementSibling.checked = true
            console.log(e.target)
        }
    </script>
</div>
