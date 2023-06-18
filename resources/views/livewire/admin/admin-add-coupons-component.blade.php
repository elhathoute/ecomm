<div>
    <style>
        .error{
            
            margin: auto
            width:80%;
            margin-left:10%;
            margin-top:5px;
            display: inline-block;
        }
    </style>
    <form action='' wire:submit.prevent="storeCoupon" class='w-full form-add' id='form-add' enctype="multipart/form-data">
        @csrf
        <h3 class='text-center heading-form text-3xl'>Add Coupon</h3>
        
            <div class="w-[80%] mx-auto">
                <label>Coupon Code</label>
                <input type="text" name="name" wire:model="code" placeholder='name' id="name" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
            </div>
            @error('code') <span style="color:red" class="error inline-block w-[80%] mx-auto">{{ $message }}</span> @enderror
            <div class="w-[80%] mx-auto">
                <label>Coupon Type</label>
                <select wire:model="type" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button">
                    <option>Select</option>
                    <option value="fixed">Fixed</option>
                    <option value="percent">Percent</option>
                </select>
            </div>
            @error('type') <span style="color:red" class="error inline-block w-[80%] mx-auto">{{ $message }}</span> @enderror
            <div class="w-[80%] mx-auto">
               <label>Coupon Value</label>
               <input type="text" name="code" wire:model="value" placeholder='code' id="code" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
            </div>
            @error('value') <span style="color:red" class="error inline-block w-[80%] mx-auto">{{ $message }}</span> @enderror
            <div class="w-[80%] mx-auto">
                <label>Cart Value</label>
                <input type="text" name="code" wire:model="cart_value" placeholder='code' id="code" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
             </div>
            @error('cart_value') <span style="color:red" class="error inline-block w-[80%] mx-auto">{{ $message }}</span> @enderror

            <div wire:ignore class="w-[80%] mx-auto">
                <label>Expiry Date</label>
                <input type="datetime" name="Expiry Date" 
                wire:model="expiry_date" 
                id='expiry_date'
                placeholder='Expiry Date' id="Expiry Date" 
                class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
             </div>
            @error('expiry_date') <span style="color:red" class="error inline-block w-[80%] mx-auto">{{ $message }}</span> @enderror
            
            <div class="w-[80%] mx-auto mt-3">
                <button class='bg-primary-500  px-5 py-2 text-while rounded-md cursor-pointer inline-block mx-1 save_button' type='submit'>Save</button>
                <button class='bg-primary-200 px-5 py-2  rounded-md cursor-pointer inline-block mx-1  cancel_button'>Cancel</button>
            </div>
    </form>

    @push('scripts')
    <script
src="https://code.jquery.com/jquery-3.6.3.min.js"
integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
crossorigin="anonymous"></script>
        <script>
                $(function(){
                    $('#expiry_date').datetimepicker({
                        format: 'Y-MM-DD h:m:s',
                    })
                    .on('dp.change', function(ev){
                        var data=$('#expiry_date').val();
                        @this.set('expiry_date',data);
                    });
                });
        </script>
    @endpush 
</div>