@extends('layouts.backend.app')

@section('title', 'Add Product Option')

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
                            <h5 class="float-left"> Product Options Information</h5>
                            <p class="float-right "><a class="btn btn-dark btn-sm" data-toggle="modal" data-target="#optionModal" href="javascript:void(0)"><i class="fa fa-plus-square"></i> Add</a></p>
                        </div>

                        <!-- Modal -->
                            <div class="modal fade" id="optionModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Product Options</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form id="quickForm" action="{{ route('admin.add.option') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Option Title</label>
                                                <input type="text" class="form-control" id="option_title" name="option_title" placeholder="Enter option title">
                                                <span style="color:red">{{ $errors->has('option_title') ? $errors->first('option_title') : '' }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Option Type</label>
                                                <select class="form-control" id="type_id" name="type_id">
                                                    <option value="" selected="" disabled>Select one</option>
                                                    @foreach($option_types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->option_type }}</option>
                                                    @endforeach
                                                </select>
                                                <span style="color:red">{{ $errors->has('type_id') ? $errors->first('type_id') : '' }}</span>
                                            </div>
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
                                    <th>Option Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($product_options as $option)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $option->option_title }}</td>
                                            <td>{{ $option->option_type->option_type }}</td>
                                            <td>
                                                <a href="{{ route('admin.view.show_single_product_option',$option->id) }}" class="btn btn-dark btn-sm">Edit</a>&nbsp;
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
            $('#quickForm').validate({
                rules: {
                    option_title: {
                        required: true,
                        maxlength:30,
                    },
                    type_id: {
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
    </script>
@endpush

