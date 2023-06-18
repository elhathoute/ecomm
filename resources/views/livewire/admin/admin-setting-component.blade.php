<div>
    <div class="shadow-lg md:w-[90%] lg:w-[80%] mx-auto">
        <h3 class='text-center text-2xl mb-6 ' >Setting Page</h3>
        @if (Session::has('message'))
            <div style='color:rgb(122, 230, 122);background:rgb(207, 252, 207);' 
            class=" py-2 px-5" role="alert">{{Session::get('message')}}</div>
        @endif  
        <form wire:submit.prevent="saveSettings" class="bg-white w-[100%] flex flex-wrap gap-2 shadow-md rounded  pt-6 pb-8 mb-4">
            <div class="mb-4 md:w-[100%] lg:w-[49%]">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Email </label>
              <input wire:model="email" name="email" class="shadow flex appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
              id="username" type="email" placeholder="exemple@gmail.com">
              @error('email')
                <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-4 md:w-[100%] lg:w-[49%]">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Phone </label>
                <input wire:model="phone" name="phone" class="shadow flex appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id="username" type="number" placeholder="+000.000.000">
                @error('phone')
                <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 md:w-[100%] lg:w-[49%]">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Phone 2</label>
                <input wire:model="phone2" name="phone2" class="shadow flex appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                id="username" type="number" placeholder="+000.000.000">
                @error('phone2')
                <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 md:w-[100%] lg:w-[49%]">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Address </label>
                    <input wire:model="address" name="address" class="shadow flex appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="address" type="text" placeholder="+000.000.000">
                    @error('address')
                        <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-4 md:w-[100%] lg:w-[49%]">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Address 2</label>
                    <input wire:model="address2" name="address2" class="shadow flex appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="address2" type="text" placeholder="+000.000.000">
                @error('address2')
                    <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 md:w-[100%] lg:w-[49%]">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Map </label>
                    <input wire:model="map" name="map" class="shadow flex appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="map" type="text" placeholder="+000.000.000">
                    @error('map')
                        <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-4 md:w-[100%] lg:w-[49%]">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Twitter </label>
                    <input wire:model="twitter" name="twitter" class="shadow flex appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="twitter" type="text" placeholder="+000.000.000">
                    @error('twitter')
                        <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-4 md:w-[100%] lg:w-[49%]">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Facebook </label>
                    <input wire:model="facebook" name="facebook" class="shadow flex appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="facebook" type="text" placeholder="+000.000.000">
                    @error('facebook')
                        <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-4 md:w-[100%] lg:w-[49%]">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">linkden </label>
                    <input wire:model="linkedin" name="linkden" class="shadow flex appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="linkeden" type="text" placeholder="+000.000.000">
                    @error('linkedin')
                        <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-4 md:w-[100%] lg:w-[49%]">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">whatsap </label>
                    <input wire:model="whatsapp" name="whatsap" class="shadow flex appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="whatsap" type="text" placeholder="+000.000.000">
                @error('whatsap')
                    <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 md:w-[100%] lg:w-[49%]">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Telegram </label>
                    <input wire:model="telegram" name="telegram" class="shadow flex appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="telegram" type="text" placeholder="+000.000.000">
                    @error('telegram')
                        <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-4 md:w-[100%] lg:w-[49%]">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Pinterest </label>
                    <input wire:model="pinterest" name="pinterest" class="shadow flex appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="pinterest" type="text" placeholder="+000.000.000">
                @error('pinterest')
                    <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 md:w-[100%] lg:w-[49%]">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Instagram </label>
                    <input wire:model="instagram" name="instagram" class="shadow flex appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="instagram" type="text" placeholder="+000.000.000">
                @error('instagram')
                    <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 md:w-[100%] lg:w-[49%]">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Youtube </label>
                    <input wire:model="youtube" name="youtube" class="shadow flex appearance-none border rounded w-full  px-3 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="youtube" type="text" placeholder="+000.000.000">
                    @error('youtube')
                        <p style='color:red' class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
            </div>
            <div class="flex items-center justify-between">
                <input wire:model="save" value="1" type="checkbox" hidden id="save">
              <label for="save" class="hover:opacity-100 bg-color-red-button opacity-80  text-while  font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Save
              </label>
            </div>
        </form>
    </div>
</div>
