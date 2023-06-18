<div>
    <div class='w-90% mx-auto flex gap-2'>
        <div class="w-[50%] shadow-lg">
            <div class="details-information-user">
                <div class="flex justify-center p-5">
                    <img src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png" 
                    class=" h-44 w-44 rounded-full"/>
                </div>
                <div class="info__profile-user p-5">
                    <div class="flex justify-center">
                        <h1 class="text-2xl font-bold text-center text-white">Mustapha</h1>
                    </div>
                    <div class="flex justify-center">
                        <h1 class="text-xl font-bold text-center text-white">mugiwara@gmail.com</h1>
                    </div>
                    <div class="flex justify-center">
                        <h1 class="text-xl font-bold text-center text-white">+212 000 555 885 254</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="shadow-lg w-[50%]">
            <h3 class='text-center text-2xl mb-6'>Change Password</h3>
            @if(Session::has('message'))<p>{{Session::get('message')}}</p>@endif 
            @if(Session::has('password_message'))<p>{{Session::get('password_message')}}</p>@endif 
            <form wire:submit.prevent="changePassword" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4 w-[90%]">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="username">current password </label>
                  <input wire:model="current_password" name="current_password" class="shadow appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                  id="username" type="password" placeholder="current password">
                </div>
                @error('current_password')
                    <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                <div class="mb-4 w-[90%]">
                  <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    new password 
                  </label>
                  <input wire:model="password" name="password" class="shadow  appearance-none border  border-red-500  rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="new password">
                </div>
                @error('password')
                    <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                <div class="mb-4 w-[90%]">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                      confirm password 
                    </label>
                    <input wire:model="confirm_password" name='confirm_password' class="shadow appearance-none border border-red-500 rounded w-full py-3 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="confirm password">
                </div>
                @error('confirm_password')
                    <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                <div class="flex items-center justify-between">
                    <input wire:model="save" value="1" type="checkbox" hidden id="save">
                  <label for="save" class="hover:opacity-100 bg-color-red-button opacity-80  text-while  font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                    Save
                  </label>
                </div>
            </form>
        </div>
    </div>
</div>
