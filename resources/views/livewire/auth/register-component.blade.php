<div>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto w-[100%] md:w-[90%] lg:w-[80%] lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                Flowbite    
            </a>
            <div class="bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800  w-[100%] md:w-[55%] lg:w-[60%] dark:border-gray-700">
                <div class="p-3 md:p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create and account
                    </h1>
                    <form action='{{route('register.user')}}' method='POST' class="space-y-4 md:space-y-4" action="#">
                        @if(session()->has('success'))
                            <div class="bg-[#86efac] text-white text-center py-2 px-4 rounded-lg">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        @if(session()->has('fail'))
                            <div class="bg-color-red-button text-white text-center py-2 px-4 rounded-lg">
                                {{Session::get('fail')}}
                            </div>
                        @endif
                        @csrf
                        <!--name-->
                        <div class="relative">
                            @error('username')
                                <i class='bx bx-error-circle text-color-red-button absolute top-[50%] translate-y-[-50%] left-[8px] text-xl'></i>
                            @else 
                                <i class='bx bxs-user absolute top-[50%] translate-y-[-50%] left-[8px] text-xl'></i>
                            @enderror
                            <input value='{{old("username")}}' type="text" name="username" id="username" 
                            class="border border-gray-300 
                            @error('username') 
                            border-color-red-button
                            @enderror 
                            bg-gray-50 px-8 py-3  text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="full name" required="">
                        </div>
                        @error('username') <span class='text-sm px-3 text-color-red-button'>{{$message}}</span> @enderror 
                        <!--end name-->

                        <!--start emial-->
                        <div class="relative">
                            @error('email')
                                <i class='bx bx-error-circle text-color-red-button absolute top-[50%] translate-y-[-50%] left-[8px] text-xl'></i>
                            @else 
                            <i class='bx bxs-envelope absolute top-[50%] translate-y-[-50%] left-[8px] text-xl'></i>
                            @enderror 
                            <input value='{{old("email")}}' type="email" name="email" id="email" 
                            class="border border-gray-300  
                            @error('email')
                            border-color-red-button
                            @enderror
                             bg-gray-50 px-8 py-3  text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        </div>
                        @error('email') <span class='text-sm px-3 text-color-red-button'>{{$message}}</span> @enderror 
                        <!--end email -->

                        <!--start phone number-->
                        <div class="relative">
                            @error('phone_number')
                                <i class='bx bx-error-circle text-color-red-button absolute top-[50%] translate-y-[-50%] left-[8px] text-xl'></i>
                            @else
                            <i class='bx bxs-phone-call absolute top-[50%] translate-y-[-50%] left-[8px] text-xl'></i>
                            @enderror
                            <input value='{{old("phone_number")}}' type="number" name="phone_number" id="phone_number" 
                            class="border border-gray-300 
                            @error('phone_number')
                            border-color-red-button
                            @enderror
                            bg-gray-50 px-8 py-3  text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="phone number" required="">
                        </div>
                        @error('phone_number') <span class='text-sm px-3 text-color-red-button'>{{$message}}</span> @enderror 
                        <!--end phone number-->
                        


                        <!--start password-->
                        <div class="relative">
                            @error('password')
                                <i class='bx bx-error-circle text-color-red-button absolute top-[50%] translate-y-[-50%] left-[8px] text-xl'></i>
                            @else
                            <i class='bx bxs-lock-alt absolute top-[50%] translate-y-[-50%] left-[8px] text-xl'></i>
                            @enderror
                            <input value="{{old('password')}}" type="password" name="password" id="password" 
                            class="border border-gray-300 
                            @error('password')
                            border-color-red-button
                            @enderror
                            bg-gray-50 px-8 py-3  text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="••••••••" required="">
                        </div>
                        @error('password') <span class='text-sm px-3 text-color-red-button'>{{$message}}</span> @enderror
                        <!--end password-->
                        


                        <!--start password confirm-->
                        <div class="relative">
                            @error('password__confirm')
                                <i class='bx bx-error-circle text-color-red-button absolute top-[50%] translate-y-[-50%] left-[8px] text-xl'></i>
                            @else
                            <i class='bx bxs-lock-alt absolute top-[50%] translate-y-[-50%] left-[8px] text-xl'></i>
                            @enderror
                            <input value="{{old("password__confirm")}}" type="password" name="password__confirm" id="password__confirm" 
                            class="border border-gray-300  
                            @error('password__confirm')
                            border-color-red-button
                            @enderror
                            bg-gray-50 px-8 py-3  text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="••••••••" required="">
                        </div>
                        @error('password__confirm') <span class='text-sm px-3 text-color-red-button'>{{$message}}</span> @enderror
                        <!--end password confirm-->


                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                              <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-sm">
                              <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 text-white">
                            Create an account
                        </button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="{{route('login')}}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
