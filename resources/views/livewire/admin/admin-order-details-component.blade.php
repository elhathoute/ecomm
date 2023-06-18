<div class="products__tables">
    <div class='header__product-lists'>
         <div class='left__product-header flex justify-between'>
              <h1 class='text-xl md:text-3xl font-bold'>Orders Details</h1>
              <a href="{{route('admin.orders')}}">
                 <button onClick="" class='bg-color-red-button opacity-80 transition hover:opacity-100
                 cursor-pointer outline-none border-none rounded-md text-while py-1 px-3 add-button'>
                    All Orders 
                 </button>
              </a>
         </div>
         <div class="body__products-dashboard">
              <form class='mt-3'>
                   <div class='fields relative border border-color-gray-background-light 
                   bg-color-red-button w-[95%] md:w-[60%] overflow-hidden rounded-md'>
                        <input type='search' id='search-color' class='py-3  px-8 w-[100%] h-[100%]' name='search' placeholder="Search" />
                        <i class='bx bx-search-alt text-color-gray-background-light text-2xl 
                        absolute left-[10px] top-[50%] translate-y-[-50%]'></i>
                   </div>
              </form>
              
              <div class="relative overflow-x-auto w-[99%] md:w-[95%] mx-auto shadow-lg sm:rounded-lg mt-10">
                   
              </div>
         </div>
    </div>
</div>

</div>
<!--/Add Product-->
                   <!--table products-->
              </div>
<!--start-->

<!--end-->
<!--start edit --> 

<!--end edit -->
<div class="flex flex-col gap-2 md:flex-row mt-7">
<div class='relative overflow-x-auto w-[99%]  md:w-[80%]  shadow-lg sm:rounded-lg mt-6'>
<!--model insert categories to database-->
@if(Session::has('message'))
 <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
@endif
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    



    <table class="w-[95%] mx-auto mt-5 text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   OrderID  
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                   Product
                </th>
                <th scope="col" class="px-6 py-3">
                   Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                   Price 
                </th>
                <th scope="col" class="px-6 py-3">
                    Color 
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Size  
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders->orderItems as $item)
                <tr class="bg-white border-b border-b-color-gray-background-light  
                dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        #{{$item->id}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class='flex items-center flex-col justify-center mx-2'>
                            @foreach($image as $img)
                                @if($img->id == $item->product->img_id)
                                    <img src="{{asset('products/'.$img->img)}}" alt="" class='w-11 h-11 rounded-full'>
                                @endif
                            @endforeach 
                            <span> {{$item->product->name}} </span>
                        </div>
                    </th> 
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->quantity}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->price * $item->quantity}}$
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->color_id}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->size_id}}
                    </th>
                    <td class="flex items-center px-6 py-4 space-x-3">
                        <i class='bx bxs-edit-alt transition cursor-pointer hover:text-[#0ea5e9] hover:bg-[#e0f2fe] text-xl flex items-center justify-center p-1 w-9 h-9 rounded-full bg-[#f8fafc]'></i>
                        <i class='bx bx-trash transition cursor-pointer hover:text-[#0ea5e9] hover:bg-[#e0f2fe] text-xl p-1 flex items-center justify-center rounded-full w-9 h-9 bg-[#f8fafc]' ></i>
                        <a href="#">
                            <i class='bx bx-detail transition cursor-pointer hover:text-[#0ea5e9] hover:bg-[#e0f2fe] text-xl flex items-center justify-center p-1 w-9 h-9 rounded-full bg-[#f8fafc]'></i>
                        </a>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
    <div class="w-[95%] mx-auto">
        <h3 class="font-bold">Order Summary</h3>
        <ul>
            <li class="flex gap-2">
                <span>Subtotal:</span> 
                <span class="font-bold">{{$orders->subtotal}}$</span>
            </li>
            <li class="flex gap-2">
                <span>Shipping:</span> 
                <span class="font-bold">Free</span>
            </li>
            <li class="flex gap-2">
                <span>Tax:</span> 
                <span class="font-bold">{{$orders->tax}}$</span>
            </li>
            <li class="flex gap-2">
                <span>Total:</span> 
                <span class="font-bold">{{$orders->total}}$</span>
            </li>
        </ul>
    </div>
    @if($orders->is_shipping_different)
    <hr class="border-0 inline-block my-2 bg-color-gray-background-light w-full h-[1px] ">
    <div class="w-[95%] mx-auto">
        <h3 class="font-bold">Shipping Details</h3>
        <ul>
            <li class="flex gap-2">
                <span>Shipping:</span> 
                <ul>
                    <li class="flex gap-3">
                        <span>FirstName:</span>
                        <span class="font-bold">{{$orders->shipping->firstname}}</span>
                    </li>
                    <li class="flex gap-3">
                        <span>LastName:</span>
                        <span class="font-bold">{{$orders->shipping->lastname}}</span>
                    </li>
                    <li class="flex gap-3">
                        <span>Email:</span>
                        <span class="font-bold">{{$orders->shipping->email}}</span>
                    </li>
                    <li class="flex gap-3">
                        <span>Phone:</span>
                        <span class="font-bold">{{$orders->shipping->phone}}</span>
                    </li>
                    <li class="flex gap-3">
                        <span>Address:</span>
                        <span class="font-bold">{{$orders->shipping->line1}}</span>
                    </li>
                    <li class="flex gap-3">
                        <span>Address2:</span>
                        <span class="font-bold">{{$orders->shipping->line2}}</span>
                    </li>
                    <li class="flex gap-3">
                        <span>zipcode:</span>
                        <span class="font-bold">{{$orders->shipping->zipcode}}</span>
                    </li>
                    <li class="flex gap-3">
                        <span>Country:</span>
                        <span class="font-bold">{{$orders->shipping->country->name}}</span>
                    </li>
                    <li class="flex gap-3">
                        <span>Date create order:</span>
                        <span class="font-bold">{{$orders->shipping->created_at}}</span>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    @endif 
    <hr class="border-0 inline-block my-2 bg-color-gray-background-light w-full h-[1px] ">
    <div class="w-[95%] mx-auto">
        <h3 class="font-bold">Transactions</h3>
        <ul>
            <li class="flex gap-2">
                <span>Transaction Mode:</span> 
                <span class="font-bold">{{$orders->transaction->mode}}</span>
            </li>
            <li class="flex gap-2">
                <span>Status:</span> 
                <span class="font-bold">{{$orders->transaction->status}}</span>
            </li>
            <li class="flex gap-2">
                <span>Created at:</span> 
                <span class="font-bold">{{$orders->transaction->created_at}}</span>
            </li>
        </ul>
    </div>
</div>
</div>
</div>
</div>
<div class='right__product-header'>

</div>
</div>
</div>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>





