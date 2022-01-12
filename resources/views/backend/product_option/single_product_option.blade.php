@extends('layouts.backend.app')

@section('title', 'Add Product Option')

@push('css')

@endpush

@section('content')
<section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="float-left">Product Option Edit </h6>
                        </div>
                        <div class="card-body">
                            <form id="editForm" action="{{ route('admin.edit.edit_single_product_option', $single_option_data->id) }}" method="POST">
                            	@csrf
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="text" name="option_title" id="option_title" value="{{ $single_option_data->option_title}}" class="form-control" placeholder="Name">
                                        <span style="color:red">{{ $errors->has('option_title') ? $errors->first('option_title') : '' }}</span>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="float-left"> Product Options Information</h6>
                            <p class="float-right "><a class="btn btn-dark btn-sm" data-toggle="modal" data-target="#optionModal" href="javascript:void(0)"><i class="fa fa-plus-square"></i> Add</a></p>
                        </div>

                        <!-- Modal -->
                            <div class="modal fade" id="optionModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form id="quickForm" action="{{ route('admin.add.category_product') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Option Name</label>
                                                <input type="text" class="form-control" id="product_option_name" name="product_option_name" placeholder="Enter Product option Name">
                                                <span style="color:red">{{ $errors->has('product_option_name') ? $errors->first('product_option_name') : '' }}</span>
                                            </div>
                                            @if($single_option_data->type_id==3)
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Price</label>
                                                <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter  Price" id="product_price">
                                                <span style="color:red">{{ $errors->has('product_price') ? $errors->first('product_option_name') : '' }}</span>
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Image</label>
                                                <input type="file" class="form-control" name="product_image" id="product_image">
                                                <span style="color:red">{{ $errors->has('product_image') ? $errors->first('product_image') : '' }}</span>
                                            </div>
                                            <input type="hidden" name="option_id" value="{{ $single_option_data->id}}">
                                            <input type="hidden" name="type_id" value="{{ $single_option_data->type_id}}">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Name</th>
                                    <th>Option Name</th>
                                    <th>Option Type</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($category_products as $key => $category_product)	
                                  <tr>
                                  	<td>{{ $key+1 }}</td>
                                  	<td>{{ $category_product->product_option_name}}</td>
                                  	<td>{{ $category_product->product_option->option_title}}</td>
                                    <td>{{ $category_product->option_type->option_type}}</td>
                                  	<td><img height="30px" width="150px" src="{{ asset($category_product->product_image) }}"></td>
                                    <td>{{ $category_product->price }}</td>
                                  	<td>  
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
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
    <script>

        $(function () {
            $('#editForm').validate({
                rules: {
                    option_title: {
                        required: true,
                        maxlength:30,
                    },
                },
                messages: {

                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

           $(function () {
            $('#quickForm').validate({
                rules: {
                    product_option_name: {
                        required: true,
                        maxlength:30,
                    },
                    product_price: {
                        required: true,
                        maxlength:30,
                    },
                    product_image: {
                        required: true,
                        maxlength:100,
                    },

                },
                messages: {

                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endpush
