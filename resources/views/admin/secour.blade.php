<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="preconnect" href="https://fonts.bunny.net">
     
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
     <title>Document</title>
</head>
<body>
<h3>Products</h3>
     <table class='table'>
          <thead>
              
          </thead>
          <tbody>
               @foreach ($products as $product)
                    {{$product->name}}<br>
                    {{$product->r_price}}<br>
                    {{$product->s_price}}<br>
                    {{$product->sku}}<br>
                    {{$product->description}}<br>
                    {{$product->barcode}}<br>
                    {{$product->made_in}}<br>
                    {{$product->quantity_total}}<br>
                    hhh<br>
                    {{$product->subcategory->sub_category_name}}<br>
                    {{$product->brand->brand_name}}<br>
                    @foreach ($product->sizes as $size)
                         {{$size->size_name}}<br>
                         @foreach ($size->colors as $color)
                              {{$color->color_name}}<br>
                              {{$color->quantity}}<br>
                         @endforeach
                    @endforeach
                    <p>gogogogogoog</p>
               @endforeach
          </tbody>
     </table>
     
</div>

<form id='form__images' enctype="multipart/form-data">
     @csrf 
     <input type='file' onchange="add(this.files[0])"  name='image1' class='imagepro' id='image1' /><br>
     <input type='file' onchange="add(this.files[0])"  name='image2' class='imagepro' id='image2' /><br>
     <input type='file' onchange="add(this.files[0])"  name='image3' class='imagepro' id='image3' /><br> 
     <input type='file' onchange="add(this.files[0])"  name='image4' class='imagepro' id='image4' /><br>
     
</form>
<form class='product__form__add' id='product__form__add' enctype="multipart/form-data" >
     @csrf
     <input type='file' name='image' id='image' /><br>
     <input type='text' name='name' id='name' /><br>
     <input type='number' name='r_price' id='r_price' /><br>
     <input type='number' name='s_price' id='s_price' /><br>
     <input type='text' name='sku' id='sku' /><br>
     <input type='text' name='description' id='description' /><br>
     <input type='text' name='barcode' id='barcode' /><br>


     <select name='made_in' id='made_in'>
           <option>made_in</option>
           @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->country_name}}</option>
           @endforeach
     </select><br>

     <input type='number' name='quantity_total' id='quantity_total' value='10' /><br>
     <select name='sub_category_id' id='sub_category_id'>
           <option>subcategories</option>
           @foreach ($subcategories as $subcategory)
                <option value="{{$subcategory->id}}">{{$subcategory->sub_category_name}}</option>
           @endforeach
     </select><br>
     <select name='brand_id'  id='brand_id'>
           <option>brands</option>
           @foreach ($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
           @endforeach
     </select><br>
     @foreach ($sizes as $size)
          <div class='our__size'>
               <label for='size'>{{$size->size_name}}</label>
               <input type='checkbox' name='size[]' id='size' class='size' value="{{$size->id}}" /><br>
               @foreach ($colors as $color)
                    <div>
                         <label for='color'>{{$color->color_name}}</label>
                         <input type='checkbox' name='color[]' id='color' class='color' value="{{$color->id}}" />
                         <input type='number' name='qty[]' id='qty' class='qty' value='10' /><br>
                    </div>
               @endforeach
          </div><br>
     @endforeach
     <input type='text' name='tag' id='tag' /><br>
     <button type='submit' class='add_product'>save</button>
</form>
<script>
     $.ajaxSetup({
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
     });
 </script>
 <script
 src="https://code.jquery.com/jquery-3.6.3.min.js"
 integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
 crossorigin="anonymous"></script>
 <script>
var counter=0
//empty array has id images inserted
var images=[]
function add(file){
                  //create form data
                  let formData=new FormData()
                  //add file to form data
                  formData.append(`image${counter}`,file)
                  //send data to server
                  if(counter==4){
                    $.ajax({
                         url:"{{route('image-add')}}",
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
                  }
           }
$(document).ready(function(){
          
         //function add  
           
        //add
        $(document).on('change','.imagepro',function (e){
               e.preventDefault()
               //get file from input
               counter++
               let file=e.target.files[0]
               console.log(file)
               //call function add
               add(file)
        })
        $(document).on('click','.add_product',function (e){
        e.preventDefault()
        //get data from form
        //create array has all data from form any has key and value 
          let data=[]
          data['name']=$('#name').val()
          data['made_in']=$('#made_in').val()
          data['r_price']=$('#r_price').val()
          data['s_price']=$('#s_price').val()
          data['sku']=$('#sku').val()
          data['description']=$('#description').val()
          data['barcode']=$('#barcode').val()
          
               //data has image file
          data['image']=$('#image')[0].files[0]
          data['quantity_total']=$('#quantity_total').val()
          data['sub_category_id']=$('#sub_category_id').val()
          data['brand_id']=$('#brand_id').val()
               //create array has all sizes every size has data object colors
          let sizes=[]
          //get all sizes
          let all_sizes=$('input[name="size[]"]')
          //loop all sizes
          let i=0
          $.each(all_sizes,function(key,value){
               if($(value).is(':checked')){
               //create object has size id and array has all colors
               let size={}
               //get size id
               size['size_id']=$(value).val()
               //create array has all colors
               let colors=[]
               


               //get all colors
               
               let all_colors=$('.our__size')[key].querySelectorAll('.color')
               //loop all colors
               var indice=key
               var j=0
               $.each(all_colors,function(key,value){
               if($(value).is(':checked')){
               //create object has color id and quantity
               let color={}
               //get color id
               color['color_id']=$(value).val()
               //get quantity
               color['quantity']=document.querySelectorAll('.our__size')[indice].querySelectorAll('.qty')[j].value
               //push color to colors array
               colors.push(color)
               
               
              
               }
               j++
               i++
               
               
               })
               
               
               //push colors to size object
               size['colors']=colors
               //push size to sizes array
               sizes.push(size)
               }
          })
          
          //push sizes to data
          data['sizes']=sizes
          //get tags
          data['tag']=$('#tag').val()
          //send data to server
          //console.log(data)
          //console.log(data['sizes'])
          


          console.log(data['sizes'])
          console.log(data['image'])
          
           


        $.ajax({
          url: "{{route('add-product')}}",//url
          type: 'POST',//method type 
          
          data:{
               name:data['name'],
               made_in:data['made_in'],
               r_price:data['r_price'],
               s_price:data['s_price'],
               sku:data['sku'],
               description:data['description'],
               barcode:data['barcode'],

               //image:data['image'],
               quantity_total:data['quantity_total'],
               sub_category_id:data['sub_category_id'],
               brand_id:data['brand_id'],
               //send size form JSON to laravel
               sizes:data['sizes'],
               image:images,
               tag:['one','two','three'],
               _token:$('meta[name="csrf-token"]').attr('content')
          },

          
          
          success: function (response){
          $('#product__form__add')[0].reset()
          console.log('success')
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
     })

</script>
</body>
</html>