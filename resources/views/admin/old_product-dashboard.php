@extends('layouts.layout')
@section('content')
            <div class="products__tables">
               <div class='header__product-lists'>
                    <div class='left__product-header flex justify-between'>
                         <h1 class='text-xl md:text-3xl font-bold'>Products</h1>
                         <button onClick="add()" class='bg-color-red-button opacity-80 transition hover:opacity-100
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
<div style='width:60%' class='  bg-primary-50 rounded-lg z-[10000] fixed top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] active-showing model_form '>
    <div class='flex'>
     <div onclick="img_div()"  class="w-[140px] m-4 mx-auto  h-[140px] rounded-full bg-color-gray-background-light border border-color-gray-background-light cursor-pointer 
    flex items-center justify-center image-div1">
        <i class='bx bx-plus-medical scale-125 text-color-gray-dark opacity-25'></i>
    </div>
    <div onclick="img_div2()" class="w-[140px] m-4 mx-auto  h-[140px] rounded-full bg-color-gray-background-light border border-color-gray-background-light cursor-pointer 
    flex items-center justify-center image-div2">
        <i class='bx bx-plus-medical scale-125 text-color-gray-dark opacity-25'></i>
    </div>
    <div onclick="img_div3()" class="w-[140px] m-4 mx-auto  h-[140px] rounded-full bg-color-gray-background-light border border-color-gray-background-light cursor-pointer 
    flex items-center justify-center image-div3">
        <i class='bx bx-plus-medical scale-125 text-color-gray-dark opacity-25'></i>
    </div>
    <div onclick="img_div4()" class="w-[140px] m-4 mx-auto  h-[140px] rounded-full bg-color-gray-background-light border border-color-gray-background-light cursor-pointer 
    flex items-center justify-center image-div4">
        <i class='bx bx-plus-medical scale-125 text-color-gray-dark opacity-25'></i>
    </div>
    </div>
    <form class='w-full' id='form__images' >
     @csrf
     <input type='file' hidden class='file__img-input1 imagepro' name='image1' id='image1' onchange="display_add_image(this.files[0],event);add(this.files[0])" />
     <input type='file' hidden class='file__img-input2 imagepro' name='image2' id='image2' onchange="display_add_image(this.files[0],event);add(this.files[0])" />
     <input type='file' hidden class='file__img-input3 imagepro' name='image3' id='image3' onchange="display_add_image(this.files[0],event);add(this.files[0])" />
     <input type='file' hidden class='file__img-input4 imagepro' name='image4' id='image4' onchange="display_add_image(this.files[0],event);add(this.files[0])" />
    </form>
    <form action='' class='w-full form-add' id='form-add' enctype="multipart/form-data">
        @csrf
        <h3 class='text-center heading-form'>Add Categories</h3>
               
            <div class="w-[90%] mx-auto flex gap-2">
                <input type="text" name="name" placeholder='name' id="name" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
                <input type="text" name="sku" placeholder='sku' id="sku" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
            </div>
            <div class="w-[90%] mx-auto flex gap-2">
               <input type="number" name="r_price" placeholder='r_price' id="r_price" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
               <input type="number" name="s_price" placeholder='s_price' id="s_price" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
           </div>
           <div class="w-[90%] mx-auto flex gap-2">
               <input type="text" name="barcode" placeholder='barcode' id="barcode" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
                <select name='made_in' id='made_in' class='w-full h-40px rounded-md mt-2 outline-none'>
                    <option>made_in</option>
                    @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
           </div>
           <div class="w-[90%] mx-auto flex gap-2">
            <select name='brands' id='brands' class='w-full h-40px py-3 rounded-md mt-2 outline-none'>
                <option>brands</option>
                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
            <select name='subcategory' id='subcategory' class='w-full h-40px rounded-md mt-2 outline-none'>
                <option>subcategory</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endforeach
            </select>
           </div>
            <div class="w-[90%] mx-auto mt-4 flex gap-2">
                <textarea style='height:60px' name="short_description"  id="short_description" cols="30" rows="10" class="w-full border border-color-gray-background-light h-[60px] rounded-md px-3 mt-2 outline-none focus:border-color-red-button"></textarea>
                <textarea style='height:60px' name="description" id="description" cols="30" rows="10" class="w-full border border-color-gray-background-light h-[60px]  rounded-md px-3 mt-2 outline-none focus:border-color-red-button"></textarea>
            </div>
            <div class="w-[90%] mx-auto mt-4 flex flex-wrap">
                @foreach ($sizes as $size)
                    <div class='our__size w-[33%]'>
                        <label for='size'>{{$size->name}}</label>
                        <input type='checkbox' name='size[]' id='size' class='size' value="{{$size->id}}" /><br>
                        @foreach ($colors as $color)
                                <div class='ml-3 my-2'>
                                    <label for='color'>{{$color->name}}</label>
                                    <input type='checkbox' name='color[]' id='color' class='color' value="{{$color->id}}" />
                                    <input type='number' name='qty[]' id='qty' class='qty mx-2 border rounded-md outline-none' value='10' />
                                </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div class='w-[90%] mx-auto mt-4 flex'>
                <input type="text" name="tags" placeholder='tags' id="tags" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
                <input type="number" name="quantity_total" placeholder='qty' id="quantity_total" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
            </div>
            <button class='bg-primary-500 px-5 py-2 text-while rounded-md cursor-pointer my-2 inline-block mx-1 save_button' type='submit'>Save</button>
            <button class='bg-primary-200 px-5 py-2 my-2  rounded-md cursor-pointer inline-block mx-1  cancel_button'>Cancel</button>
    </form>
</div> 
<!--end-->
<!--start edit --> 
<!--
<div style='width:60%' class='w-[500px]  bg-primary-50 rounded-lg z-[10000] fixed top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] active-showing model_form_edit '>
    <div class='flex'>
        <div onclick="img_div_edit()"  class="w-[140px] m-4 mx-auto  h-[140px] rounded-full bg-color-gray-background-light border border-color-gray-background-light cursor-pointer 
       flex items-center justify-center image-div1-edit">
           <i class='bx bx-plus-medical scale-125 text-color-gray-dark opacity-25'></i>
       </div>
       <div onclick="img_div2_edit()" class="w-[140px] m-4 mx-auto  h-[140px] rounded-full bg-color-gray-background-light border border-color-gray-background-light cursor-pointer 
       flex items-center justify-center image-div2-edit">
           <i class='bx bx-plus-medical scale-125 text-color-gray-dark opacity-25'></i>
       </div>
       <div onclick="img_div3_edit()" class="w-[140px] m-4 mx-auto  h-[140px] rounded-full bg-color-gray-background-light border border-color-gray-background-light cursor-pointer 
       flex items-center justify-center image-div3-edit">
           <i class='bx bx-plus-medical scale-125 text-color-gray-dark opacity-25'></i>
       </div>
       <div onclick="img_div4_edit()" class="w-[140px] m-4 mx-auto  h-[140px] rounded-full bg-color-gray-background-light border border-color-gray-background-light cursor-pointer 
       flex items-center justify-center image-div4-edit">
           <i class='bx bx-plus-medical scale-125 text-color-gray-dark opacity-25'></i>
       </div>
    </div>
    <form class='w-full' id='form__images-edit'>
        
        <input type='file' hidden class='file__img-input1-edit imagepro' name='image1-edit'  id='image1-edit' onchange="display_edit_image(this.files[0],event);add(this.files[0])" />
        <input type='file' hidden class='file__img-input2-edit imagepro' name='image2-edit'  id='image2-edit' onchange="display_edit_image(this.files[0],event);add(this.files[0])" />
        <input type='file' hidden class='file__img-input3-edit imagepro' name='image3-edit'  id='image3-edit' onchange="display_edit_image(this.files[0],event);add(this.files[0])" />
        <input type='file' hidden class='file__img-input4-edit imagepro' name='image4-edit'  id='image4-edit' onchange="display_edit_image(this.files[0],event);add(this.files[0])" />
    </form>
    <form action='' class='w-full form-edit' id='form-edit' enctype="multipart/form-data">
        
            <div class="w-[90%] mx-auto flex gap-2">
                <input type="text" name="name-edit" placeholder='name-edit' id="name-edit" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
                <input type="text" name="sku-edit" placeholder='sku-edit' id="sku-edit" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
            </div>
            <div class="w-[90%] mx-auto flex gap-2">
                <input type="number" name="r_price-edit" placeholder='r_price-edit' id="r_price-edit" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
                <input type="number" name="s_price-edit" placeholder='s_price-edit' id="s_price-edit" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
            </div>
            <div class="w-[90%] mx-auto flex gap-2">
                <input type="text" name="barcode-edit" placeholder='barcode-edit' id="barcode-edit" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
                <select name='made_in-edit' id='made_in-edit' class='w-full h-40px rounded-md mt-2 outline-none'>
                    <option>made_in</option>
                    
                </select>
            </div>
            <div class="w-[90%] mx-auto flex gap-2">
            <select name='brands-edit' id='brands-edit' class='w-full h-40px py-3 rounded-md mt-2 outline-none'>
                <option>brands</option>
                
            </select>
            <select name='subcategory-edit' id='subcategory-edit' class='w-full h-40px rounded-md mt-2 outline-none'>
                <option>subcategory</option>
                
            </select>
            </div>
            <div class="w-[90%] mx-auto mt-4 flex gap-2">
                <textarea style='height:60px' name="short_description-edit"  id="short_description-edit" cols="30" rows="10" class="w-full border border-color-gray-background-light h-[60px] rounded-md px-3 mt-2 outline-none focus:border-color-red-button"></textarea>
                <textarea style='height:60px' name="description-edit" id="description-edit" cols="30" rows="10" class="w-full border border-color-gray-background-light h-[60px]  rounded-md px-3 mt-2 outline-none focus:border-color-red-button"></textarea>
            </div>
            <div class="w-[90%] mx-auto mt-4 flex flex-wrap">
                
            </div>
            <div class='w-[90%] mx-auto mt-4 flex'>
                <input type="text" name="tags-edit" placeholder='tags-edit' id="tags-edit" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
                <input type="number" name="quantity_total-edit" placeholder='qty' id="quantity_total-edit" class="w-full h-[40px] border border-color-gray-background-light rounded-md px-3 mt-2 outline-none focus:border-color-red-button"/>
            </div>
            <button class='bg-primary-500 px-5 py-2 text-while rounded-md cursor-pointer my-2 inline-block mx-1 save_button_edit' type='submit'>Save</button>
            <button class='bg-primary-200 px-5 py-2 my-2  rounded-md cursor-pointer inline-block mx-1  cancel_button'>Cancel</button>
    </form>
</div> 
-->
<!--end edit -->
<div  class="flex flex-col gap-2 md:flex-row mt-7">
    <div style="width:90%" class='relative overflow-x-auto w-[99%] b md:w-[60%]  shadow-lg sm:rounded-lg mt-6'>
        <!--model insert categories to database-->
         
         <table id="table__data" class="w-full text-sm text-left text-blue-100 dark:text-blue-100">
              <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
               <tr>
                    <th scope="col" class="px-6 py-3">Product name</th>
                    <th scope="col" class="px-6 py-3">Quantity</th>
                    <th scope="col" class="px-6 py-3">Colors</th>
                    <th scope="col" class="px-6 py-3">Size</th>
                    <th scope="col" class="px-6 py-3">Category</th>
                    <th scope="col" class="px-6 py-3">Brands</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
               </tr>
              </thead>
              <tbody class='body__table'>
               
               @foreach($products as $product)
                
                <tr class="bg-blue-500 border-b border-b-color-gray-background-light border-blue-400">
                    <th scope="row" class="px-6 py-4 flex items-center gap-2 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                        @foreach ($images as $image)
                            @if ($product->img_id == $image->id)
                                <img width="50px" height="50px" src="{{asset('products/'.$image->img)}}" alt="" class='w-[50px] h-[50px] rounded-md'>
                            @endif
                        @endforeach
                        <span>{{$product->name}}</span>
                    </th>
                    <td class="px-6 py-4">
                        <button class='border border-color-gray-background-light w-32 cursor-pointer outline-none rounded-md bg-while flex items-center'>
                            <span class="w-[30%] hover:bg-color-gray-background-light transition text-lg  border-r p-2 border-r-color-gray-background-light">-</span>
                            <span class='w-[40%] hover:bg-color-gray-background-light p-2 transition text-lg'>{{$product->quantity_total}}</span>
                            <span class='w-[30%] hover:bg-color-gray-background-light transition text-lg border-l p-2 border-l-color-gray-background-light'>+</span>
                        </button>
                    </td>
                    
                        {{-- <div class='flex gap-1'>
                            @php $colorss=array() @endphp
                            @foreach($product->sizes as $size)
                                @foreach($size->colors as $color)
                                  @if($color->pivot->product_id == $product->id)
                                    @php $colorss[]=$color->id  @endphp
                                  @endif 
                                @endforeach 
                            @endforeach 
                            @php 
                                $colorss=array_unique($colorss);
                                sort($colorss);
                                $i=0; 
                            @endphp
                            @foreach($colors as $key=>$color)
                                @if($i < count($colorss) )
                                    @if($color->id==$colorss[$i])
                                        <span style="background: {{$color->code}}"  class='rounded-full w-6 h-6'></span>
                                        @php $i++ @endphp
                                    @endif
                                @endif 
                            @endforeach 
                        </div> --}}
                        @php 
                        $colorss=array() ;
                        $quantity=array();
                        $pro=array();
                        @endphp
                        @foreach($product->sizes as $size)
                            @foreach($size->colors as $color)
                                @if($color->pivot->product_id == $product->id)
                                @php 
                                $colorss[]=$color->id  ;
                                $quantity['id']=$color->id;
                                $quantity['qty']=$color->pivot->quantity;
                                //push to array
                                array_push($pro,$quantity);

                                
                                @endphp
                                
                                @endif 
                            @endforeach 
                        @endforeach 
                        
                        @for($i=0;$i<count($pro);$i++)
                            @for($j=$i+1;$j<count($pro);$j++)
                                @if($pro[$i]['id']==$pro[$j]['id'])
                                    @php 
                                        $pro[$i]['qty']=$pro[$i]['qty']+$pro[$j]['qty'];
                                        unset($pro[$j]);
                                        $pro=array_values($pro);
                                    @endphp
                                @endif
                            @endfor
                        @endfor
                    
                        @php 

                            $colorss=array_unique($colorss);
                            sort($colorss);
                            
                            $i=0; 
                        @endphp
                    <td class="px-6 py-4 flex gap-1" >
                        @foreach($colors as $key=>$color)
                        @if($i < count($pro))
                            @if($color->id==$pro[$i]['id'])
                                <label wire:click.model="color({{$color->id}})" style="background:{{$color->code}}" onClick="addc(event)" for="{{$color->id}}" class="cursor-pointer relative rounded-full w-8 h-8 flex colors">
                                    <span style="font-size:7px;color:#000;background:#fff;padding:0.3px;width:16px;height:16px;" class="absolute  font-bold rounded-full bottom-0 right-0 z-40 flex justify-center items-center">
                                        {{$pro[$i]['qty']}}
                                    </span>
                                </label>
                                <input  hidden type="radio" id="{{$color->id}}" name="color" value="{{$color->id}}" />
                                @php $i++ @endphp
                            @endif
                        @endif 
                       @endforeach 
                    </td>
                    
                    <td class="px-6 py-4">
                        <div class='flex gap-1'>
                            @foreach($product->sizes as $size)
                                <span class='bg-color-gray-background-light p-1 px-3 rounded-md text-xs font-bold'>{{$size->name}}</span>
                            @endforeach
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class='flex flex-col items-center'>
                            <span><img src="{{asset('subcategories/'.$product->sub_category->image)}}" alt='category img'
                                class="w-14 h-14 rounded-full"
                                />
                            </span>
                            <span>{{$product->sub_category->name}}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class='flex flex-col items-center'>
                            <span><img src='{{asset('brands/'.$product->brand->image)}}' 
                                alt='brands products' class="w-14 h-14 rounded-full"/></span>
                            <span>{{$product->brand->name}}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class='flex gap-1 items-center'>
                            <span class="button-edit-product" data-id={{$product->id}} onclick="edit()"><i class='bx bxs-edit text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#dcfce7] text-[#4ade80]' ></i></span>
                            <span><i class='bx bxs-trash text-2xl rounded-full flex items-center justify-center cursor-pointer w-11 h-11 bg-[#fee2e2] text-[#f87171]' ></i></span>
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
var counter=0
var images=[]
function add(file){
    console.log('add')
    let formData=new FormData()
    
    formData.append(`image${counter}`,file)
    if(counter==4){
    $.ajax({
            url:"{{route('images-add')}}",
            type:'post',
            data:new FormData($('#form__images')[0]),
            contentType:false,
            processData:false,
            success:function(response){
            console.log(response)
            //insert id images inserted to array images
                
                console.log(response.images)
                images=response.images
                console.log('my array')
                console.log(images)
            },
            error:function(error){
            console.log(error)
            }
    })
    }else{console.log('not')}
}

    $(document).ready(function(){
        //insert images
        $(document).on('change','.imagepro',function (e){
            e.preventDefault()
            //get file from input
            counter++
            let file=e.target.files[0]
            console.log(file)
            //call function add
            display_add_image(file,e)
            console.log(`image number ${counter}`)
            add(file)
        })
        $(document).on('click','.save_button',function (e){
            e.preventDefault()
            let data=[]
            data['name']=$('#name').val()
            data['short_description']=$('#short_description').val()
            data['sku']=$('#sku').val()
            data['barcode-edit']=$('#barcode').val()
            data['brands']=$('#brands').val()
            data['subcategory']=$('#subcategory').val()
            data['description']=$('#description').val()
            data['images']=images
            data['made_in']=$('#made_in').val()
            data['r_price']=$('#r_price').val()
            data['s_price']=$('#s_price').val()
            data['quantity_total']=$('#quantity_total').val()

            let sizes=[]
            //get all sizes
            let all_sizes=$('input[name="size[]"]')
            //loop all sizes
            let i=0
            $.each(all_sizes,function(key,value){
               if($(value).is(':checked')){
                    let size={}
                    size['size_id']=$(value).val()
                    let colors=[]
                    let all_colors=$('.our__size')[key].querySelectorAll('.color')
                    var indice=key
                    var j=0
                    $.each(all_colors,function(key,value){
                    if($(value).is(':checked')){
                        let color={}
                        color['color_id']=$(value).val()
                        color['quantity']=document.querySelectorAll('.our__size')[indice].querySelectorAll('.qty')[j].value
                        colors.push(color)
                    }
                    j++
                    i++
                    })
                    size['colors']=colors
                    sizes.push(size)
                }
            })
            data['sizes']=sizes
            data['tag']=['one','two','three']
            console.log(data)
            


            $.ajax({
                url: "{{route('product-add')}}",
                type: 'POST',
                data:{
                    name:data['name'],
                    short_description:data['short_description'],
                    sku:data['sku'],
                    barcode:data['barcode'],
                    brand_id:data['brands'],
                    sub_category_id:data['subcategory'],
                    description:data['description'],
                    image:data['images'],
                    made_in:data['made_in'],
                    r_price:data['r_price'],
                    s_price:data['s_price'],
                    quantity_total:data['quantity_total'],
                    sizes:data['sizes'],
                    tag:data['tag'],
                    _token:$('meta[name="csrf-token"]').attr('content')
                },
                success: function (response){
                    console.log('success yow')
                    if(response.status=="success inserted products"){
                        $('#form-add')[0].reset()
                        //console.log(response)
                        //load data to table
                        $('#table__data').load(location.href + ' #table__data')
                    }
                    console.log(response)
                },
                error: function (error){
                    //console.log("error")
                    $.each(error.responseJSON.errors,function(key,value) {
                        //console.log(value)
                    })
                }
            })
        })
        //show 
        $(document).on('click','.button-edit-product',function (e){
            e.preventDefault()
            //get id from button edit
            var id = $(this).data('id')
            console.log(id)
            //get data from database
            $.ajax({
                url: "{{route('product-show')}}",
                type: 'POST',
                data:{
                    id:id,
                    _token:$('meta[name="csrf-token"]').attr('content')
                },
                success: function (response){
                    //console.log('success yow')
                    if(response.status=="success show product"){
                        console.log(response)
                    } 
                },
                error: function (error){
                    //console.log("error")
                    $.each(error.responseJSON.errors,function(key,value) {
                        //console.log(value)
                    })
                }
            })
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
                    //console.log('success')
                    if(response.status=="success updated categories"){
                        $('#form-edit')[0].reset()
                        $('.body__table').empty()
                        $.each(response.categories,function(key,value){
                            //console.log(value)
                            //empty table 
                            $('.body__table').append(`
                           
                            `)
                        } 
                        )
                    }
                },
                error: function (error){
                    //console.log("error")
                    $.each(error.responseJSON.errors,function(key,value) {
                        //console.log(value)
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
                            //console.log('success')
                            $('.body__table').empty()
                            $.each(response.categories,function(key,value){
                                //console.log(value)
                                //empty table 
                                $('.body__table').append(`
                                
                                `)
                            }) 
                        }
                    }, 
                    error: function (error){
                        //console.log("error")
                        $.each(error.responseJSON.errors,function(key,value) {
                            //console.log(value)
                        })
                    },
                })
            }


        })
        //search
        $(document).on('keyup','#search-categories',function(e){
            e.preventDefault()
            let search = $(this).val()
            //console.log(search)
            $.ajax({
                url:"{{route('category-search')}}",
                type: 'POST',
                data: {
                    search:search,
                    _token:$('meta[name="csrf-token"]').attr('content')
                },
                success: function (response){
                    if(response.status=="success"){
                        //console.log('success')
                        //code do while if response data is empty load true if not load false
                        var load = true
                        
                            //filter table of categories by search 
                            $('.body__table').empty()
                            $.each(response.categories,function(key,value){
                                //console.log(value)
                                //empty table 
                                $('.body__table').append(`
                                
                                `)
                            
                        })
                    }
                },
                error:function (error){
                    //console.log('error')
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
    function img_div(){
          document.querySelector('.file__img-input1').click()
    }
    function img_div2(){
          document.querySelector('.file__img-input2').click()
    }
    function img_div3(){
          document.querySelector('.file__img-input3').click()
    }
    function img_div4(){
          document.querySelector('.file__img-input4').click()
    }
    //edit 
    /*function img_div_edit(){
          document.querySelector('.file__img-input1-edit').click()
    }
    function img_div2_edit(){
          document.querySelector('.file__img-input2-edit').click()
    }
    function img_div3_edit(){
          document.querySelector('.file__img-input3-edit').click()
    }
    function img_div4_edit(){
          document.querySelector('.file__img-input4-edit').click()
    }*/
    

    /*document.querySelector('.image-div-edit').addEventListener('click',(e)=>{
    document.querySelector('.file__img-input-edit').click()})*/

    function display_add_image(file,e){
    ////console.log(e.target)
        let allowed = ['jpg','jpeg','png'];
        let ext = file.name.split(".").pop();
        if(allowed.includes(ext.toLowerCase())){
        image_added=true
        //set image in background-img of div
        if(e.target.classList.contains('file__img-input1')){
                document.querySelector('.image-div1').style.backgroundImage=`url(${URL.createObjectURL(file)})`
        }
        if(e.target.classList.contains('file__img-input2')){
                document.querySelector('.image-div2').style.backgroundImage=`url(${URL.createObjectURL(file)})`
        }
        if(e.target.classList.contains('file__img-input3')){
                document.querySelector('.image-div3').style.backgroundImage=`url(${URL.createObjectURL(file)})`
        }
        if(e.target.classList.contains('file__img-input4')){
                document.querySelector('.image-div4').style.backgroundImage=`url(${URL.createObjectURL(file)})`
        }
        }else {
        alert("Only the following image types are allowed:"+ allowed.toString(", "));
        }
    }
    /*function display_edit_image(file,e){
    ////console.log(e.target)
        let allowed = ['jpg','jpeg','png'];
        let ext = file.name.split(".").pop();
        if(allowed.includes(ext.toLowerCase())){
        image_added=true
        //set image in background-img of div
        if(e.target.classList.contains('file__img-input1-edit')){
                document.querySelector('.image-div1-edit').style.backgroundImage=`url(${URL.createObjectURL(file)})`
        }
        if(e.target.classList.contains('file__img-input2-edit')){
                document.querySelector('.image-div2-edit').style.backgroundImage=`url(${URL.createObjectURL(file)})`
        }
        if(e.target.classList.contains('file__img-input3-edit')){
                document.querySelector('.image-div3-edit').style.backgroundImage=`url(${URL.createObjectURL(file)})`
        }
        if(e.target.classList.contains('file__img-input4-edit')){
                document.querySelector('.image-div4-edit').style.backgroundImage=`url(${URL.createObjectURL(file)})`
        }
        }else {
        alert("Only the following image types are allowed:"+ allowed.toString(", "));
        }
    }*/
    //edit 
    /*function display_edit_image(file){
    let allowed = ['jpg','jpeg','png'];
    let ext = file.name.split(".").pop();
    if(allowed.includes(ext.toLowerCase())){
    image_added=true
    //set image in background-img of div
    document.querySelector('.image-div-edit').style.backgroundImage=`url(${URL.createObjectURL(file)})`
    }else {
    alert("Only the following image types are allowed:"+ allowed.toString(", "));
    }
    }*/
    ////////////////////////////////////////////////////////////////////////



    //hidden and ashow button 
    ///////////////////////////////////////////////////////////////////////////////
    
    //edit 
    /*function edit(){
        document.querySelector('.overlay').classList.remove('active-showing')
        document.querySelector('.model_form_edit').classList.remove('active-showing')
    }*/

    function add(){
        document.querySelector('.model_form').classList.remove('active-showing')
    document.querySelector('.overlay').classList.remove('active-showing')
    }
    document.querySelector('.overlay').addEventListener('click',()=>{
    document.querySelector('.overlay').classList.add('active-showing')
    document.querySelector('.model_form').classList.add('active-showing')
    })
    //edit 
    /*function edit_category(){
        document.querySelector('.overlay').classList.remove('active-showing')
        document.querySelector('.model_form_edit').classList.remove('active-showing')
    }*/

    

    document.querySelector('.cancel_button').addEventListener('click',(e)=>{
    e.preventDefault()
    //reset form from data 
    //document.querySelector('.form-add').reset()
    document.querySelector('.overlay').classList.add('active-showing')
    document.querySelector('.model_form').classList.add('active-showing')
    
    })

    /*document.querySelector('.cancel_button_edit').addEventListener('click',(e)=>{
    e.preventDefault()
    //reset form from data 
    //document.querySelector('.form-add').reset()
    document.querySelector('.overlay').classList.add('active-showing')
    document.querySelector('.model_form_edit').classList.add('active-showing')
    
    })*/
    document.querySelector('.save_button').addEventListener('click',(e)=>{
    e.preventDefault()
    //reset form from data 
    //document.querySelector('.form-add').reset()
    document.querySelector('.overlay').classList.add('active-showing')
    document.querySelector('.model_form').classList.add('active-showing')
    
    })

    /*document.querySelector('.save_button_edit').addEventListener('click',(e)=>{
    e.preventDefault()
    //reset form from data 
    //document.querySelector('.form-add').reset()
    document.querySelector('.overlay').classList.add('active-showing')
    document.querySelector('.model_form_edit').classList.add('active-showing')
    
    })*/
    //////////////////////////////////////////////////////////////////////////////



</script>
@endsection


