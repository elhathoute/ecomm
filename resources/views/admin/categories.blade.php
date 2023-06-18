@extends('layouts.layout')
@section('content')
            <div class="products__tables">
               <div class='header__product-lists'>
                    <div class='left__product-header flex justify-between'>
                         <h1 class='text-xl md:text-3xl font-bold'>Categories</h1>
                         <button onClick="" class='bg-color-red-button opacity-80 transition hover:opacity-100
                         cursor-pointer outline-none border-none rounded-md text-while py-1 px-3 add-button'>
                              <span class='font-bold'>+</span> Add
                         </button>
                    </div>
                    <div class="body__products-dashboard">
                         <form class='mt-3'>
                              <div class='fields relative border border-color-gray-background-light
                              bg-color-red-button w-[95%] md:w-[60%] overflow-hidden rounded-md'>
                                   <input type='search' id='search-categories' class='py-3  px-8 w-[100%] h-[100%]' name='search' placeholder="Search" />
                                   <i class='bx bx-search-alt text-color-gray-background-light text-2xl
                                   absolute left-[10px] top-[50%] translate-y-[-50%]'></i>
                              </div>
                         </form>

                         <div class="relative overflow-x-auto w-[99%] md:w-[95%] mx-auto shadow-lg sm:rounded-lg mt-10">

                         </div>
                    </div>
               </div>
          </div>

     </div>
     <!--/Add Product-->
                              <!--table products-->
                         </div>
<!--start-->
<div class='w-[500px]  bg-primary-50 p-3 rounded-lg z-[10000] fixed top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] active-showing model_form '>
    <div class="w-[140px] m-4 mx-auto  h-[140px] rounded-full bg-color-gray-background-light border border-color-gray-background-light cursor-pointer
    flex items-center justify-center image-div">
        <i class='bx bx-plus-medical scale-125 text-color-gray-dark opacity-25'></i>
    </div>

    <form action='' class='w-full form-add' id='form-add' enctype="multipart/form-data">
        @csrf
        <h3 class='text-center heading-form'>Add Categories</h3>

            <div class="w-[80%] mx-auto">

                <input type="text" name="name" placeholder='name' id="name" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
            </div>
            <div class="w-[80%] mx-auto mt-4">
                <textarea name="description" id="description" cols="30" rows="10" class="w-full border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"></textarea>
            </div>
            <div class="w-[80%] mx-auto mt-4">
                <input name='image' type="file" class="file__img-input" onchange="display_add_image(this.files[0])"
                hidden name="image" id="image" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
            </div>
            <div class="w-[80%] mx-auto mt-4">
                <button class='bg-primary-500 px-5 py-2 text-while rounded-md cursor-pointer inline-block mx-1 save_button' type='submit'>Save</button>
                <button class='bg-primary-200 px-5 py-2  rounded-md cursor-pointer inline-block mx-1  cancel_button'>Cancel</button>
            </div>
    </form>
</div>
<!--end-->
<!--start edit -->
<div class='w-[500px] p-3  bg-primary-50 rounded-lg z-[10000] fixed top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] active-showing model_form_edit '>
    <div class="w-[140px] m-4 mx-auto  h-[140px] rounded-full bg-color-gray-background-light border border-color-gray-background-light cursor-pointer
    flex items-center justify-center image-div-edit">
        <i class='bx bx-plus-medical scale-125 text-color-gray-dark opacity-25'></i>
    </div>

    <form action='' class='w-full form-edit' id='form-edit' enctype="multipart/form-data">
        @csrf
        <h3 class='text-center heading-form'>Edit Categories</h3>

            <div class="w-[80%] mx-auto">
                <input type='hidden'  name='id' id='id_category'>
                <input type="text" name="name_edit" placeholder='name_edit' id="name_edit" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
            </div>
            <div class="w-[80%] mx-auto mt-4">
                <textarea name="description_edit" id="description_edit" cols="30" rows="10" class="w-full border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"></textarea>
            </div>
            <div class="w-[80%] mx-auto mt-4">
                <input type='hidden' name='old_image' id='old_image'>
                <input name='image_edit' type="file" class="file__img-input-edit" onchange="display_edit_image(this.files[0])"
                hidden  id="image_edit" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
            </div>
            <div class="w-[80%] mx-auto mt-4">
                <button class='bg-primary-500 px-5 py-2 text-while rounded-md cursor-pointer inline-block mx-1 save_button_edit' type='submit'>Save</button>
                <button class='bg-primary-200 px-5 py-2  rounded-md cursor-pointer inline-block mx-1  cancel_button_edit'>Cancel</button>
            </div>
    </form>
</div>
<!--end edit -->
<div class="flex flex-col gap-2 md:flex-row mt-7">
    <div class='relative overflow-x-auto w-[99%]  md:w-[60%]  shadow-lg sm:rounded-lg mt-6'>
        <!--model insert categories to database-->

         <table class="w-full text-sm text-left text-blue-100 dark:text-blue-100">
              <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
                   <tr>
                        <th scope="col" class="px-6 py-3">Categories</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                   </tr>
              </thead>
              <tbody class='body__table'>
                    @foreach ($categories as $category)
                        <tr class="bg-blue-500 border-b border-b-color-gray-background-light border-blue-400">
                            <th scope="row" class="px-6 py-4 flex items-center gap-2 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                                <span><img src="{{ asset('categories/'.$category->image) }}" alt="products" class='w-14 h-14 rounded-full' />
                                </span>
                                <span>{{$category->name}}</span>
                            </th>
                            <td class="px-6 py-4">
                                <form>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-color-red-button rounded-full peer peer-focus:ring-4 peer-focus:bg-color-gray-background-light
                                        dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full
                                        peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px]
                                        after:bg-color-red-button after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5
                                        after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                </form>
                            </td>
                            <td class="px-6 py-4">
                                <div class='flex gap-1 items-center'>
                                    <span onclick='edit_category()' class='button_edit' data-id='{{$category->id}}'>
                                        <i class='bx bxs-edit text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#dcfce7] text-[#4ade80]' ></i>
                                    </span>
                                    <span class='button_delete' data-id='{{$category->id}}'><i class='bx bxs-trash text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#fee2e2] text-[#f87171]' ></i></span>
                                    <span><i class='bx bxs-detail text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#cffafe] text-[#22d3ee]' ></i></span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
              </tbody>
         </table>
    </div>
</div>
</div>
<div class='right__product-header'>

</div>
</div>
</div>
</div>
</section>
<script
src="https://code.jquery.com/jquery-3.6.3.min.js"
integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
crossorigin="anonymous"></script>
<script>

    $(document).ready(function(){
        $(document).on('click','.save_button',function (e){
        e.preventDefault()
        //get data from form
        //console.log(image)
        $.ajax({
            url: "{{route('category-add')}}",
            type: 'POST',
            data: new FormData($('#form-add')[0]),

            processData: false,
            contentType: false,
            success: function (response){
                console.log('success')
                if(response.status=="success inserted categorie"){
                    $('#form-add')[0].reset()

                    //console.log(response)
                    $('.body__table').empty()
                    $.each(response.categories,function(key,value){
                        console.log(value)
                        //empty table
                        $('.body__table').append(`
                        <tr class="bg-blue-500 border-b border-b-color-gray-background-light border-blue-400">
                            <th scope="row" class="px-6 py-4 flex items-center gap-2 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                                <span><img src="{{ asset('categories/${value.image}') }}" alt="products" class='w-14 h-14 rounded-full' />
                                </span>
                                <span>${value.name}</span>
                            </th>
                            <td class="px-6 py-4">
                                <form>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-color-red-button rounded-full peer peer-focus:ring-4 peer-focus:bg-color-gray-background-light
                                        dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full
                                        peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px]
                                        after:bg-color-red-button after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5
                                        after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                </form>
                            </td>
                            <td class="px-6 py-4">
                                <div class='flex gap-1 items-center'>
                                    <span  onclick='edit_category()' class='button_edit' data-id='${value.id}'><i class='bx bxs-edit text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#dcfce7] text-[#4ade80]' ></i></span>
                                    <span class='button_delete' data-id='${value.id}'><i class='bx bxs-trash text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#fee2e2] text-[#f87171]' ></i></span>
                                    <span><i class='bx bxs-detail text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#cffafe] text-[#22d3ee]' ></i></span>
                                </div>
                            </td>
                        </tr>
                        `)
                    })




                }
                console.log(response)
            },
            error: function (error){
                console.log("error")
                $.each(error.responseJSON.errors,function(key,value) {
                    console.log(value)
                })
            }
        })
        })
        //show
        $(document).on('click','.button_edit',function (e){
            e.preventDefault()
            var id = $(this).data('id')
            $.ajax({
                url: "{{route('category-show')}}",
                type: 'POST',
                data: {
                    id:id,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response){
                    console.log(response)
                    $('#name_edit').val(response.categories.name)
                    $('#description_edit').val(response.categories.description)
                    $('#old_img').val(response.categories.image)
                    $('#id_category').val(response.categories.id)
                    //get element has class image-div-edit and set attribute src to image
                    //$('.image-div-edit').style.backgroundImage=`url({{ asset('categories/${response.categories.image}') }})`
                },
                error: function (error){
                    console.log("error")
                    $.each(error.responseJSON.errors,function(key,value) {
                        console.log(value)
                    })
                }
            })


            //set file img data to form
        })
        //update categories
        $(document).on('click','.save_button_edit',function(e){
            e.preventDefault()
            $.ajax({
                url: "{{route('category-update')}}",
                type: 'POST',
                data: new FormData($('#form-edit')[0]),
                processData: false,
                contentType: false,
                success: function (response){
                    console.log('success')
                    if(response.status=="success updated categories"){
                        $('#form-edit')[0].reset()
                        $('.body__table').empty()
                        $.each(response.categories,function(key,value){
                            console.log(value)
                            //empty table
                            $('.body__table').append(`
                            <tr class="bg-blue-500 border-b border-b-color-gray-background-light border-blue-400">
                                <th scope="row" class="px-6 py-4 flex items-center gap-2 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                                    <span><img src="{{ asset('categories/${value.image}') }}" alt="products" class='w-14 h-14 rounded-full' />
                                    </span>
                                    <span>${value.name}</span>
                                </th>
                                <td class="px-6 py-4">
                                    <form>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" value="" class="sr-only peer" checked>
                                            <div class="w-11 h-6 bg-color-red-button rounded-full peer peer-focus:ring-4 peer-focus:bg-color-gray-background-light
                                            dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full
                                            peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px]
                                            after:bg-color-red-button after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5
                                            after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                        </label>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    <div class='flex gap-1 items-center'>
                                        <span onclick='edit_category()' class='button_edit' data-id='${value.id}'><i class='bx bxs-edit text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#dcfce7] text-[#4ade80]' ></i></span>
                                        <span class='button_delete' data-id='${value.id}'><i class='bx bxs-trash text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#fee2e2] text-[#f87171]' ></i></span>
                                        <span><i class='bx bxs-detail text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#cffafe] text-[#22d3ee]' ></i></span>
                                    </div>
                                </td>
                            </tr>
                            `)
                        }
                        )
                    }
                },
                error: function (error){
                    console.log("error")
                    $.each(error.responseJSON.errors,function(key,value) {
                        console.log(value)
                    })
                }

        })
        })
        //delete categories
        $(document).on('click','.button_delete',function(e){
            e.preventDefault()
            let id = $(this).data('id')
            if(confirm('are you sure to delete this category?')){
                $.ajax({
                    url:"{{route('category-delete')}}",
                    type: 'POST',
                    data: {
                        id:id,
                        _token:$('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response){
                        if(response.status=="success delete categories"){
                            console.log('success')
                            $('.body__table').empty()
                            $.each(response.categories,function(key,value){
                                console.log(value)
                                //empty table
                                $('.body__table').append(`
                                <tr class="bg-blue-500 border-b border-b-color-gray-background-light border-blue-400">
                                    <th scope="row" class="px-6 py-4 flex items-center gap-2 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                                        <span><img src="{{ asset('categories/${value.image}') }}" alt="products" class='w-14 h-14 rounded-full' />
                                        </span>
                                        <span>${value.name}</span>
                                    </th>
                                    <td class="px-6 py-4">
                                        <form>
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" value="" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-color-red-button rounded-full peer peer-focus:ring-4 peer-focus:bg-color-gray-background-light
                                                dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full
                                                peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px]
                                                after:bg-color-red-button after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5
                                                after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            </label>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class='flex gap-1 items-center'>
                                            <span onclick='edit_category()' class='button_edit' data-id='${value.id}'><i class='bx bxs-edit text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#dcfce7] text-[#4ade80]' ></i></span>
                                            <span class='button_delete' data-id='${value.id}'><i class='bx bxs-trash text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#fee2e2] text-[#f87171]' ></i></span>
                                                <span><i class='bx bxs-detail text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#cffafe] text-[#22d3ee]' ></i></span>
                                        </div>
                                    </td>
                                </tr>
                                `)
                            })
                        }
                    },
                    error: function (error){
                        console.log("error")
                        $.each(error.responseJSON.errors,function(key,value) {
                            console.log(value)
                        })
                    },
                })
            }


        })


        //search
        $(document).on('keyup','#search-categories',function(e){
            e.preventDefault()
            let search = $(this).val()
            console.log(search)
            $.ajax({
                url:"{{route('category-search')}}",
                type: 'POST',
                data: {
                    search:search,
                    _token:$('meta[name="csrf-token"]').attr('content')
                },
                success: function (response){
                    if(response.status=="success"){
                        console.log('success')
                        //code do while if response data is empty load true if not load false
                        var load = true

                            //filter table of categories by search
                            $('.body__table').empty()
                            $.each(response.categories,function(key,value){
                                console.log(value)
                                //empty table
                                $('.body__table').append(`
                                <tr class="bg-blue-500 border-b border-b-color-gray-background-light border-blue-400">
                                    <th scope="row" class="px-6 py-4 flex items-center gap-2 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                                        <span><img src="{{ asset('categories/${value.image}') }}" alt="products" class='w-14 h-14 rounded-full' />
                                        </span>
                                        <span>${value.name}</span>
                                    </th>
                                    <td class="px-6 py-4">
                                        <form>
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" value="" class="sr-only peer" checked>
                                                <div class="w-11 h-6 bg-color-red-button rounded-full peer peer-focus:ring-4 peer-focus:bg-color-gray-background-light
                                                dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full
                                                peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px]
                                                after:bg-color-red-button after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5
                                                after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            </label>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class='flex gap-1 items-center'>
                                            <span onclick='edit_category()' class='button_edit' data-id='${value.id}'><i class='bx bxs-edit text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#dcfce7] text-[#4ade80]' ></i></span>
                                            <span class='button_delete' data-id='${value.id}'><i class='bx bxs-trash text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#fee2e2] text-[#f87171]' ></i></span>
                                                <span><i class='bx bxs-detail text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#cffafe] text-[#22d3ee]' ></i></span>
                                        </div>
                                    </td>
                                </tr>
                                `)

                        })
                    }
                },
                error:function (error){
                    console.log('error')
                }
            })
        })

     })
</script>
<script>
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

</script>





<script>
    //display image in div
    document.querySelector('.image-div').addEventListener('click',(e)=>{
    document.querySelector('.file__img-input').click()})

    document.querySelector('.image-div-edit').addEventListener('click',(e)=>{
    document.querySelector('.file__img-input-edit').click()})

    function display_add_image(file){
    let allowed = ['jpg','jpeg','png'];
    let ext = file.name.split(".").pop();
    if(allowed.includes(ext.toLowerCase())){
    image_added=true
    //set image in background-img of div
    document.querySelector('.image-div').style.backgroundImage=`url(${URL.createObjectURL(file)})`
    }else {
    alert("Only the following image types are allowed:"+ allowed.toString(", "));
    }
    }
    //edit
    function display_edit_image(file){
    let allowed = ['jpg','jpeg','png'];
    let ext = file.name.split(".").pop();
    if(allowed.includes(ext.toLowerCase())){
    image_added=true
    //set image in background-img of div
    document.querySelector('.image-div-edit').style.backgroundImage=`url(${URL.createObjectURL(file)})`
    }else {
    alert("Only the following image types are allowed:"+ allowed.toString(", "));
    }
    }
    ////////////////////////////////////////////////////////////////////////



    //hidden and ashow button
    ///////////////////////////////////////////////////////////////////////////////
    document.querySelector('.add-button').addEventListener('click',()=>{
    document.querySelector('.overlay').classList.remove('active-showing')
    document.querySelector('.model_form').classList.remove('active-showing')
    })
    document.querySelector('.overlay').addEventListener('click',()=>{
    document.querySelector('.overlay').classList.add('active-showing')
    document.querySelector('.model_form').classList.add('active-showing')
    })
    //edit
    function edit_category(){
        document.querySelector('.overlay').classList.remove('active-showing')
        document.querySelector('.model_form_edit').classList.remove('active-showing')
    }



    document.querySelector('.cancel_button').addEventListener('click',(e)=>{
    e.preventDefault()
    //reset form from data
    //document.querySelector('.form-add').reset()
    document.querySelector('.overlay').classList.add('active-showing')
    document.querySelector('.model_form').classList.add('active-showing')

    })

    document.querySelector('.cancel_button_edit').addEventListener('click',(e)=>{
    e.preventDefault()
    //reset form from data
    //document.querySelector('.form-add').reset()
    document.querySelector('.overlay').classList.add('active-showing')
    document.querySelector('.model_form_edit').classList.add('active-showing')

    })
    document.querySelector('.save_button').addEventListener('click',(e)=>{
    e.preventDefault()
    //reset form from data
    //document.querySelector('.form-add').reset()
    document.querySelector('.overlay').classList.add('active-showing')
    document.querySelector('.model_form').classList.add('active-showing')

    })

    document.querySelector('.save_button_edit').addEventListener('click',(e)=>{
    e.preventDefault()
    //reset form from data
    //document.querySelector('.form-add').reset()
    document.querySelector('.overlay').classList.add('active-showing')
    document.querySelector('.model_form_edit').classList.add('active-showing')

    })
    //////////////////////////////////////////////////////////////////////////////



</script>
@endsection


