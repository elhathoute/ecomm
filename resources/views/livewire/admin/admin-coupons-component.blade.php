<div class="products__tables">
               <div class='header__product-lists'>
                    <div class='left__product-header flex justify-between'>
                         <h1 class='text-xl md:text-3xl font-bold'>Coupons</h1>
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
         <table class="w-full text-sm text-left text-blue-100 dark:text-blue-100">
              <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
                   <tr>
                        <th scope="col" class="px-6 py-3">#ID</th>
                        <th scope="col" class="px-6 py-3">Type</th>
                        <th scope="col" class="px-6 py-3">Code</th>
                        <th scope="col" class="px-6 py-3">Value</th>
                        <th scope="col" class="px-6 py-3">Cart Value</th>
                        <th scope="col" class="px-6 py-3">Expiry Date</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                   </tr>
              </thead>
              <tbody class='body__table'>
                @foreach($coupons as $coupon)
                <tr class="bg-blue-500 border-b border-b-color-gray-background-light border-blue-400">
                    <th scope="row" class="px-6 py-4 flex items-center gap-2 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                        {{$coupon->id}}
                    </th>
                    @if($coupon->type == 'fixed')
                    <td class="px-6 py-4">${{$coupon->value}}</td>
                    @else
                    <td class="px-6 py-4">{{$coupon->value}}%</td>
                    @endif
                    <td class="px-6 py-4">
                        {{$coupon->code}}
                    </td>
                    <td class="px-6 py-4">
                        {{$coupon->value}}
                    </td>
                    <td class="px-6 py-4">
                        {{$coupon->cart_value}}
                    </td>
                    <td class="px-6 py-4">
                        {{$coupon->expiry_date}}
                    </td>
                    <td class="px-6 py-4">
                        <div class='flex gap-1 items-center'>
                            <a href="{{route('admin.edit.coupons',['coupon_id'=>$coupon->id])}}">
                                <span  class='button_edit' data-id=''>
                                    <i class='bx bxs-edit text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#dcfce7] text-[#4ade80]' ></i>
                                </span>
                            </a>
                            <span onclick="confirm('Are you sure you want to delete this item?') || event.stopImmediatePropagation()')"
                            wire:click.prevent="deleteCoupon({{$coupon->id}})" class='button_delete' data-id=''><i class='bx bxs-trash text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#fee2e2] text-[#f87171]' ></i></span>
                        </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
         </table>
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





