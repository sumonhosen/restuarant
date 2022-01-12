
    <form action="{{ route('add_cat_product') }}" method="post">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product_id }}">
        
            @foreach($categories as $category)
                <h4 class="title3" itemprop="headline" style="margin-bottom:0px">     
                    <h5 class="pagetitle" style="box-sizing: inherit; margin: 0rem; font-weight: 700; line-height: 36px; font-size: 18px; letter-spacing: normal; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; orphans: 2; text-indent: 0px; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; font-family: Roboto; text-transform: uppercase; color: rgb(255, 255, 255); text-align: center; background-color: rgb(95, 27, 27);">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                                {{ $category->option_title }}
                            </font>
                        </font>
                    </h5>
                </h4>
                <div class="row">
                    @foreach($category->category as $category_product)
                        <div class="featured-restaurant-thumb col-sm-2" style="margin: 14px; border: 1px solid #5f1b1b;">
                            <a href="#" title="" itemprop="url">
                                <img src="{{ asset($category_product->product_image) }}" alt="dish-img1-1.jpg" itemprop="image" height="90px" width="70px;">
                            </a>
                            <p style="color: black;font-size: 12px; margin: 0px;">{{ $category_product->product_option_name}}</p><br>

                            @if($category_product->type_id==1)
                                <p style="color:black;font-size: 14px;margin-top: 0px;text-align: center;margin-left: 35px;"><input type="radio" value="{{ $category_product->id }}" name="multiple_selection[]"></p>
                            @endif
                            @if($category_product->type_id==2)
                                <p style="color:black;font-size: 14px;margin-top: 0px;text-align: center;margin-left: 35px;"><input type="checkbox" value="{{ $category_product->id }}" name="multiple_selection[]"></p>
                            @endif

                            @if($category_product->type_id==3)
                            <p style="color:black;font-size: 14px;margin-top: 0px;"><input type="checkbox" name="multiple_selection[]" value="{{ $category_product->id }}">&nbsp;€{{ $category_product->price }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
       
            @endforeach
         <button class="brd-rd5 orderNowButton" data-id="4" style="height:30px;background:rgb(95, 27, 27); margin: 10px;border-radius: 0px;" href="javascript:void(0)" id="orderNowButton" title="Order Online"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;color: white;font-size: 12px;">Add to cart </font></font></button>
    </form>