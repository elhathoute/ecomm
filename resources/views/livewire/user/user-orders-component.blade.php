<div>
    <style>
        .ordered{
            color: #f6e05e;
            background:rgb(255, 233, 191);
            display: inline-block;
            padding: 0.2rem 0.8rem;
        }
        .delivered{
            color: #38a169;
            background:rgb(209, 250, 229);
            display: inline-block;
            padding: 0.2rem 0.8rem;
        }
        .canceled{
            color: #e53e3e;
            background:rgb(253, 230, 230);
            display: inline-block;
            padding: 0.2rem 0.8rem;
        }
    </style>
    <div class="products__tables">
        <div class='header__product-lists'>
             <div class='left__product-header flex justify-between'>
                  <h1 class='text-xl md:text-3xl font-bold'>Products</h1>
                  <a href="{{route('admin.add.coupons')}}">
                     <button onClick="" class='bg-color-red-button opacity-80 transition hover:opacity-100
                     cursor-pointer outline-none border-none rounded-md text-while py-1 px-3 add-button'>
                         <span class='font-bold'>+</span> Add
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
            @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-[98%] mx-auto text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                            OrderID
                            </th>
                            <th scope="col" class="px-6 py-3">
                            SubTotal
                            </th>
                            <th scope="col" class="px-6 py-3">
                            Discount 
                            </th>
                            <th scope="col" class="px-6 py-3">
                            Tax
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Customer 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Mobile 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email  
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ZipCode 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Order Date 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                            <th>
            
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr class="bg-white border-b border-b-color-gray-background-light  
                            dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    #{{$order->id}}
                                </th>
                                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$order->subtotal}}$
                                </th>
                                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$order->discount}}$
                                </th>
                                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$order->tax}}$
                                </th>
                                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$order->total}}$
                                </th>
                                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class='flex items-center flex-col justify-center mx-2'>
                                        <img src='{{$order->user->img}}' class="w-8 h-8 rounded-full" />
                                        <span> {{$order->firstname . $order->lastname}} </span>
                                    </div>
                                </th>
                                <td class="px-1 py-4">
                                    {{$order->phone}}
                                </td>
                                <td class="px-1 py-4">
                                    {{$order->email}}
                                </td>
                                <td class="px-1 py-4">
                                    {{$order->zipcode}}
                                </td>
                                <td class="px-1 py-4">
                                    <span class="rounded-md {{$order->status=='delivered' ? 'delivered' : ($order->status=='canceled' ? 'canceled' : 'ordered')}}"> 
                                        {{$order->status}}
                                    </span>
                                </td>
                                <td class="px-1 py-4">
                                    <span>
                                        {{$order->created_at}}
                                    </span>
                                </td>
                                <td class="flex items-center px-1 py-4 space-x-1">
                                    <i class='bx bxs-edit-alt transition cursor-pointer hover:text-[#0ea5e9] hover:bg-[#e0f2fe] text-xl flex items-center justify-center p-1 w-9 h-9 rounded-full bg-[#f8fafc]'></i>
                                    <i class='bx bx-trash transition cursor-pointer hover:text-[#0ea5e9] hover:bg-[#e0f2fe] text-xl p-1 flex items-center justify-center rounded-full w-9 h-9 bg-[#f8fafc]' ></i>
                                    <a href="{{route('user.order.details',$order->id)}}">
                                        <i class='bx bx-detail transition cursor-pointer hover:text-[#0ea5e9] hover:bg-[#e0f2fe] text-xl flex items-center justify-center p-1 w-9 h-9 rounded-full bg-[#f8fafc]'></i>
                                    </a>
                                </td>
                                <td class="px-1 py-4">
                                    <a href="#" wire:click.prevent="updateStatusOrder({{$order->id}},'delivered')"><i style="color:rgb(150, 255, 150);"  class='bx bx-check-circle text-2xl cursor-pointer'  ></i></a>
                                    <a href="#" wire:click.prevent="updateStatusOrder({{$order->id}},'canceled')"><i    style="color:rgb(250, 145, 145);"  class=' bx bx-x-circle text-2xl cursor-pointer'></i></a>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            
                {{$orders->links()}}
            </div>
        </div>
    </div>
    
   
</div>





