@extends('layouts.frontend.app')

@section('title', 'Home')

@push('css')
    <style type="text/css">
        .modal-header .close {
                margin-top: -20px;
            }
            input[type=checkbox], input[type=radio] {
                margin: 0px;
                margin-top: -2px;
            }
    </style>
@endpush

@section('content')

        <div class="banner slider1 new-block">
            <div class="fixed-bg" style="background: url('{{ asset('public/frontend/assets/images/slider-bg1.jpg')}}')"></div>
            <div class="slider owl-carousel owl-theme">
                <div class="item">
                    <div class="slider-block slide1 new-block">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="text-block">
                                        <div class="img-block ab1" data-animation-in="bounceInDown" data-animation-out="animate-out fadeOutRight">
                                            <img src="{{ asset('public/frontend') }}/assets/images/pizza.png" alt="" class="img-responsive">
                                        </div>
                                        <h1 class="text-stl1" data-animation-in="lightSpeedIn" data-animation-out="animate-out fadeOutRight">buy get one free</h1>
                                        <div class="number-block" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutRight">
                                            <p class="text-stl2">Aliquam laoreet orci quis risus vulputate tempor Quisque aliquetmattis mattis tortor nibh cursus lorem</p>
                                            <h2 class="text-stl3">+00 123 456 789</h2>
                                            <div class="text-center">
                                                <a href="#" class="btn1 stl2">About More</a>
                                                <a href="#" class="btn1 stl1">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="img-block img2">
                                        <div class="img-holder" data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight">
                                            <img src="{{ asset('public/frontend') }}/assets/images/pz.png" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .slider-block -->
                </div>
                <div class="item">
                    <div class="slider-block slide1 new-block">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="text-block">
                                        <div class="img-block ab1" data-animation-in="bounceInDown" data-animation-out="animate-out fadeOutRight">
                                            <img src="images/pizza.png" alt="" class="img-responsive">
                                        </div>
                                        <h1 class="text-stl1" data-animation-in="lightSpeedIn" data-animation-out="animate-out fadeOutRight">buy get one free</h1>
                                        <div class="number-block" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutRight">
                                            <p class="text-stl2">Aliquam laoreet orci quis risus vulputate tempor Quisque aliquetmattis mattis tortor nibh cursus lorem</p>
                                            <h2 class="text-stl3">+00 123 456 789</h2>
                                            <div class="text-center">
                                                <a href="#" class="btn1 stl2">About More</a>
                                                <a href="#" class="btn1 stl1">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="img-block img2">
                                        <div class="img-holder" data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight">
                                            <img src="images/sldr.png" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .slider-block -->
                </div>
            </div>
        </div><!-- banner -->         
        <section class="cat-sec new-block">
            <div class="container-fluid pd0">
                @foreach($categories as $category)
                    <a href="{{ route('category.wise', [$category->id, $category->slug]) }}"  title="{{ $category->name }}">
                        <div class="cat-block">
                            <div class="block-stl1 bg1">
                                <img src="{{ url($category->image) }}" alt="Entrances" itemprop="image">
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
        <section class="special-offers-sec new-block">
            <div class="special-offer-inr-block new-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title">
                                <p class="top-h">today special</p>
                                <h3>Our Very Best Deals</h3>
                                <div class="btm-style"><span><img src="{{ asset('public/frontend') }}/assets/images/btm-style.png" alt="" class="img-responsive"></span></div>
                            </div>
                        </div>
                        <div class="col-lg-12 pd0">
                            <div class="special-offer-block ol_flr new-block">
                                <div class="ol_flr">
                                    <div class="slider-flr" id="filter_itm1">
                                        @foreach($products as $product)
                                            <div class="js-filter-chicken">
                                                <div class="block-stl2">
                                                    <div class="img-holder">
                                                        <img src="{{ asset($product->image) }}" alt="" class="img-responsive">
                                                    </div>
                                                        <h5 style="font-style: italic;font-weight:700px;color: #d2001d;margin-bottom: 0px;">{{ $product->name }}</h5> 
                                                        <p style="font-weight:bold;color: #d2001d;font-size:16px; line-height: 0px;">€{{ $product->regular_price }}</p>                                  
                                                        <a href="javascript:void(0)" class="btn1 stl2"  onclick="show_product({{$product->id }})" data-target="#show_cat_product" data-toggle="modal">Select</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="show_cat_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Food Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body " id="cat_product">

                    </div>
                </div>
            </div>
         </div>      

    <!-- -------------------------------------------------------------------------------------------------- -->

@endsection

@push('js')
    <script>

        function show_product(product_id){
            // alert(product_id);
            let url = "{{ route('category_product') }}";
                var _token = $("#_token").val();

                    $.ajax({
                        type: "GET",
                        url: url,
                        data: { product_id: product_id,_token:_token},
                        success: function (result) {
                            $("#cat_product").html(result);
                        }
                    });
            }

        $(document).ready(function () {

            $('#exampleModal').show();


            $(".addCart").on('click', function () {
                 var id = $(this).attr('data-id');
                $(this).attr('disabled',true);
                $(this).html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Processing');

                 $.ajax({
                     url:"{{ route('add.cart') }}",
                     type: 'post',
                     data : {id:id, "_token": "{{ csrf_token() }}"
                  },

                success:function (res) {
                         if (res.messege != "") {

                             $(".totalCartItems").text('('+res.totalCartItems+')');
                             $(".addCart").attr('disabled',false);
                             $(".addCart").html(' Add to Cart');

                             if (res.status == true) {
                                 iziToast.success({
                                     title: 'Success',
                                     position: 'topRight',
                                     message: res.message
                                 });
                             } else {
                                 iziToast.error({
                                     title: 'Error',
                                     position: 'topRight',
                                     message: res.message
                                 });
                             }
                         }
                     }
                 });
            });
        });


    </script>
@endpush
