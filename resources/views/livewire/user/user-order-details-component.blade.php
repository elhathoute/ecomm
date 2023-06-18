<div>
    <div class="products__tables">
        <style>
            .canceled{
                color: #e53e3e;
                background:rgb(253, 230, 230);
                display: inline-block;
                padding: 0.2rem 0.8rem;
            }
        </style>
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
    
    <div class="flex flex-col gap-2 md:flex-row mt-7">
        <div class='relative overflow-x-auto w-[99%]  md:w-[80%]  shadow-lg sm:rounded-lg mt-6'>
    <!--model insert categories to database-->
            @if(Session::has('order_message'))
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="flex gap-5  mx-7 mb-14">
                    <a href="{{route('user.orders')}}" class=" text-color-gray-background-ligh">My Orders</a>
                    @if($orders->status == 'ordered')
                    <a href="#" wire:click.prevent="cancelOrder" class="canceled rounded-md cursor-pointer">Canceled</a>
                    @endif 
                </div>
    
                <h3 class="w-[95%] mx-auto">Order Details</h3>
                <table class="w-[95%]  mx-auto mb-5 text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">OrderID</th>
                            <td>{{$orders->id}}</td>
                            <th scope="col" class="px-6 py-3 text-center">Order Date</th>
                            <td>{{$orders->created_at}}</td>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <td>{{$orders->status}}</td>
                            @if($orders->status == 'delivered')
                                <th scope="col" class="px-6 py-3">Delivered Date</th>
                                <td>{{$orders->delivered_date}}</td>
                            @elseif($orders->status == 'canceled')
                                <th scope="col" class="px-6 py-3">Canceled Date</th>
                                <td>{{$orders->canceled_date}}</td>
                            @endif
                        </tr>
                    </thead>
                </table>
                <hr class='border-0 bg-color-gray-background-light h-[1px]'>
    
    
    
                <table class="w-[95%] mx-auto mt-5  mb-5 text-sm text-left text-gray-500 dark:text-gray-400">
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
                                @if($orders->status == 'delivered' && $item->rstatus==false)
                                    <th scope="row" class="px-6 py-4 font-medium  text-gray-900 whitespace-nowrap dark:text-white">
                                        <a href="{{route('user.review',$item->id)}}" class=' bg-color-rating text-white px-2 py-1 rounded-md'>Review</a>
                                    </th>
                                @endif
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
                    <div class="relative overflow-x-auto">
                        <table class="w-[30%] border text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs border text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">
                                        Subtotal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Shipping
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tax
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$orders->subtotal}}$
                                    </th>
                                    <td class="px-6 py-4">
                                        Free
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$orders->tax}}$
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$orders->total}}$
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($orders->is_shipping_different)
                <hr class="border-0 inline-block my-2 bg-color-gray-background-light w-full h-[1px] ">
                <div class="w-[95%] mx-auto">
                    <h3 class="font-bold">Shipping Details</h3>
                    <div class="relative overflow-x-auto">
                        <table class="w-[80%] border text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs border text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">First Name</th>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">Last Name</th>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">Email</th>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">Phone</th>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">Adress</th>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">Adress 2</th>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">Zip Code</th>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">Country</th>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">Date Created Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$orders->shipping->firstname}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$orders->shipping->lastname}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$orders->shipping->email}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$orders->shipping->phone}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$orders->shipping->line1}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$orders->shipping->line2}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$orders->shipping->zipcode}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$orders->shipping->country->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $orders->shipping->created_at)->format('D, M d, Y')}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif 
                <hr class="border-0 inline-block my-2 bg-color-gray-background-light w-full h-[1px] ">
                <div class="w-[95%] mx-auto">
                    <h3 class="font-bold">Transactions</h3>
                    <div class="relative overflow-x-auto">
                        <table class="w-[30%] border text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs border text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 rounded-l-lg">Transaction Mode</th>
                                    <th scope="col" class="px-6 py-3">Status</th>
                                    <th scope="col" class="px-6 py-3">Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$orders->transaction->mode}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$orders->transaction->status}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $orders->transaction->created_at)->format('D, M d, Y')}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
</div>