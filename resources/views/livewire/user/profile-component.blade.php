<!--profile page-->
<div class="profile___user-page  flex w-[100%] md:w-[95%] mx-auto">
    <style>
        .hidden-form{
            display: none;
        }
    </style>
    <div class='profile__information p-2 shadow-md'>
        <div class="content__profile w-[100%] md:w-[90%] mx-auto">
            <div class="profile__user w-[100%]">
                <div class="profile__user-avatar w-[80px]  md:w-[100px] mx-auto flex-col">
                    
                    <img class="w-[80px] md:w-[100px] h-[80px] md:h-[100px] rounded-full" src="{{asset('storage/app/public/users/7sMYaSL4cdSGHsidnUXtzHbRXFBJCnLTX1OYKAsO.jpg')}}" alt="">
                    
                    <h3 class="text-xs md:text-sm mt-2">{{$user->username}}</h3>
                    
                </div>
                <p class=" text-xs md:text-lg font-bold text-color-red-button text-center">{{$user->email}}</p>
                <p class="flex gap-1 md:gap-3  justify-center mt-2">
                    <i class='bx  p-1 md:p-2 w-[20px] h-[20px] md:w-[30px] md:h-[30px] items-center justify-center rounded-full md:text-xl bxl-facebook flex text-while bg-[#1778f2] cursor-pointer opacity-95 hover:opacity-100 transition'></i>
                    <i class='bx  p-1 md:p-2 w-[20px] h-[20px] md:w-[30px] md:h-[30px] items-center justify-center rounded-full md:text-xl bxl-instagram flex  text-while instagram__icons cursor-pointer opacity-95 hover:opacity-100 transition' ></i>
                    <i class='bx  p-1 md:p-2 w-[20px] h-[20px] md:w-[30px] md:h-[30px] items-center justify-center rounded-full md:text-xl bxl-google-plus flex text-while bg-[#db4a39] cursor-pointer opacity-95 hover:opacity-100 transition' ></i>
                    <i class='bx  p-1 md:p-2 w-[20px] h-[20px] md:w-[30px] md:h-[30px] items-center justify-center rounded-full md:text-xl bxl-linkedin flex text-while bg-[#559bf1] cursor-pointer opacity-95 hover:opacity-100 transition' ></i>
                </p>
                <p class="flex justify-between items-center mt-7">
                    <span class="text-xs font-normal md:font-bold md:text-sm">Phone :</span>
                    <span class="text-color-red-button text-xs font-normal md:font-bold md:text-sm">
                        {{$user->profile->phone}}
                    </span>
                </p>
                <p class="flex justify-between  items-center mt-7">
                    <span class="text-xs font-normal md:font-bold md:text-sm">Adress :</span>
                    <span class="text-color-red-button text-xs font-normal md:font-bold md:text-sm">
                        {{$user->profile->adress}}
                    </span>
                </p>
                <p class="flex justify-between  items-center mt-7">
                    <span class="text-xs font-normal md:font-bold md:text-sm">Email :</span>
                    <span class="text-color-red-button text-xs font-normal md:font-bold md:text-sm">
                        {{$user->email}}
                    </span>
                </p>
                <p class="flex justify-between  items-center mt-7">
                    <span class="text-xs font-normal md:font-bold md:text-sm">Site :</span>
                    <span class="text-color-red-button text-xs font-normal md:font-bold md:text-sm">nothing</span>
                </p>
                <input  value=1 type="checkbox" hidden  id='checkbox__verify-email' />
                <div class="mt-4">
                    <label 
                    for="checkbox__verify-email"
                    class='flex justify-center opacity-80 transition 
                    hover:opacity-100 items-center 
                    cursor-pointer
                    p-2 px-4 rounded bg-color-red-button
                    text-while'>Verify Email</label>
                </div>
                <div class="mt-4 content__form hidden-form">
                    <form class="">
                        <div class=" w-[100%]  md:w-[100%] relative">
                            <i class='bx bxs-user absolute left-1 top-[50%] translate-y-[-50%] text-color-gray-background-light'></i>
                            <input class="w-[100%] placeholder:text-xs transition outline-none border border-color-gray-background-light 
                            focus:border-color-red-button rounded-md h-[100%] py-3 px-5 text-sm placeholder:text-color-gray-background-light" 
                            type="text" wire:model="email_verifyuser" placeholder="First Name" />
                        </div>
                        <div>
                            <button class="flex p-2 px-4 bg-color-red-button     
                            rounded text-while mt-1" type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
    <div class='information__details shadow-md p-3'>
        <div class="flex justify-center items-center">
            <img  onclick='imgs(event)' 
            class="w-24 h-24 rounded-full img___profile"
            src="{{$user->img}}" alt="profile img"/>
        </div>
        <form wire:submit.prevent="formss" class="mt-10" method='POST'>
            <input id='input___img-profile' type="file" hidden wire:model="photo" />
            <div class="fields-profile flex flex-col md:flex-row items-center gap-3">
                <div class=" w-[100%]  md:w-[49%] relative">
                    <i class='bx bxs-user absolute left-1 top-[50%] translate-y-[-50%] text-color-gray-background-light'></i>
                    <input class="w-[100%] placeholder:text-xs transition outline-none border border-color-gray-background-light 
                    focus:border-color-red-button rounded-md h-[100%] py-3 px-5 text-sm placeholder:text-color-gray-background-light" 
                    type="text" wire:model="first_name" placeholder="First Name" />
                </div>
                <div class=" w-[100%]  md:w-[49%] relative">
                    <i class='bx bxs-user absolute left-1 top-[50%] translate-y-[-50%] text-color-gray-background-light'></i>
                    <input class="w-[100%] placeholder:text-xs transition  outline-none border border-color-gray-background-light 
                    focus:border-color-red-button rounded-md h-[100%] py-3 px-5 text-sm placeholder:text-color-gray-background-light" 
                    type="text" wire:model="last_name" placeholder="Last Name" />
                </div>
            </div>
            <div class="fields-profile flex flex-col md:flex-row mt-3 items-center gap-3">
                <div class="w-[100%]  md:w-[49%] relative">
                    <i class='bx bxs-envelope absolute left-1 top-[50%] translate-y-[-50%] text-color-gray-background-light'></i>
                    <input class="w-[100%] placeholder:text-xs transition outline-none border border-color-gray-background-light 
                    focus:border-color-red-button rounded-md h-[100%] py-3 px-5 text-sm placeholder:text-color-gray-background-light" 
                    type="email"   wire:model="email" placeholder="Email" />
                </div>
                <div class="w-[100%]  md:w-[49%] relative">
                    <i class='bx bxs-phone-call absolute left-1 top-[50%] translate-y-[-50%] text-color-gray-background-light'></i>
                    <input class="w-[100%] placeholder:text-xs transition  outline-none border border-color-gray-background-light 
                    focus:border-color-red-button rounded-md h-[100%] py-3 px-5 text-sm placeholder:text-color-gray-background-light" 
                    type="number" wire:model="phone" value="{{$user->phone}}" placeholder="Phone" />
                </div>
            </div>
            <div class="fields-profile flex flex-col md:flex-row mt-3 items-center gap-3">
                <div class="w-[100%]  md:w-[49%] relative">
                    <i class='bx bxs-envelope absolute left-1 top-[50%] translate-y-[-50%] text-color-gray-background-light'></i>
                    <input class="w-[100%] placeholder:text-xs transition outline-none border border-color-gray-background-light 
                    focus:border-color-red-button rounded-md h-[100%] py-3 px-5 text-sm placeholder:text-color-gray-background-light" 
                    type="text" wire:model="address" placeholder="address" />
                </div>
                <div class="w-[100%]  md:w-[49%] relative">
                    <i class='bx bxs-phone-call absolute left-1 top-[50%] translate-y-[-50%] text-color-gray-background-light'></i>
                    <input class="w-[100%] placeholder:text-xs transition  outline-none border border-color-gray-background-light 
                    focus:border-color-red-button rounded-md h-[100%] py-3 px-5 text-sm placeholder:text-color-gray-background-light" 
                    type="text" wire:model="address2" placeholder="adress2" />
                </div>
            </div>
            <div class="fields-profile flex flex-col md:flex-row mt-3 items-center gap-3">
                <div class="w-[100%]  md:w-[49%] relative">
                    <i class='bx bxs-envelope absolute left-1 top-[50%] translate-y-[-50%] text-color-gray-background-light'></i>
                    <input class="w-[100%] placeholder:text-xs transition outline-none border border-color-gray-background-light 
                    focus:border-color-red-button rounded-md h-[100%] py-3 px-5 text-sm placeholder:text-color-gray-background-light" 
                    type="text" wire:model="province" placeholder="province" />
                </div>
                <div class="w-[100%]  md:w-[49%] relative">
                    <i class='bx bxs-phone-call absolute left-1 top-[50%] translate-y-[-50%] text-color-gray-background-light'></i>
                    <input class="w-[100%] placeholder:text-xs transition  outline-none border border-color-gray-background-light 
                    focus:border-color-red-button rounded-md h-[100%] py-3 px-5 text-sm placeholder:text-color-gray-background-light" 
                    type="number" wire:model="zip" placeholder="zip" />
                </div>
            </div>
            <div class="fields-profile flex flex-col md:flex-row mt-3 items-center gap-3">
                <div class="w-[100%]  md:w-[49%] relative">
                    <select wire:model="country" class='border w-[100%] mt-2 p-3 rounded-md border-color-gray-background-light outline-none'>
                        <option value="1">Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-[100%]  md:w-[49%]  relative">
                    <select wire:model="city" class='border w-[100%] mt-2 p-3 rounded-md border-color-gray-background-light outline-none'>
                        <option value="1">City</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach 
                    </select>
                </div>
            </div>
            <div class="fields-profile flex mt-3 flex-col md:flex-row items-center gap-3">
                <div class=" w-[100%]  md:w-[49%] relative">
                    <i class='bx bxs-user absolute left-1 top-[50%] translate-y-[-50%] text-color-gray-background-light'></i>
                    <input class="w-[100%] placeholder:text-xs transition outline-none border border-color-gray-background-light 
                    focus:border-color-red-button rounded-md h-[100%] py-3 px-5 text-sm placeholder:text-color-gray-background-light" 
                    type="text" wire:model="street" placeholder="street" />
                </div>
            </div>
            <button class="mt-3 bg-color-red-button text-while py-[8px] text-sm px-4 rounded-md flex items-center justify-center">update</button>
        </form>
    </div>
    <div class='orders__products shadow-md p-4'>
        <!--History-->
        <h3 class="text-sm font-semibold transition">Your History</h3>
        <div class="h-28 space-y-0.5 md:space-y-2">
            <div class='group relative'>
                <i class='bx bx-chevron-left absolute top-0 bottom-0 left-2 
                z-40 m-auto h-9 cursor-pointer opacity-0 transition 
                hover:scale-125 group-hover:opacity-100'></i>
                <div class="flex scrollbar-hide box-thumbnail shadow-md items-center space-x-0.5 overflow-hidden overflow-x-scroll md:space-x-2.5 md:p-2">
                    @foreach($products as $product)
                    @foreach($images as $img)
                    @if($product->img_id == $img->id)
                        <div class="relative h-[100px] min-w-[100px] cursor-pointer transition duration-200 ease-out md:h-[100px] md:min-w-[100px] md:hover:scale-105">
                            <a href="#" class="rounded-sm md:rounded   overflow-hidden">
                                <img class=" object-cover w-24 h-24" 
                                src="{{asset('products/'.$img->img)}}" 
                                alt="product-user"/>
                            </a>
                        </div>
                    @endif 
                    @endforeach 
                    @endforeach 
                </div>
                <i class='bx bx-chevron-right absolute top-0 bottom-0 right-2 m-auto h-9 cursor-pointer opacity-0 transition hover:scale-125 group-opacity-100'></i>
            </div>
        </div>
        <!--Cart Shopping-->
        <h3 class="text-sm font-semibold transition mt-9">Your Cart Shopping</h3>
        <div class="h-28 space-y-0.5 md:space-y-2">
            <div class='group relative'>
                <i class='bx bx-chevron-left absolute top-0 bottom-0 left-2 
                z-40 m-auto h-9 cursor-pointer opacity-0 transition 
                hover:scale-125 group-hover:opacity-100'></i>
                <div class="flex scrollbar-hide box-thumbnail shadow-md items-center space-x-0.5 overflow-hidden overflow-x-scroll md:space-x-2.5 md:p-2">
                    @if(Cart::instance('cart')->count() > 0)
                        @foreach(Cart::instance('cart')->content() as $item)
                            @foreach($producs_all as $product)
                                @if($product->id==$item->model->id)
                                @foreach($images as $image)
                                    @if($image->id===$product->img_id)
                                    <div class="relative h-[100px] min-w-[100px] cursor-pointer transition duration-200 ease-out md:h-[100px] md:min-w-[100px] md:hover:scale-105">
                                        <a href="#" class="rounded-sm md:rounded overflow-hidden">
                                            <img class=" object-cover w-24 h-24" 
                                            src="{{asset('products/'.$image->img)}}" 
                                            alt="product-user"/>
                                        </a>
                                    </div>
                                    @endif 
                                @endforeach 
                                @endif 
                            @endforeach 
                        @endforeach 
                    @else 
                    <p>No Item in cart</p>
                    @endif 
                </div>
                <i class='bx bx-chevron-right absolute top-0 bottom-0 right-2 m-auto h-9 cursor-pointer opacity-0 transition hover:scale-125 group-opacity-100'></i>
            </div>
        </div>
        <!--Wishlist-->
        <h3 class="text-sm font-semibold transition mt-9">Your Wishlist</h3>
        <div class="h-28 space-y-0.5 md:space-y-2">
            <div class='group relative'>
                <i class='bx bx-chevron-left absolute top-0 bottom-0 left-2 
                z-40 m-auto h-9 cursor-pointer opacity-0 transition 
                hover:scale-125 group-hover:opacity-100'></i>
                <div class="flex scrollbar-hide box-thumbnail shadow-md items-center space-x-0.5 overflow-hidden overflow-x-scroll md:space-x-2.5 md:p-2">
                    @if(Cart::instance('wishlist')->count() > 0)
                        @foreach(Cart::instance('wishlist')->content() as $item)
                            @foreach($producs_all as $product)
                                @if($product->id==$item->model->id)
                                    @foreach($images as $image)
                                        @if($image->id===$product->img_id)
                                        <div class="relative h-[100px] min-w-[100px] cursor-pointer transition duration-200 ease-out md:h-[100px] md:min-w-[100px] md:hover:scale-105">
                                            <a href="#" class="rounded-sm md:rounded overflow-hidden">
                                                <img class=" object-cover w-24 h-24" 
                                                src="{{asset('products/'.$image->img)}}" 
                                                alt="product-user"/>
                                            </a>
                                        </div>
                                        @endif 
                                    @endforeach 
                                @endif 
                            @endforeach 
                        @endforeach 
                    @else 
                    <p>No Item in cart</p>
                    @endif 
                </div>
                <i class='bx bx-chevron-right absolute top-0 bottom-0 right-2 m-auto h-9 cursor-pointer opacity-0 transition hover:scale-125 group-opacity-100'></i>
            </div>
        </div>
    </div>
    <script>
        function imgs(e){
            document.querySelector('#input___img-profile').click()
        }

        document.querySelector('#checkbox__verify-email').addEventListener('change',function(){
            document.querySelector('.content__form').classList.remove('hidden-form')
        }) 
        
    </script>
</div>
<!--footer page--> 