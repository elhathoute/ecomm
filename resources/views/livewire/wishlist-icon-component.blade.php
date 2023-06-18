<div class="icon-wishlist">
    <style>
        .heart-icon-wihslist-header{   
            position: relative;
        }
        .heart-icon-wihslist-header span{
            position: absolute;
            width:15px;height:15px;
            display: flex;justify-content: center;
            align-items: center;
            border-radius: 50%;
            top:-1px;
            right:-5px;
            background: red;
            font-size:10px;color:#fff;
        }
    </style>
    <a class='heart-icon-wihslist-header' href='{{route('product.wishlist')}}'>
        <i class='bx bx-heart heart-icon-wihslist-header
        text-color-gray-background-light rounded-full
        w-9 h-9 flex items-center justify-center
        p-2' >
        </i>
        @if(Cart::instance('wishlist')->count() > 0)
            <span>{{Cart::instance('wishlist')->count()}}</span>
        @endif 
    </a>
    <p class="text-xs mx-2 hidden lg:block">wishlist</p>
</div>