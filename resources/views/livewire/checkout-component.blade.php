<div>
    <!--check out -->
    <div class="check__out-page w-[98%] md:w-[95%] mx-auto flex flex-wrap">
        <div class="information___check-out py-2 md:p-6  w-[100%] md:w-[60%] shadow-md">
            <form wire:submit.prevent="placeOrder" class='w-[98%] mx-auto p-3'>
                <div class="fields__check-out flex flex-wrap gap-2 md:gap-9">
                    <div class='w-[100%] md:w-[45%] flex flex-col'>
                        <label class='text-sm'>First Name <span class='text-color-red-button'>*</span></label>
                        <input wire:model="firstname" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="text" name="first_name" />
                        @error('firstname') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class='w-[100%] md:w-[45%] flex flex-col'>
                        <label class='text-sm'>Last Name <span class='text-color-red-button'>*</span></label>
                        <input wire:model="lastname" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="text" name="first_name" />
                        @error('lastname') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class='w-[100%] md:w-[95%] flex flex-col'>
                        <label class='text-sm'>Email <span class='text-color-red-button'>*</span></label>
                        <input wire:model="email" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="email" name="first_name" />
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class='w-[100%] md:w-[95%] flex flex-col'>
                        <label class='text-sm'>Country <span class='text-color-red-button'>*</span></label>
                        <select wire:model="country" class='border mt-2 p-3 rounded-md border-color-gray-background-light outline-none'>
                            <option value="1">Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class='w-[100%] md:w-[95%] flex flex-col'>
                        <label class='text-sm'>City <span class='text-color-red-button'>*</span></label>
                        <select wire:model="city" class='border mt-2 p-3 rounded-md border-color-gray-background-light outline-none'>
                            <option value="1">City</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach 
                        </select>
                        @error('city') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class='w-[100%] md:w-[45%] flex flex-col'>
                        <label class='text-sm'>Address 1 <span class='text-color-red-button'>*</span></label>
                        <input wire:model="address1" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="text" name="first_name" />
                        @error('address1') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class='w-[100%] md:w-[45%] flex flex-col'>
                        <label class='text-sm'>Address 2 (Optionel)</label>
                        <input wire:model="address2" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="text" name="first_name" />
                        @error('address2') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class='w-[100%] md:w-[45%] flex flex-col'>
                        <label class='text-sm'>Phone Number <span class='text-color-red-button'>*</span></label>
                        <input wire:model="phone" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="number" name="first_name" />
                        @error('phone') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class='w-[100%] md:w-[45%] flex flex-col'>
                        <label class='text-sm'>Postal Code <span class='text-color-red-button'>*</span></label>
                        <input wire:model="zipcode" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="number" name="first_name" />
                        @error('zipcode') <span class="error">{{ $message }}</span> @enderror  
                    </div>
                    <div>
                        <button class='border-none py-2 px-5 cursor-pointer opacity-95 transition hover:opacity-100 rounded-md bg-color-red-button text-while'>Next</button>
                    </div>
                </div> 
                <div class="flex gap-3 items-center w-[98%] mx-auto p-3">
                    <input wire:model="ship_to_different" value="1" type="checkbox" name="different" />
                    <span>Ship to a different address ?</span>
                </div>
                @if($ship_to_different)
                    <div class="fields__check-out flex flex-wrap gap-2 md:gap-9">
                        <div class='w-[100%] md:w-[45%] flex flex-col'>
                            <label class='text-sm'>First Name <span class='text-color-red-button'>*</span></label>
                            <input wire:model="s_firstname" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="text" name="first_name" />
                        </div>
                        <div class='w-[100%] md:w-[45%] flex flex-col'>
                            <label class='text-sm'>Last Name <span class='text-color-red-button'>*</span></label>
                            <input wire:model="s_lastname" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="text" name="first_name" />
                        </div>
                        <div class='w-[100%] md:w-[95%] flex flex-col'>
                            <label class='text-sm'>Email <span class='text-color-red-button'>*</span></label>
                            <input wire:model="s_email" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="email" name="first_name" />
                        </div>
                        <div class='w-[100%] md:w-[95%] flex flex-col'>
                            <label class='text-sm'>Country <span class='text-color-red-button'>*</span></label>
                            <select wire:model="s_country" class='border mt-2 p-3 rounded-md border-color-gray-background-light outline-none'>
                                <option value="1">Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='w-[100%] md:w-[95%] flex flex-col'>
                            <label class='text-sm'>Province <span class='text-color-red-button'>*</span></label>
                            <input wire:model="s_province" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="email" name="first_name" />
                        </div>
                        <div class='w-[100%] md:w-[45%] flex flex-col'>
                            <label class='text-sm'>Address 1 <span class='text-color-red-button'>*</span></label>
                            <input wire:model="s_address1" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="text" name="first_name" />
                        </div>
                        <div class='w-[100%] md:w-[45%] flex flex-col'>
                            <label class='text-sm'>Address 2 (Optionel)</label>
                            <input wire:model="s_address2" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="text" name="first_name" />
                        </div>
                        <div class='w-[100%] md:w-[45%] flex flex-col'>
                            <label class='text-sm'>Phone Number <span class='text-color-red-button'>*</span></label>
                            <input wire:model="s_phone" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="number" name="first_name" />
                        </div>
                        <div class='w-[100%] md:w-[45%] flex flex-col'>
                            <label class='text-sm'>Postal Code <span class='text-color-red-button'>*</span></label>
                            <input wire:model="s_zipcode" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="number" name="first_name" />
                        </div>
                        <div>
                            <button class='border-none py-2 px-5 cursor-pointer opacity-95 transition hover:opacity-100 rounded-md bg-color-red-button text-while'>Next</button>
                        </div>
                    </div>
                @endif 
                <div class="information___check-out  py-2 md:p-6  w-[100%] md:w-[100%] shadow-md">
                    <div class="payments__method w-[100%] flex-wrap flex gap-2 border-color-gray-background-light">
                        <div class="payment-method w-[100%]  md:w-[49%]">
                            <h2 class="font-bold border-b-color-gray-background-light p-5">PAYMENT METHOD</h2>
                            @if($paymentmode_card=="card")
                                @if(Session::has('stripe_error'))
                                    <div class='error'>{{Session::get('stripe_error')}}</div>
                                @endif 
                                <div class="w-[90%] mx-auto md:w-[45%] flex flex-col">
                                    <label class='text-sm'>Card Number :<span class='text-color-red-button'>*</span></label>
                                    <input placeholder="Card" wire:model="card_no" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="text" name="card_no" />
                                    @error('card_no') @enderror 
                                </div>
                                <div class="w-[90%] mx-auto md:w-[45%] flex flex-col">
                                    <label class='text-sm'>Expiry Month :<span class='text-color-red-button'>*</span></label>
                                    <input wire:model="exp_month" placeholder="MM" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="text" name="expiry-month" />
                                    @error('exp_month') @enderror 
                                </div>
                                <div class="w-[90%] mx-auto md:w-[45%] flex flex-col">
                                    <label class='text-sm'>Expiry Year :<span class='text-color-red-button'>*</span></label>
                                    <input wire:model="exp_year" placeholder="YYYY" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="text" name="expiry-year" />
                                    @error('exp_year') @enderror 
                                </div>
                                <div class="w-[90%] mx-auto md:w-[45%] flex flex-col">
                                    <label class='text-sm'>CVC :<span class='text-color-red-button'>*</span></label>
                                    <input wire:model="cvc" placeholder="YYYY" class='p-3 mt-2 rounded-md border border-color-gray-background-light overflow-hidden outline-none ' type="password" name="cvc" />
                                    @error('cvc') @enderror 
                                </div>
                            @endif
                            <div class="border-b-color-gray-background-light p-5">
                                <span>Check /Money Order</span>
                                <span>Credit Cart(saved)</span>
                            </div>
                            <div class="type__payment p-5">
                                <div class="flex gap-1 items-center">
                                    <input value="cod" wire:model="paymentmode_cod" type="checkbox"  />
                                    <span>Cash On Delivery</span> 
                                </div>
                                <span class="text-color-gray-background-light text-sm">
                                    Order Now Pay on Delivery
                                </span>
                                <div class="flex gap-1 items-center">
                                    <input wire:model="paymentmode_card" value="card" type="checkbox"  />
                                    <span>Debit / Credit Card</span>
                                </div>
                                <span class="text-color-gray-background-light text-sm">
                                    Order Now Pay on Credit Card
                                </span>
                                <div class="flex gap-1 items-center">
                                    <input wire:model="paymentmode_paypal" value="paypal" type="checkbox" />
                                    <span>Paypal</span>
                                </div>
                                <span class="text-color-gray-background-light text-sm">
                                    Order Now Pay on Paypal
                                </span>
                                @error('paymentmode_cod') <span class="error">{{ $message }}</span> @enderror
                                <button class="rounded mt-3 bg-color-red-button flex 
                                justify-center items-center w-[90%] mx-auto py-2 cursor-pointer text-while" type="submit">
                                    Place Order Now
                                </button>
                            </div>
                        </div>
                        <div class="shipping-method  w-[100%]   md:w-[49%]">
                            <h2 class="font-bold border-b-color-gray-background-light border-b-color-gray-background-light p-5">
                                SHIPPING METHOD
                            </h2>
                            <div class='mt-3 p-5'>
                                <p>Flat Rate</p>
                                <p>Fixed $0</p>
                            </div>
                        </div>
                    </div>
                </div> 
            </form>
        </div> 
        <div class="order__details-check-out p-5 mx-auto md:mx-0 w-[80%] md:w-[40%] shadow-md">
            @if(Session::has('checkout'))
            <div class='w-[96%] mx-auto'>
                <h2 class="text-lg">Order Summary</h2>
                <div class='box__check-out  p-5 border rounded-md border-color-gray-background-light mt-4'>
                    <ul class='flex justify-between mt-4'>
                        <li>Total </li>
                        <li>${{Session::get('checkout')['total']}}</li>
                    </ul>
                    <ul class='flex justify-between mt-4'>
                        <li>Shipping Handling </li>
                        <li>$29.00</li>
                    </ul>
                    <ul class='flex justify-between mt-4'>
                        <li>Tax </li>
                        <li>$10</li>
                    </ul>
                    <hr class='border-none h-[1px] w-[100%] mx-auto inline-block bg-color-gray-background-light'/>
                    <ul class='flex justify-between'>
                        <li class='font-bold text-lg'>Order Total</li>
                        <li class='font-bold text-lg'>297.98$</li>
                    </ul>
                </div>
            </div>
            @endif 
        </div>
        
    </div>
</div>
