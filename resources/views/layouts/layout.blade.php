<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="{{asset('assets/scss/dist/styles.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css-tailwind/main.css')}}">
    <style>
     .active-showing{
          opacity:0;
          visibility:hidden;
          transition: .3s;
          
     }
    </style>
</head>

<body class='body__dashboard'>
    <nav class="sidebar h-[100vh] close side-bar__dashboard shadow-md">
        <header>
            @php 
            use Illuminate\Support\Facades\Session;
            @endphp 
            <div class="image-text">
                <span class="image">
                    <img 
                    src='{{Session()->get('user')->img}}' 
                        alt='' width='50px' height='50px' />
                </span>
 
                <div class="text logo-text">
                    <span class="name flex items-center">
                        {{Session()->get('user')->username}}
                    </span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links  overflow-y-scroll h-[50vh] overflow-x-hidden">
                    <li class="nav-link {{request()->routeIs('admin.dashboard') ? 'bg-color-red-button opacity-80' : ' '}}"  >
                        <a href="{{route('admin.dashboard')}}" class='bg-color-rating '>
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('admin.users') ? 'bg-color-red-button opacity-80' : ' '}}" >
                        <a href="{{route('admin.users')}}">
                            <i class="bi bi-person-check icon"></i>
                            <span class="text nav-text">Users</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('product') ? 'bg-color-red-button opacity-80' : ' '}}">
                        <a href="{{route('product')}}">
                            <i class="bi bi-bag icon"></i>
                            <span class="text nav-text">Products</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('category') ? 'bg-color-red-button opacity-80' : ' '}}">
                        <a href="{{route('category')}}">
                            <i class='bx bxs-category icon' ></i>
                            <span class="text nav-text">Categories</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('subcategory') ? 'bg-color-red-button opacity-80' : ' '}}">
                        <a href="{{route('subcategory')}}">
                            <i class='bx bxs-category icon' ></i>
                            <span class="text nav-text">Subcategories</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('admin.orders') ? 'bg-color-red-button opacity-80' : ' '}}">
                        <a href="{{route('admin.orders')}}">
                            <i class="bi bi-basket icon"></i>
                            <span class="text nav-text">Orders</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('brands') ? 'bg-color-red-button opacity-80' : ' '}}">
                        <a href="{{route('brands')}}">
                            <i class='bx bxl-apple icon' ></i>
                            <span class="text nav-text">Brands</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('sliders') ? 'bg-color-red-button opacity-80' : ' '}}">
                        <a href="{{route('sliders')}}">
                            <i class='bx bx-slideshow icon' ></i>
                            <span class="text nav-text">Sliders</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('admin.offre') ? 'bg-color-red-button opacity-80' : ' '}}">
                        <a href="{{route('admin.offre')}}">
                            <i class='bx bx-money-withdraw icon' ></i>
                            <span class="text nav-text">Offres</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('city') ? 'bg-color-red-button opacity-80' : ' '}}">
                        <a href="{{route('city')}}">
                            <i class='bx bx-buildings icon' ></i>
                            <span class="text nav-text">Cities</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('admin.contact-us') ? 'bg-color-red-button opacity-80' : ' '}}">
                        <a href="{{route('admin.contact-us')}}">
                            <i class='bx bxs-contact icon' ></i>
                            <span class="text nav-text">Contacts</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('admin.setting') ? 'bg-color-red-button opacity-80' : ' '}}">
                        <a href="{{route('admin.setting')}}">
                            <i class='bx bx-cog setting icon'></i>
                            <span class="text nav-text">Settings</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('color') ? 'bg-color-red-button opacity-80' : ' '}}">
                        <a href="{{route('color')}}">
                            <i class='bx bx-palette icon' ></i>
                            <span class="text nav-text">Colors</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('size') ? 'bg-color-red-button opacity-80' : ' '}}">
                        <a href="{{route('size')}}">
                            <i class='bx bx-font-size icon' ></i>
                            <span class="text nav-text">Sizes</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('admin.coupons') ? 'bg-color-red-button opacity-80' : ' '}}">
                        <a href="{{route('admin.coupons')}}">
                            <i class='bx bxs-coupon icon' ></i>
                            <span class="text nav-text">Coupons</span>
                        </a>
                    </li>
                    <li class="nav-link {{request()->routeIs('admin.sale') ? 'bg-color-red-button opacity-80' : ' '}}">
                        <a href="{{route('admin.sale')}}">
                            <i class='bx bx-stopwatch icon' ></i>
                            <span class="text nav-text">Crono</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div style="margin-top: 0" class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>
    <section class="home__dashboard">
     <div  class='fixed overlay top-0 left-0 w-full h-full bg-color-gray-dark opacity-10 z-[10000] active-showing'></div>
        <div class="content__dashboard py-2 px-4 md:px-10 relative flex flex-col">
            <div class='profiles__dashboard flex justify-between items-center p-5'>
                <h3 class="text-md md:text-3xl font-semibold ">Dashboard</h3>
                <div class='w-14 h-14 p-1 cursor-pointer  border border-color-red-button rounded-full overflow-hidden'>
                    <img 
                    class='w-full h-full rounded-full' 
                    src='{{Session()->get('user')->img}}' 
                    alt='image profile '/>
                </div>
            </div>
            @yield('content')

            <script src='{{asset('assets/js/admin/sidebar.js')}}'></script>
</body>

</html>
                       

                         
                                   