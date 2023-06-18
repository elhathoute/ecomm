<div>
    <div class='statistiques flex flex-wrap  w-full'>
        <div class="box box__one flex gap-1 md:gap-5 justify-center items-center my-1 py-4 md:py-7 p-2 md:p-5 rounded-xl mx-[0.5%] w-[100%] sm:w-[49%]   md:w-[32.33%] lg:w-[24%] bg-color-red-button">
            <div>
                <i class='bx bx-money-withdraw text-md md:text-2xl'></i>
            </div>
            <div class="box__one__content">
                <h3 class="text-xs md:text-sm font-semibold text-color-gray-dark">Total Sales</h3>
                <h1 class="text-md md:text-3xl font-bold mt-1 md:mt-2">${{$totalSale}}k</h1>
            </div>
        </div>
        <div class="box box__two flex gap-1 md:gap-5 justify-center items-center my-1 py-4 md:py-7 p-2 md:p-5 rounded-xl mx-[0.5%] w-[100%] sm:w-[49%]   md:w-[32.33%] lg:w-[24%] bg-color-red-button">
            <div>
                <i class='bx bx-stats text-md md:text-2xl'></i>
            </div>
            <div class="box__one__content">
                <h3 class="text-xs md:text-sm font-semibold text-color-gray-dark">Total Canceled</h3>
                <h1 class="text-md md:text-3xl font-bold mt-1 md:mt-2">${{$totalCancel}}K</h1>
            </div>
        </div>
        <div class="box box__three flex gap-1 md:gap-5 justify-center items-center my-1 py-4 md:py-7 p-2 md:p-5 rounded-xl mx-[0.5%] w-[100%] sm:w-[49%]   md:w-[32.33%] lg:w-[24%] bg-color-red-button">
            <div>
                <i class='bx bx-money-withdraw text-md md:text-2xl'></i>
            </div>
            <div class="box__one__content">
                <h3 class="text-xs md:text-sm font-semibold text-color-gray-dark">Total Quantity</h3>
                <h1 class="text-md md:text-3xl font-bold mt-1 md:mt-2">{{$quantitySale}}K</h1>
            </div>
        </div>
        <div class="box box__four flex gap-1 md:gap-5 justify-center items-center my-1 py-4 md:py-7 p-2 md:p-5 rounded-xl mx-[0.5%] w-[100%] sm:w-[49%]   md:w-[32.33%] lg:w-[24%] bg-color-red-button">
            <div>
                <i class='bx bx-money-withdraw text-md md:text-2xl'></i>
            </div>
            <div class="box__one__content">
                <h3 class="text-xs md:text-sm font-semibold text-color-gray-dark">Total Customer</h3>
                <h1 class="text-md md:text-3xl font-bold mt-1 md:mt-2">{{$countUser}}</h1>
            </div>
        </div> 
    </div>
    <div class='flex:col flex-wrap md:flex-row content__dashboard-statistique rounded-md flex mt-9' >
        <div style='height:400px' class='content__chart border border-color-gray-background-light w-[100%] md:w-[65%] overflow-y-scroll rounded-lg shadow-sm'>
            <h2 class='p-3 text-sm md:text-lg'>Top Selling Products</h2>
            <hr class='border-none h-[1px] bg-color-gray-background-light'>
            @foreach($products_sale as $product_sale)
                <div class='product__selling flex justify-start gap-8 md:justify-between items-center p-1 md:p-4'>
                    <div class='product--dash flex items-center gap-1 md:gap-3'>
                        @foreach ($images as $image)
                            @if ($product_sale->img_id == $image->id)
                                <div>
                                    <img 
                                    class='w-[40px] h-[40px] md:w-[110px] md:h-[80px] rounded-md'
                                    src="{{asset("products/".$image->img)}}"
                                    alt='product'/>
                                </div>
                            @endif
                        @endforeach 
                        <div>
                            <div class='flex flex-col'>
                                <div class='flex-col md:flex-row flex items-center  md:gap-2'>
                                    <h2 class='text-xs md:text-md name-product'>{{$product_sale->name}}</h2>
                                    <p class='hidden text-color-rating items-center sm:flex md:gap-1 text-xs'>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </p>
                                </div>
                                <h3 class='text-color-gray-dark text-xs hidden md:flex font-bold'>{{$product_sale->sub_category->name}}</h3>
                                <h3 class='text-color-gray-dark text-xs hidden md:flex'>{{$product_sale->brand->name}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class='product--dash flex items-center gap-1 md:gap-3'>
                        <div>
                            <img 
                            class='hidden md:flex w-[80px] h-[80px] rounded-full  '
                            src='{{asset("subcategories/".$product_sale->sub_category->image)}}' 
                            alt='product'/>
                        </div>
                    </div>
                    <div class='product--dash flex items-center gap-1 md:gap-3'>
                        <div>
                            <img 
                            class='hidden md:flex w-[80px] h-[80px] rounded-full  '
                            src='{{asset("brands/".$product_sale->brand->image)}}' 
                            alt='product'/>
                        </div>
                    </div>
                    <div class='price-dash'>
                        <h2 class='text-sm md:text-xl flex  items-center flex-col font-bold'>
                            <span class='text-[#bef264]'>{{$product_sale->sale_price}}</span>
                            <span class= 'text-xs md:text-md text-color-gray-background-light'>in Sales</span>
                        </h2>
                    </div>
                    <div class='quantity-dash'>
                        <h2 class='text-sm md:text-xl flex  items-center flex-col font-bold'>
                            <span class='text-[#bef264]'>{{$product_sale->quantity}}</span>
                            <span class= 'text-xs md:text-md text-color-gray-background-light'>in Sales</span>
                        </h2>
                    </div>
                    <div class='id__counter'>
                        <h2 class='text-sm md:text-lg text-color-gray-dark font-bold bg-[#f5f3ff] w-[30px] 
                        h-[30px] p-5 rounded-md flex justify-center items-center'>#1</h2>
                    </div>
                </div>
                <hr class='border-none h-[1px] bg-color-gray-background-light'>
            @endforeach 
        </div>
        <div style='height:400px' class='chart__1 w-[100%] md:w-[32%] '>
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <div class='flex:col flex-wrap md:flex-row content__dashboard-statistique rounded-md flex mt-9'>
        <div style='height:400px' class='content__chart border border-color-gray-background-light w-[100%] md:w-[40%] overflow-y-scroll rounded-lg shadow-sm'>
            <h2 class='p-3 text-sm md:text-lg'>Top Selling Products</h2>
            <hr class='border-none h-[1px] bg-color-gray-background-light'>
            @foreach($brands_sale2 as $brand)
                <div class='brands_selling flex justify-start gap-8 md:justify-between items-center p-1 md:p-4'>
                    
                    <div class='product--dash flex items-center gap-1 md:gap-3'>
                        <div class="flex items-center gap-2">
                            <img 
                            class='hidden md:flex w-[80px] h-[80px] rounded-full  '
                            src='{{asset("brands/".$brand->image)}}' 
                            alt='product'/>
                            <p class="font-bold">{{$brand->name}}</p>
                        </div>
                    </div>
                    
                    
                    <div class='quantity-selling'>
                        <h2 class='text-sm md:text-xl flex  items-center flex-col font-bold'>
                            <span class='text-[#bef264]'>{{$brand->quantity}}</span>
                            <span class= 'text-xs md:text-md text-color-gray-background-light'>in Sales</span>
                        </h2>
                    </div>
                    <div class='id__counter'>
                        <h2 class='text-sm md:text-lg text-color-gray-dark font-bold bg-[#f5f3ff] w-[30px] 
                        h-[30px] p-5 rounded-md flex justify-center items-center'>#1</h2>
                    </div>
                </div>
                <hr class='border-none h-[1px] bg-color-gray-background-light'>
            @endforeach 
        </div>
        <div style='height:400px' class='chart__1 w-[100%] md:w-[55%] '>
            <canvas id="bar-chart"></canvas>
        </div>
        
    </div>
    <div class='flex:col flex-wrap md:flex-row content__dashboard-statistique rounded-md flex mt-9'>
        <div style='height:400px' class='content__chart border border-color-gray-background-light w-[100%] md:w-[40%] overflow-y-scroll rounded-lg shadow-sm'>
            <h2 class='p-3 text-sm md:text-lg'>Top Selling Products</h2>
            <hr class='border-none h-[1px] bg-color-gray-background-light'>
            @foreach($statistique_sales as $key=>$salling)
                
                <div class='sallings_selling flex justify-start gap-8 md:justify-between items-center p-1 md:p-4'>
                    <div class='quantity-selling'>
                        <h2 class='text-sm md:text-xl flex  items-center justify-between gap-3 font-bold'>
                            <span class='text-[#bef264]'>{{$salling['day']}}</span>
                            <span class= 'text-xs md:text-md text-color-gray-background-light'>{{$salling['total']}}</span>
                        </h2>
                    </div>
                    <div class='id__counter'>
                        <h2 class='text-sm md:text-lg text-color-gray-dark font-bold bg-[#f5f3ff] w-[30px] 
                        h-[30px] p-5 rounded-md flex justify-center items-center'>#1</h2>
                    </div>
                </div>
                <hr class='border-none h-[1px] bg-color-gray-background-light'>
            @endforeach 
        </div>
        <div style='height:400px' class='chart__1 w-[100%] md:w-[55%] '>
            <canvas id="line-chart"></canvas>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let data_name=[];
    document.querySelectorAll('.product__selling').forEach((product)=>{
        data_name.push(product.querySelector('.product--dash h2').textContent);
    });
    //console.log(data_name)
    let data_price=[];
    document.querySelectorAll('.product__selling').forEach((product)=>{
        data_price.push(product.querySelector('.quantity-dash h2 span').textContent);
    });
    //console.log(data_price)


    let brand_name=[] 
    document.querySelectorAll('.brands_selling').forEach((brand)=>{
        brand_name.push(brand.querySelector('.product--dash p').textContent);
    });


    let brand_quantity=[]
    document.querySelectorAll('.brands_selling').forEach((brand)=>{
        brand_quantity.push(brand.querySelector('.quantity-selling h2 span').textContent);
    });

    let salling_day=[]
    document.querySelectorAll('.sallings_selling').forEach((salling)=>{
        salling_day.push(salling.querySelector('.quantity-selling h2 span').textContent);
    });
    console.log(salling_day)

    let salling_total=[]
    document.querySelectorAll('.sallings_selling').forEach((salling)=>{
        salling_total.push(salling.querySelector('.quantity-selling h2 span:nth-child(2)').textContent);
    });
    console.log(salling_total)


    const ctx = document.getElementById('myChart');
    const bar_chart=document.getElementById('bar-chart');
    const line_chart=document.getElementById('line-chart');
    const data = {
        labels:data_name,
        datasets: [{
            label: 'My First Dataset',
            data: data_price,
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(246, 146, 168)',
            'rgb(251, 169, 187)',
            'rgb(251, 183, 197)',
            'rgb(249, 201, 210)',
            'rgb(252, 212, 220)',
            'rgb(252, 212, 220)',
            'rgb(252, 212, 220)',
            ]
        }]
    };
    new Chart(ctx, {
        type: 'polarArea',
        data: data,
        options: {}
    });

    //function event if i scroll page 
    
    //bar charts
    
    
    Chart.defaults.backgroundColor = '#000';
    new Chart(bar_chart, {
        type: 'bar',
        data: {
            labels: brand_name,
            datasets: [{
            label: '# of Votes',
            data: brand_quantity,
            backgroundColor:[
                'rgb(255, 99, 132)',
                'rgb(246, 146, 168)',
                'rgb(251, 169, 187)',
                'rgb(251, 183, 197)',
                'rgb(249, 201, 210)',
                'rgb(252, 212, 220)',
            ],
            borderColor:[
                'rgba(255,99,132,1)',
                'rgba(54,162,235,1)',
                'rgba(255,206,86,1)',
                'rgba(75,192,192,1)',
                'rgba(153,102,255,1)',
                'rgba(255,159,64,1)',
            ],
            borderWidth: 1,
            }]
        },
        options: {
            responsive:true,
        }
    });

    //Line Charts 
    
    new Chart(line_chart,{
        type: 'line',
        data: {
            labels: 'Red',
            datasets: [{
                label: 'My First Dataset',
                data:salling_total,
                fill:true,
                borderColor: 'rgb(249, 201, 210)',
                tension: 0.1
            }]

        }
    })
</script>
</div>
