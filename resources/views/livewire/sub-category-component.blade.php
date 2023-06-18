<div>
    <!--Shopping page -->
    <div class="shopping__page">
        <style>
            .paginations{
                width: 100%;
                display: flex;
                justify-content: center;
            }
            .paginations  div nav div:nth-child(1){
                display: none;
            }
        </style>
        <div class="header__controll__shopping__page md:px-20 bg-color-red-button">
            <div class="empty__row">
                
            </div>
            <div class="content__header">
                <div class="options__sorting">
                    <select class="w-full p-4 rounded-lg outline-none border-0 cursor-pointer select__sorting">
                        <option selected>Sort By</option>
                        <option selected>Choose a country</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>
                <div class="options__limit-showings">
                    <select class="w-full p-4 rounded-lg outline-none border-0 cursor-pointer select__sorting">
                        <option selected>Shows</option>
                        <option wire:click.prevent="changePageSize(15)">15</option>
                        <option wire:click.prevent="changePageSize(20)">20</option>
                        <option wire:click.prevent="changePageSize(25)">25</option>
                        <option wire:click.prevent="changePageSize(30)">30</option>
                        <option wire:click.prevent="changePageSize(35)">35</option>
                    </select>
                </div>
                <div class="grid__list__systeme-products">
                    <div class="parent__icon">
                        <div><i class='bx bx-list-ul icon__list '></i></div>
                        <div><i class='bx bxs-grid-alt active' ></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="body__controll__shopping__page px-1 sm:px-5 md:px-6 lg:px-20 ">
            <div class="filter__products-shop-page shadow-lg py-5 px-5  text-[#333]">
                <h3 class="text-xl mb-4" >Categories</h3>
                <div class="categories___dropdown">
                    @foreach($categories as $category)
                        <div class="category">
                            <div class="flex justify-between px-2 py-1 shoes ">
                                <h2 class="hover:text-color-red-button transition">{{$category->name}}</h2>
                                <span class="flex justify-center items-center 
                                    rounded-full w-6 h-6 span__drop-down" onclick="toggle__dropdown(event)" > 
                                    <i class='bx bx-chevron-down font-bold cursor-pointer drop__down-icon'></i>
                                </span>
                            </div>
                            <div class="details mt-2 transition shows_removing">
                                <form class="px-3">
                                    <div class="relative"> 
                                        <i class='bx bx-search-alt text-color-gray-background-light text-xl absolute left-2 top-[50%]' style="transform:translateY(-50%)" ></i>
                                        <input
                                            placeholder="Search..." 
                                            type="search" 
                                            class="border border-color-gray-background-light outline-none w-full 
                                            focus:border-color-red-button
                                            py-1.5 px-7 rounded-lg overflow-hidden"/>
                                    </div>
                                </form>
                                <div class="px-4 py-2 flex flex-col h-[170px] overflow-hidden overflow-y-scroll mt-2 other__categories">
                                    @foreach($category->subCategories as $subcategory)
                                        <a href="{{route('product.subcategory',['slug'=>$subcategory->slug])}}" class="flex justify-between items-center w-full mb-2">
                                            <span class="text-md font-medium text-color-gray-dark hover:text-color-red-button 
                                            opacity-[0.7] transition">{{$subcategory->name}}</span>
                                            <span class="text-md font-medium text-color-gray-dark hover:text-color-red-button  
                                            opacity-[0.7] transition">
                                                {{$subcategory->products->count()}}
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr class="w-[80%] mx-auto my-6 border-0  h-[1px] ">
                <h3 class="text-xl" >Price{{$min}}-{{$max}}</h3>
                <div class="range-price mt-3 px-0 py-[10px]">
                    <div class="heading flex justify-between items-center">
                        <h5>Price(DHS)</h5>
                        <input class="sub-price" type="submit" value="OK">
                    </div>
                    <div class="slider">
                        <div class="progress">

                        </div>
                    </div>
                    <div class="range-input">
                        
                        <input wire:model="min" type="range" class="range-min" min="0" max="10000" value="{{$min}}" step="100">
                        <input wire:model="max" type="range" class="range-max" min="0" max="10000" value="{{$max}}" step="100">
                    </div>
                    <div class="price-input">
                        <div class="field border  rounded-md">
                            <span class="font-bold py-2 text-lg">$</span>
                            <input type="number" class="input-min py-2" value='{{$min}}'>
                        </div>
                        <div class="separateur">-</div>
                        <div class="field border rounded-md">
                            <span class="font-bold py-2 text-lg">$</span>
                            <input type="number" class="input-max py-2" value="10000">
                        </div>
                    </div>
                </div>
                <br>
                <hr class="w-[80%] mx-auto my-6 border-0  h-[1px] ">
                <h3 class="text-xl" >Brands</h3>
                <div class="categories___dropdown">
                    <div class="category mt-6">
                        
                        <div class="details mt-2 transition">
                            <form class="px-3">
                                <div class="relative"> 
                                    <i class='bx bx-search-alt text-color-gray-background-light text-xl absolute left-2 top-[50%]' style="transform:translateY(-50%)" ></i>
                                    <input
                                        placeholder="Search..." 
                                        type="search" 
                                        class="border border-color-gray-background-light outline-none w-full 
                                        focus:border-color-red-button
                                        py-1.5 px-7 rounded-lg overflow-hidden"/>
                                </div>
                            </form>
                            <div class="px-4 py-2 flex flex-col h-[170px] overflow-hidden overflow-y-scroll mt-2 other__categories">
                                @foreach($brands as $brand)
                                    <a href="#" class="flex justify-between items-center w-full mb-2">
                                        <span class="text-xs font-medium text-color-gray-dark hover:text-color-red-button opacity-[0.7] transition">
                                        <input wire:model="brands_filter" value="{{$brand->id}}" id='brand{{$brand->id}}' type="radio"/>
                                        <label for='brand{{$brand->d}}'>{{$brand->name}}</label>
                                        </span>
                                        <span class="text-xs font-medium text-color-gray-dark hover:text-color-red-button  opacity-[0.7] transition">
                                            {{$brand->product->count()}}
                                        </span>
                                    </a>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="w-[80%] mx-auto my-6 border-0  h-[1px] ">
                <h3 class="text-xl" >Size</h3>
                <div class="categories___dropdown">
                    <div class="category mt-6">
                        
                        <div class="details mt-2 transition">
                            <form class="px-3">
                                <div class="relative"> 
                                    <i class='bx bx-search-alt text-color-gray-background-light text-xl absolute left-2 top-[50%]' style="transform:translateY(-50%)" ></i>
                                    <input
                                        placeholder="Search..." 
                                        type="search" 
                                        class="border border-color-gray-background-light outline-none w-full 
                                        focus:border-color-red-button
                                        py-1.5 px-7 rounded-lg overflow-hidden"/>
                                </div>
                            </form>
                            <div class="px-4 py-2 flex flex-col h-[170px] overflow-hidden overflow-y-scroll mt-2 other__categories">
                                @foreach($sizes as $size) 
                                <a href="#" class="flex justify-between items-center w-full mb-2">
                                    <span class="text-xs font-medium text-color-gray-dark hover:text-color-red-button opacity-[0.7] transition">
                                     <input wire:model="sizes_filter" id='size{{$size->id}}' type="radio" value="{{$size->id}}"/>
                                     <label for='size{{$size->id}}'>{{$size->name}}</label>
                                    </span>
                                    <span class="text-xs font-medium text-color-gray-dark hover:text-color-red-button  opacity-[0.7] transition">
                                        {{$size->products->count()}}
                                    </span>
                                </a>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl mt-4" >Colors</h3>
                <div class="w-[95%] mx-auto my-2 h-[150px] p-4 flex flex-wrap colors-filter-shop-page-parent">
                    @foreach($colors as $color)
                    <div class="w-[24%] mx-[0.5%]  flex justify-center items-center cursor-pointer colors-filter-shop-page">
                        <input wire:model="colors_filter" type="radio" value="{{$color->id}}" hidden id="{{$color->name}}">
                        <label for='{{$color->name}}' class="w-[45px] h-[45px] rounded-full  p-1 
                            flex justify-center items-center border labels-colors">
                            <span style="background: {{$color->code}}" class="w-[37px] h-[37px]  rounded-full"></span>
                        </label>
                    </div>
                    @endforeach 
                </div>
            </div>
            <div class="products-shop-page p-2 py-5">
                <div class="products-shop">
                    @foreach($products as $product)
                        <div class="product ">
                            @foreach ($images as $image)
                                @if ($product->img_id == $image->id)
                                    <a href="{{route('product.details',['slug'=>$product->slug])}}">
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
                                            <a wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})" 
                                                href="#"><i class='bx bx-cart-alt'></i>
                                            </a>
                                        </button>
                                        <button class="btn__cart-wishlist"><a href="#"><i class='bx bx-heart'></i></a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class='paginations'>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer page-->
</div>
