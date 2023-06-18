<div class="products__tables">
    <div class='header__product-lists'>
        <div class='left__product-header flex justify-between'>
             <h1 class='text-xl md:text-3xl font-bold'>Customers</h1>
        </div> 
        <div class="body__products-dashboard">
             <form class='mt-3'>
                  <div class='fields relative border border-color-gray-background-light 
                  bg-color-red-button w-[95%] md:w-[60%] overflow-hidden rounded-md'>
                       <input type='search' class='py-3  px-8 w-[100%] h-[100%]' name='search' placeholder="Search" />
                       <i class='bx bx-search-alt text-color-gray-background-light text-2xl 
                       absolute left-[10px] top-[50%] translate-y-[-50%]'></i>
                  </div>
             </form>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <table class="w-[95%] mx-auto text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Phone
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                user type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Approve
                            </th>
                            <th scope="col" class="px-6 py-3">
                                No of Orders
                            </th>
                            <th scope='col' class="px-6 py-3">
                                Status 
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="bg-white border-b border-b-color-gray-background-light dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600
                                    bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                1
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class='flex items-center mx-2'>
                                    <img src='{{$user->img}}' class="w-8 h-8 rounded-full" />
                                    <span>{{$user->username}}</span>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                @if(!empty($user->profile))
                                    {{$user->profile->phone}}
                                @else 
                                    No Info Details 
                                @endif 
                            </td>
                            <td class="px-6 py-4">
                                {{$user->email}}
                            </td>
                            <td class="px-6 py-4">
                                {{$user->utype}}
                            </td>
                            <td class="px-6 py-4">
                                <input id="approve{{$user->id}}" type="checkbox" hidden value=0 
                                wire:click.prevent="approve({{$user->id}})" />
                                <label class="flex p-2 px-0 bg-color-red-button text-while  
                                rounded cursor-pointer justify-center" for="approve{{$user->id}}">
                                    Approve
                                </label>
                            </td>
                            <td class="px-6 py-4">10</td>
                            <td class="px-6 py-4">
                                <form> 
                                    <label
                                        wire:click.prevent="status_user({{$user->id}})" 
                                        type="submit" id="status_user{{$user->id}}" 
                                        class="relative inline-flex items-center cursor-pointer">
                                        <input {{$user->status== 1 ? 'checked' : ''}} 
                                        
                                        id="status_user{{$user->id}}" 
                                        type="checkbox" value="{{$user->id}}" class="sr-only peer">
                                        <div class="w-11 h-6 bg-color-red-button rounded-full peer peer-focus:ring-4 peer-focus:bg-color-gray-background-light
                                        dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full 
                                        peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] 
                                        after:bg-color-red-button after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 
                                        after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                </form>
                            </td>
                            <td class="flex items-center px-6 py-4 space-x-3">
                                <i wire:click.prevent="deleteUser({{$user->id}})" class='bx bx-trash transition cursor-pointer hover:text-[#0ea5e9] hover:bg-[#e0f2fe] text-xl p-1 flex items-center justify-center rounded-full w-9 h-9 bg-[#f8fafc]' ></i>
                            </td>
                    </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
