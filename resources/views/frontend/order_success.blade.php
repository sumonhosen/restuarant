@extends('layouts.frontend.app')

@section('title')
    Category Order Success
@endsection

@push('css')
   <style type="text/css">
     p.conTitle {
          font-size: 20px;
          font-style: italic;
          font-weight: 700;
          color: #008e74;
      }
      p {
          margin-top: 0;
          margin-bottom: 1rem;
      }
      p.order_number {
      font-size: 37px;
      font-weight: 800;
      }
.badge {
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
}
.btn-danger {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
}
a.TakeOrder {
    padding: 15px;
    /* margin-bottom: 68px; */
    border-radius: 2px;
    font-size: 38px;
    font-weight: 700;
    font-style: italic;
    cursor: pointer;
    text-decoration: none;
    color: #fff;
}

.here {
    background: #444444;
}
   </style>
@endpush

@section('content')
  <section class="main_content" style="height: 600px;">      
     <div class="container">
        <div class="row" style="margin-top:200px">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                  <div class="conform">
                    <p class="conTitle">Thank Your For Your Order</p>
                    <p class="order_number" style="color:black;">Order Number <span class="badge btn-danger">IN-{{$order_number}}</span></p> <br>
                      <h2><a href="{{ URL('/') }}" class="TakeOrder here">Main Page</a></h2>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
    </section>
@endsection
@push('js')

@endpush
