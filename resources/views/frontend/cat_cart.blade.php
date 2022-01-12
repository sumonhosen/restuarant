@extends('layouts.frontend.app')

@section('title')
    Categroy Product Cart
@endsection

@push('css')
    <style>
        li{
            list-style-type: none;
        }
        .quantity .quantity-button i:before {
            font-size: 0px;
        }       
        .mr-auto, .mx-auto {
            margin-right: auto!important;
        }
        .p-2 {
            padding: .5rem!important;
        }     
        button.cutonOrderBtn {
          padding: 8px 25px;
          background: #008e74;
          border: 0;
          border-radius: 4px;
          color: #fff;
          font-weight: 600;
          cursor: pointer;
      }
    </style>
@endpush

@section('content')

<form action="{{ route('place.cat_product_order') }}" method="post">
  @csrf
    <section>
        <div class="block gray-bg top-padd30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <h3 itemprop="headline" style="text-align: center;margin-top: 45px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;color: #6f6f6f;font-style: italic;">Shopping Cart</font></font></h3>
                        <div class="sec-box">
                            <div class="sec-wrapper">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="right wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                                        <div class="order-inner">
                                            <div class="order-list-wrapper">
                                                <div class="table-responsive">
                                                     <table class="table table-bordered">
                                                        <thead class="text-center">
                                                           <tr>
                                                              <th>Product</th>
                                                              <th>Quantity</th>
                                                              <th class="text-center">Price</th>
                                                              <th class="text-center">action</th>
                                                           </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                                          @php
                                                              $pro_price=[]; 
                                                              $cat_price=[];
                                                              $cat_id =[];
                                                          @endphp
                                                            @foreach($all_vals as $all_val)
                                                            <input type="hidden" name="product_id" value="{{ $all_val->id }}">
                                                            <tr>
                                                                <td>
                                                                    <div class="detailsImage">
                                                                        <img src="{{ $all_val->options->product_image}}" data-src="img/location_1.jpg" class="img-fluid lazy error" alt="" data-was-processed="true">
                                                                    </div>
                                                                    <span class="proName" style="font-size:12px">{{ $all_val->name }}</span>
                                                                    <hr>
                                                                    <ul class="proList text-center"> 
                                                                        <li>
                                                                            {{ \App\Model\CategoryProduct::cat_name(explode(',',$all_val->options->multiple)) }}
                                                                        </li> 
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <div class="qty">
                                                                        <div class="quantity">
                                                                            <button class="quantity__minus" wire:click="decreament(41)" disabled="">
                                                                                <span>-</span>
                                                                            </button>
                                                                            <input name="quantity" type="text" class="quantity__input" value="1">
                                                                            <button class="quantity__plus" wire:click="increament(41)"><span>+</span></button>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                  €{{$all_val->price}} + 
                                                                  €{{ \App\Model\CategoryProduct::cat_price(explode(',',$all_val->options->multiple)) }}
                                                                  @php
                                                              
                                                                      $pro_price[] = $all_val->price;
                                                                      $cat_id[] = $all_val->options->multiple;
                                                                      $cat_price[] = \App\Model\CategoryProduct::cat_price(explode(',',$all_val->options->multiple));
                                                                  @endphp
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-danger removeBtn" onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('destroy.cart.item', $all_val->rowId) }}" ><i class="fa fa-trash"></i> </a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @php
                                                            $total = 0;
                                                              $cat_price = array_sum($cat_price);
                                                              $product_price = array_sum($pro_price);
                                                              $total = $product_price+$cat_price;
                                                              $cate_id = implode(',',$cat_id);
                                                             @endphp
                                                            <input type="hidden" name="cat_product_id" value="{{ $cate_id }}">
                                                             <input type="hidden" name="total_price" value="{{ $total }}">
                                                             <input type="hidden" name="order_number" value="{{ $order_number }}">
                                                             <input type="hidden" name="order_type" value="take_away">
                                                        </tbody>
                                                    </table>
                                                </div>
                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-md-4"></div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                     <div class="card">
                        <div class="card-header text-center" style="font-weight: 600;font-size: 20px">Cart Total: € {{ $total }}</div>
                        <div class="card-body">
                            <div class="cart_total">
                                <div class="d-flex bd-highlight mb-3" style="margin-bottom: 1rem!important;text-align: center!important;">
                                    <div class="mr-auto p-2 bd-highlight"><strong>Order Type </strong></div>
                                    <div class="p-2 bd-highlight"></div>
                                </div>
                                         
                               <div class="d-flex bd-highlight mb-3" style="margin-bottom: 1rem!important;text-align: center!important;">
                                 <div class="mr-auto p-2 bd-highlight"><strong>Order Number</strong></div>
                                 <div class="p-2 bd-highlight"> <span class="badge badge-info">IN-{{$order_number}}</span></div>
                                 <input type="hidden" wire:model="invoiceNum" value="IN-611">
                              </div>
                              
                              <div class="d-flex bd-highlight mb-3" style="margin-bottom: 1rem!important;text-align: center!important;">
                                 <div class="mr-auto p-2 bd-highlight"><strong>Total Amount</strong></div>
                                 <div class="p-2 bd-highlight">€{{ $total }}</div>
                              </div>

                                <div class="d-flex bd-highlight mb-3 text-center">
                                 <button wire:click="placeOrder" class="cutonOrderBtn">Order Complate</button>
                              </div>
                                               
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
    </section>
  </form>


@endsection

@push('js')

@endpush
