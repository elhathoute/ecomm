<div>
    <!--Login-->
<section class="bg-gray-50 dark:bg-gray-900  h-[80vh] flex justify-center items-center">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto  lg:py-0 w-[100%] md:w-[90%]  ">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
            Flowbite    
        </a>
        <div class=" bg-white rounded-lg shadow-md dark:border md:mt-0  xl:p-0 dark:bg-gray-800 w-[100%] md:w-[90%] lg:w-[40%] dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Sign in to your account
                </h1>
                @if(Session::has('cussess'))
                    <span class='text-md text-color-red-button'>{{Session::get('success')}}</span>
                @endif 
                @if(Session::has('fail'))
                    <span class='text-md text-color-red-button'>{{Session::get('fail')}}</span>
                @endif 
                <form class="space-y-4 md:space-y-6" method='POST' action="{{route('login.user')}}">
                    @csrf
                    <div class="relative">
                        @error('email')
                        <i class='bx bx-error-circle text-color-red-button absolute top-[50%] translate-y-[-50%] left-[8px] text-xl'></i>
                        @else 
                        <i class='bx bxs-user absolute top-[50%] translate-y-[-50%] left-[8px] text-xl'></i>
                        @enderror 
                        <input type="email" value='{{old("email")}}' name="email" id="email" 
                        class="border border-gray-300 
                        @error('email')
                        border-color-red-button 
                        @enderror
                        bg-gray-50 px-8 py-4  text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                    </div>
                    @error('email')
                    <span class='text-sm px-3 text-color-red-button'>{{$message}}</span>
                    @enderror
                    <div class="relative">
                        @error('password')
                        <i class='bx bx-error-circle text-color-red-button absolute top-[50%] translate-y-[-50%] left-[8px] text-xl'></i>
                        @else
                        <i class='bx bxs-lock-alt absolute top-[50%] translate-y-[-50%] left-[8px] text-xl' ></i>
                        @enderror
                        <input type="password" name="password" id="password" placeholder="••••••••" 
                        class="border border-gray-300 
                        @error('password')
                        border-color-red-button
                        @enderror
                        bg-gray-50 px-8 py-4  text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    @error('password')
                    <span class='text-sm px-3 text-color-red-button'>{{$message}}</span>
                    @enderror
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                              <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-sm">
                              <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                            </div>
                        </div>
                        <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full text-white bg-primary-600 
                    hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 
                    font-medium rounded-lg 
                    px-5 top-[50%] translate-y-[-20%] left-[8px] text-xl text-center py-3 
                  dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 text-while">
                        Sign in
                    </button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Don’t have an account yet? <a href="{{route('register')}}" class="font-medium  hover:underline  dark:text-primary-500">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
<!--End Login-->
</div>
