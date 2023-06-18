<div>
    <!--contact us-->
    <div class=" p-3 md:p-10">
        <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d108703.1211560523!2d-8.077893363386485!3d31.63460233265141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakech!5e0!3m2!1sfr!2sma!4v1677235161269!5m2!1sfr!2sma" 
        style="width: 100%;" height="550" style="border:0;" 
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
    <div class="contacts-info-ecommerce p-2 md:p-10">
        <div class="info  px-4 md:px-44 pr-4 md:pr-20">
            <h3 class="text-lg pb-6">Contact Info</h3>
            <p class="mb-3">
                <span class="font-bold text-xs">Adress :</span>
                <span class="text-xs">
                    1600 Morroco Marrakech ,
                    CaseBlanca 40000 LC ,
                    United States
                </span>
            </p>
            <p class="mb-3">
                <span class="font-bold text-xs">Phone :</span>
                <span class="text-xs">+212.473.493</span>
            </p>
            <p class="mb-3">
                <span class="font-bold text-xs">Email :</span>
                <span class="text-xs">Mugiwara@gmail.com</span>
            </p>
            <div class="get-social-media mt-16">
                <h3 class="text-2xl font-bold">Get Socials</h3>
                <div>
                    <i class='bx bxl-facebook'></i>
                    <i class='bx bxl-instagram' ></i>
                    <i class='bx bxl-pinterest-alt' ></i>
                    <i class='bx bxl-twitter' ></i>
                    <i class='bx bxl-google-plus' ></i>
                </div>
            </div>
        </div>
        <div class="form--info">
            @if(Session::has('message'))
            <div>
                {{Session::get('message')}}
            </div>
            @endif
            <form wire:submit.prevent="sendMessage" class="p-7">
                <div class="flex flex-col w-[90%] mx-auto ">
                    <label>Your Name</label>
                    <input wire:model="name" class="px-3 border border-color-gray-background-light py-2 rounded-lg outline-none" type="text" name="text" />
                </div>
                @error('name')
                <p style='color:red'>{{$message}}</p>
                @enderror
                <div class="flex flex-col w-[90%] mx-auto">
                    <label>Your Email</label>
                    <input wire:model="email" class="px-3 border border-color-gray-background-light py-2 rounded-lg outline-none" type="email" name="email"/>
                </div>
                @error('email')
                <p style='color:red'>{{$message}}</p>
                @enderror
                <div class="flex flex-col w-[90%] mx-auto">
                    <label>Your Phone </label>
                    <input wire:model="phone" class="px-3 border border-color-gray-background-light py-2 rounded-lg outline-none" type="number" name="email"/>
                </div>
                @error('phone')
                <p style='color:red'>{{$message}}</p>
                @enderror
                <div class="flex flex-col w-[90%] mx-auto">
                    <label>Subject </label>
                    <input wire:model="subject" class="px-3 border border-color-gray-background-light py-2 rounded-lg outline-none" type="text" name="email"/>
                </div>
                @error('subject')
                <p style='color:red'>{{$message}}</p>
                @enderror
                <div class="flex flex-col w-[90%] mx-auto">
                    <label>Message</label>
                    <textarea wire:model="message" class="px-3 border border-color-gray-background-light py-2 rounded-lg outline-none  h-32">

                    </textarea>
                </div>
                @error('message')
                <p style='color:red'>{{$message}}</p>
                @enderror
                <button type='submit' class="mt-3 inline-block mx-11 text-sm bg-color-red-button text-[#fff] px-3 rounded-md py-2">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</div>
