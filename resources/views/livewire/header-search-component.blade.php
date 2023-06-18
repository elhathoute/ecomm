<form action="{{route('search.products')}}" class="w-full relative form-search">
    <i class='bx bx-search absolute top-[50%] 
            translate-y-[-50%] z-30 left-2
            text-color-gray-background-light' >
    </i>
    <input
     name='q'
     value="{{$q}}"
     class="
        bg-gray-200 appearance-none border-2 
        border-color-gray-background-light
        rounded w-full py-2 px-6 text-gray-700 leading-tight transition
        focus:outline-none focus:bg-white focus:border-color-red-button" 
        id="inline-password"  placeholder="search"
     type="search"/>
</form>