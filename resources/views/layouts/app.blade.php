<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('assets/ecom/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/ecom/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/ecom/color-1.css')}}">
    
    
    <link rel="stylesheet" href="{{asset('assets/ecom/choosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/ecom/review.css')}}">

   
    <link rel="stylesheet" href="{{asset('assets/css-tailwind/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/scss/dist/styles.css')}}"/>
    <style>
        .details___product-details{
        width: 30%;
        
        //background-color: blue;
    }
    @media screen and (max-width:1300px){
        .products__details,
        .details___product-details{
            width: 49%;
        } 
    }
    @media screen and (max-width:1090px){
        .products__details,
        .details___product-details{
            width: 100%;
            
        }
    }
    </style>
    @livewireStyles
    <title>Home</title>
</head> 
<body class="body">
    <!--navbar top-->
    <div class="bg-color-gray-dark w-[100vw]   md:px-20   h-12 items-center flex header__home">
        <div class=" w-[100%]    flex justify-between text-xs md:text-md">
            <div class="flex items-center  sm:ml-2 md:ml-0">
                <div class="text-color-red-button"><i class='bx bx-phone-call'></i></div>
                <div class="mx-2 text-color-gray-background-light font-medium"><span>Support</span>+212.448.494</div>
            </div>
            <div class="hidden md:flex">
                <i class='bx bxs-chevron-left icon-direction-left'></i>
                <div class="offre">
                    <p class="active">Free shipping for order over $200</p>
                    <p>wa return money within 30 days</p>
                    <p>Friendly 24/7 customer suppport</p>
                </div>
                <i class='bx bxs-chevron-right icon-direction-right'></i>
            </div>
            <div class="flex cursor-pointer relative  sm:mr-4 md:mr-0
            " onclick='menu__Toggle()'>
                <div>
                    <img 
                    class="w-7 h-4"
                    src="https://www.shutterstock.com/image-vector/united-states-america-flag-vector-260nw-1406928203.jpg" 
                    alt="language"/>
                </div>
                <div class="ml-2 text-color-gray-background-light">
                    <span>Eng/ $</span>
                </div>
                <div class="flex ml-1">
                    <i class='bx bxs-down-arrow text-color-gray-background-light  text-xs'style="font-size:9px;"></i>
                </div>   
                <div class="fixed z-[200] rounded  w-40 h-[230px] 
                        bg-while right-[20px] shadow-lg  
                        md:right-[100px] p-2 
                        menu-language

                        ">
                        <div class="flex items-center mb-2 bg-while p-2 cursor-pointer scale-[.98] hover:scale-100 transition opacity-[.8] hover:opacity-[1]">
                            <img src="https://cdn.freebiesupply.com/logos/large/2x/france-logo-svg-vector.svg"
                            class="w-9 h-5"
                             alt="french"/>
                             <p class="mx-2 text-md">Français</p>
                        </div>
                        <div class="flex items-center mb-2 bg-while p-2 cursor-pointer scale-[.98] hover:scale-100 transition opacity-[.8] hover:opacity-[1]">
                            <img src="https://cdn.freebiesupply.com/logos/large/2x/france-logo-svg-vector.svg"
                            class="w-9 h-5"
                             alt="french"/>
                             <p class="mx-2 text-md">Français</p>
                        </div>
                        <div class="flex items-center mb-2 bg-while p-2 cursor-pointer scale-[.98] hover:scale-100 transition opacity-[.8] hover:opacity-[1]">
                            <img src="https://cdn.freebiesupply.com/logos/large/2x/france-logo-svg-vector.svg"
                            class="w-9 h-5"
                             alt="french"/>
                             <p class="mx-2 text-md">Français</p>
                        </div>
                        <div class="flex items-center mb-2 bg-while p-2 cursor-pointer scale-[.98] hover:scale-100 transition opacity-[.8] hover:opacity-[1]">
                            <img src="https://cdn.freebiesupply.com/logos/large/2x/france-logo-svg-vector.svg"
                            class="w-9 h-5"
                             alt="french"/>
                             <p class="mx-2 text-md">Français</p>
                        </div>
                        <div class="flex items-center mb-2 bg-while p-2 cursor-pointer scale-[.98] hover:scale-100 transition opacity-[.8] hover:opacity-[1]">
                            <img src="https://cdn.freebiesupply.com/logos/large/2x/france-logo-svg-vector.svg"
                            class="w-9 h-5"
                             alt="french"/>
                             <p class="mx-2 text-md">Français</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!--navbar bottom-->
    <div class="navbar__home px-3   md:px-20">
        <div class="top-navbar  sm:px-4 md:px-0">
            <div>
                <a href='/'>
                    <div class="logo-mugiwara">
                        <img 
                        src="https://seeklogo.com/images/M/mugiwara-logo-303FD55C54-seeklogo.com.png"
                        alt="mugiwara logo"/>
                    </div>
                    <div class="font-bold name-logo">
                        <a class="" href="#">Mugi
                            <span class="text-color-gray-dark">wara</span>
                        </a>
                    </div>
                </a>
            </div>
            <div>
                <div>
                    @livewire('header-search-component')
                </div>
            </div>
            <div>
                    @livewire('wishlist-icon-component')
                <div class="account">
                    @php
                    use App\Models\User;
                    //check if user is logged in
                    $user=null;
                    if(Session()->has('user')){
                        $user=User::find(Session()->get('user')->id);
                    }
                    

                    
                    @endphp 
                    @if($user)
                        <div class='icon-header'>
                        <a href='{{route("admin.dashboard")}}'>
                            <img class='w-9 h-9 rounded-full' src="{{$user->img}}" alt='profile img'/>
                        </a>
                        </div>
                        
                    @else 
                        <div class="icon-header">
                              <i class="bx bx-user text-color-gray-background-light" ></i>
                        </div>
                    @endif
                    <div class="sign-in flex  justify-center items-center">
                            @if($user)
                                @if($user->utype=='ADM')
                                    <a href='{{route("admin.dashboard")}}'>Admin</a>
                                @else
                                    <a href='{{route('user.profile')}}'>{{$user->username}}</a>
                                @endif
                                <a href='{{route('logout')}}'>
                                    <i class='bx bx-log-out text-xl'></i>
                                </a>
                            @else 
                                <a href='{{route('login')}}'>Sign In</a>
                            @endif
                    </div>
                </div>
                @livewire("cart-icon-component")
                <div class="menu-bar"><i class='bx bx-menu'></i></div>
            </div>
        </div>
        <div class="flex bottom-navbar h-16">
            <div class="departement my-depart w-[160px] flex items-center p-3 py-2 cursor-pointer
                text-color-gray-background-light relative">
                <div class="mx-1 my-depart"><i class='bx bx-grid-alt icon-departement'></i></div>
                <div class="mx-1 my-depart">Categories</div>
                <div class="flex justify-center items-center my-depart">
                    <i class='bx bxs-down-arrow icon-arrow-dow-departement my-depart'></i>
                </div>
                <div class=" overflow-y-scroll departement-products absolute bg-while shadow-md md:w-[680px] 
                    md:h-[350px] lg:w-[850px] lg:h-[450px] z-50 rounded-md
                     p-2">
                    @livewire('category-icon-component')
                </div>
            </div>
            <div class="links-page flex items-center">
                <ul class="flex pr-3 bg-while">
                    <li class="mx-7 lg:mx-4"><a class="{{request()->routeIs('home') ? 'active' : ' '}}" href="/">Home</a></li>
                    <li class="mx-7 lg:mx-4"><a class="{{request()->routeIs('shop') ? 'active' : ' '}}" href="{{route('shop')}}">Shop</a></li>
                    <li class="mx-7 lg:mx-4 relative account-link">
                        <a class="{{request()->routeIs('user.profile') ? 'active' : ' '}}"  
                            href="{{route('user.profile')}}" class="relative">Account</a>
                        
                    </li>
                    <li class="mx-7 lg:mx-4">
                        <a class="{{request()->routeIs('contact') ? 'active' : ' '}}"   href="{{route('contact')}}">Contact</a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="nav-links-bottom-phono shadow-sm ">
            <div class="">
                <form>
                    <div class="relative">
                        <input class="input-search-mobile" type="search" placeholder="Search for Products"/>
                        <i class='bx bx-search icon-search-mobile'></i>
                    </div>
                </form>
                <ul class='listat'>
                    <li class="departement_mode_phone">
                        <a href="#">
                            <i class='bx bx-grid-alt icon-grid' ></i>
                            <span>Departement</span>
                            <i class='bx bx-chevron-down icon-arrow'></i>
                        </a>
                    </li>
                    <ul class="list_categories_mode_phono">
                        <li class="flex">
                            <a href="#" class="w-[25%] mr-2 overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://i.ytimg.com/vi/q2LqMlxE8eY/maxresdefault.jpg" alt="" />
                            </a>
                            <a href="#" class="w-[25%] mr-2 overflow-hidden rounded-md">
                                <img class="h-[90px] w-full"  src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/38d7f640108731.5606d146b9bb7.jpg" alt="" />
                            </a>
                            <a href="#" class="w-[25%] mr-2 overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://i.wfcdn.de/teaser/1920/49296.jpg" alt="" />
                            </a>
                            <a href="#" class="w-[25%] overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://i.pinimg.com/736x/25/ca/42/25ca426cad1148ceff2270fe153b078e.jpg" alt="" />
                            </a>
                        </li>
                        <li class="flex">
                            <a href="#" class="w-[25%] mr-4 overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://i.pinimg.com/736x/25/ca/42/25ca426cad1148ceff2270fe153b078e.jpg" alt="" />
                            </a>
                            <a href="#" class="w-[25%] mr-4 overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqlGDjIG-Wwu_HqboZZVg2vKxSjlXDWE2tZG6Qaz3xslUWbyA6L9oW0346D5xodDMXS-E&usqp=CAU" alt="" />
                            </a>
                            <a href="#" class="w-[25%] mr-4 overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS7W3kSjtKsOQQUm1jP6WjXv3mtiRt27mg5Qg&usqp=CAU" alt="" />
                            </a>
                            <a href="#" class="w-[25%]  overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://ma.jumia.is/cms/SIS/moulinex/mlp/PC-OK-BANNIERE-TEASER-MOULINEX-PREPA-CULINAIRE-572X250-11-3-2021.jpg" alt="" />
                            </a>
                        </li>
                        <li class="flex">
                            <a href="#" class="w-[25%]  mr-4 overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://ma.jumia.is/cms/slider-Nivea-desktop.jpg" alt="" />
                            </a>
                            <a href="#" class="w-[25%] mr-4 overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://ma.jumia.is/cms/000_2022/Z-Categories/7-Supermarche/z-provi/220/epsuc-220-gris.jpg" alt="" />
                            </a>
                            <a href="#" class="w-[25%] mr-4 overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://images.yourstory.com/cs/7/1da9ec3014cc11e9a1b2b928167b6c62/mensfashionbanner1572434751640png?w=752&fm=auto&ar=2:1&mode=crop&crop=face" alt="" />
                            </a>
                            <a href="#" class="w-[25%] overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://img.huffingtonpost.com/asset/5ce6bd0c210000b90ed0ed6a.jpeg?ops=scalefit_720_noupscale" alt="" />
                            </a>
                        </li>
                        <li class="flex">
                            <a href="#" class="w-[25%] mr-4 overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://mir-s3-cdn-cf.behance.net/projects/404/f9d2a2112033561.Y3JvcCwxMjkzLDEwMTEsMCww.jpg" alt="" />
                            </a>
                            <a href="#" class="w-[25%] mr-4 overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://www.shutterstock.com/image-photo/kitchen-utensils-cooking-tools-on-260nw-1738748708.jpg" alt="" />
                            </a>
                            <a href="#" class="w-[25%] mr-4 overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://www.ensemble-multitudes.com/phooksee/2021/06/instruments-musique-facile-apprendre-5.jpg" alt="" />
                            </a>
                            <a href="#" class="w-[25%] overflow-hidden rounded-md">
                                <img class="h-[90px] w-full" src="https://images.ctfassets.net/lhzh8coidz9i/5oiTD260pHHo0cAI2RJDtP/3a16d739b3c9a2d2be8f82422503c7ef/5_Creative_Counting_Games_for_Kids.jpg" alt="" />
                            </a>
                        </li>
                    </ul>
                    <li><a  href="/">Home</a></li>
                    <li><a  href="{{route('shop')}}">Shop</a></li>
                    <li class="account-link-mobile-li z-[200000]" onclick="">
                        <a   
                            href="{{route('user.profile')}}">
                            <span>Account</span>
                            <i class='bx bx-chevron-down icon-arrow'></i>
                        </a>
                    </li>
                    <li>
                        <a   href="{{route('contact')}}"">Contact</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    {{$slot}}
    @livewire('footer-component')
    <script>
        document.querySelector('.menu-bar').addEventListener('click',function(){
            document.querySelector('.nav-links-bottom-phono').classList.toggle('show')
        })
    </script>
<script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
<script src="{{asset('assets/js/header-home.js')}}"></script>
<script src="{{asset('assets/js/navab-home.js')}}"></script>
<script src="{{asset('assets/js/slider-home.js')}}"></script>
<script src="{{asset('assets/js/slider-category-home.js')}}"></script>
<script src="{{asset('assets/js/slider-product-offre-home.js')}}"></script>
<script src="{{asset('assets/js/ads-offre-home.js')}}"></script>
<!--shop page-->
<script src="{{asset('assets/js/shop/drop_down-categories.js')}}"></script>
<script src="{{asset('assets/js/shop/filter-colors.js')}}"></script>
<script src="{{asset('assets/js/shop/range.js')}}"></script>
<script src="{{asset('assets/js/shop/select.js')}}"></script>
<!--product details-->
<script src="{{asset('assets/js/product-details/info-filter.js')}}"></script>
<script src="{{asset('assets/js/product-details/slider.js')}}"></script>
<!--login-->
<script src="{{asset('assets/js/login/change-img.js')}}"></script>
<script src="{{asset('assets/js/login/validation.js')}}"></script>
<!--register-->
<script src="{{asset('assets/js/register/change-img.js')}}"></script>
<script src="{{asset('assets/js/register/validation.js')}}"></script>



@livewireScripts

</body>
</html>