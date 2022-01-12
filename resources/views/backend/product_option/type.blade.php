@extends('layouts.backend.app')

@section('title', 'Add Option type')

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
                            <h5 class="float-left">Options Type Information</h5>
                            <p class="float-right "><a class="btn btn-dark btn-sm" data-toggle="modal" data-target="#optionTypeModal" href="javascript:void(0)"><i class="fa fa-plus-square"></i> Add</a></p>
                        </div>

                        <!-- Modal -->
                            <div class="modal fade" id="optionTypeModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Option Type</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form id="quickForm" action="{{ route('admin.add.type') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Option type</label>
                                                <input type="text" class="form-control" id="option_type" name="option_type" placeholder="Enter option type">
                                                <span style="color:red">{{ $errors->has('option_type') ? $errors->first('option_type') : '' }}</span>

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
                                    <th>Option Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($option_types as $option)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $option->option_type }}</td>
                                            <td>
                                                <a href="" class="btn btn-dark btn-sm">Edit</a>&nbsp;
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
                    option_type: {
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

