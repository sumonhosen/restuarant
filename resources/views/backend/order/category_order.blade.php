@extends('layouts.backend.app')

@section('title', 'Category Order List')

@push('css')

@endpush

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="float-left">Order List ({{ $category_orders->count() }})</h3>

                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Order No.</th>
                                    <th>Date</th>
                                    <th>Order Type</th>
                                    <th>Grand Total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($category_orders as $category)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>IN-{{ $category->order_number }}</td>
                                        <td>{{ $category->created_at->format('Y-m-d') }};{{$category->created_at->format('H:i') }}</td>
                                        <td><span class="badge badge-primary">{{ $category->order_type }}</span></td>
                                        <td>€{{ $category->total_price }}</td>
                                        <td><a href="" class="btn btn-dark btn-sm">View</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@push('js')

@endpush

