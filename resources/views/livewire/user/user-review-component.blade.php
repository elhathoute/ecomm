<div>
    <style>

    </style>
    <div class="wrap-review-form w-[50%] mx-auto">
        <div id="comments">
            <h2 class="woocommerce-Reviews-title">review for <span>Radiant-360 R6 Chainsaw Omnidirectional [Orage]</span></h2>
            <ol class="commentlist">
                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                    <div id="comment-20" class="comment_container"> 
                        @foreach ($images as $image)
                            @if ($order_item->product->img_id == $image->id)
                                
                                <a href="{{route('product.details',['slug'=>$order_item->product->slug])}}">
                                    <img style='width:80px;height:80px' 
                                    src="{{asset("products/".$image->img)}}" alt="">
                                </a>
                            @endif
                        @endforeach
                        <div class="comment-text">
                            <div class="star-rating">
                                <span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
                            </div>
                            <p class="meta"> 
                                <strong class="woocommerce-review__author">
                                    {{$order_item->product->name}}
                                </strong> 
                                <span class="woocommerce-review__dash">–</span>
                                <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >
                                    {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order_item->created_at)->format('D, M d, Y')}}
                                </time>
                            </p>
                            <div class="description">
                                <p>{{$order_item->product->short_description}}</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ol>
        </div><!-- #comments -->
        <div id="review_form_wrapper">
            <div id="review_form">
                @if(Session::has('message'))
                    <p>{{Session::get('message')}}</p>
                @endif 
                <div id="respond" class="comment-respond"> 
                    <form wire:submit.prevent="addReview" id="commentform" class="comment-form py-8" novalidate="">
                        <p class="comment-notes">
                            <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                        </p>
                        <div class="comment-form-rating">
                            <span>Your rating</span>
                            <p class="stars">
                                <label class="labelss" onclick="rating(event)" for="rated-1">
                                    <i class='bx bxs-star'></i>
                                </label>
                                <input type="radio" id="rated-1" wire:model="rating" name="rating" value="1">
                                <label class="labelss" onclick="rating(event)" for="rated-2">
                                    <i class='bx bxs-star'></i>
                                </label>
                                <input type="radio" id="rated-2" wire:model="rating" name="rating" value="2">
                                <label class="labelss" onclick="rating(event)" for="rated-3">
                                    <i class='bx bxs-star'></i>
                                </label>
                                <input type="radio" id="rated-3" wire:model="rating" name="rating" value="3">
                                <label class="labelss" onclick="rating(event)" for="rated-4">
                                    <i class='bx bxs-star'></i>
                                </label>
                                <input type="radio" id="rated-4" wire:model="rating" name="rating" value="4">
                                <label class="labelss" onclick="rating(event)" for="rated-5">
                                    <i class='bx bxs-star'></i>
                                </label>
                                <input  type="radio" id="rated-5" wire:model="rating" name="rating" value="5" checked="checked">
                                @error('rating')
                                <span style='color:red'>{{$message}}</span>
                                @enderror 
                            </p>
                        </div>
                        
                        <p class="comment-form-comment mt-6 ml-0" >
                            <label for="comment">Your review <span class="required">*</span>
                            </label>
                            <textarea style="margin:0;" wire:model="comment" class="" id="comment" name="comment" cols="30" rows="8">

                            </textarea>
                            @error('comment')
                            <span style='color:red'>{{$message}}</span>
                            @enderror
                        </p>
                        <button class="bg-color-red-button inline-block font-bold text-md py-2 px-8 mt-2 rounded-md cursor-pointer text-while" type="submit">
                            Save
                        </button>
                    </form>
    
                </div><!-- .comment-respond-->
            </div><!-- #review_form -->
        </div><!-- #review_form_wrapper -->
    </div>
    <script>
        function rating(e){
            if(e.target.className=='labelss'){
                
            }else{

            }
        }
    </script>
</div>
