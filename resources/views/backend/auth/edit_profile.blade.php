@extends('layouts.backend.app')

@section('title', 'Edit Profile')

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
                            <h3 class="float-left">Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <form id="quickForm" action="{{ route('admin.update.profile', $admin->id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" value="{{ $admin->name }}" class="form-control" placeholder="Name">
                                        <span style="color:red">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="email">E-Mail</label>
                                        <input type="email" name="email" id="email" value="{{ $admin->email }}" class="form-control" placeholder="E-Mail">
                                        <span style="color:red">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" name="mobile" id="mobile" value="{{ $admin->mobile }}" class="form-control" placeholder="Mobile Number">
                                        <span style="color:red">{{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" value="{{ $admin->address }}" class="form-control" placeholder="Address">
                                        <span style="color:red">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="gender">gender</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option {{ $admin->gender == 'Male' ? 'selected' : '' }} value="Male">Male</option>
                                            <option {{ $admin->gender == 'Female' ? 'selected' : '' }} value="Female">Female</option>
                                        </select>
                                        <span style="color:red">{{ $errors->has('user_type') ? 'The user role field is required.' : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                        <span style="color:red">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <img id="showImage" src="{{ $admin->image ? URL($admin->image) : asset('public/backend/upload/no_image.png') }}" height="100" width="110">
                                    </div>

                                    <div class="form-group col-md-10" style="margin-top: 30px">
                                        <button type="submit"  class="btn btn-primary">Update Profile</button>
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

@endsection

@push('js')
    <script>
        $(function () {
            $('#quickForm').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength:30,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    mobile: {
                        required: true,
                        number: true,
                    },

                    address: {
                        required: true,
                        minlength: 4,
                    },

                    address:{
                        required: true
                    }

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

