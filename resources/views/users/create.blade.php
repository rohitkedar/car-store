@extends('layouts.app')

@section('content')
    <br>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .show_hide_password span {
            cursor: pointer;
        }

        .show_hide_password span i {
            color: #007bff;
        }

    </style>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" value="{{ old('name') }}" class="form-control"
                                                name='name' id="exampleInputEmail1" placeholder="Enter name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email </label>
                                            <input type="email" value="{{ old('email') }}" class="form-control"
                                                name='email' id="exampleInputEmail1" placeholder="Enter email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <div class="input-group mb-3 show_hide_password">
                                                <input type="password" value="{{ old('password') }}" name="password"
                                                    class="form-control" id="exampleInputPassword1"
                                                    placeholder="Password">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-eye-slash"
                                                            aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Confirm Password</label>
                                            <div class="input-group mb-3 show_hide_password">
                                                <input type="password" value="{{ old('password_confirmation') }}"
                                                    name="password_confirmation" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Confirm Password">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-eye-slash"
                                                            aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            @error('password_confirmation')
                                                <span class="text-danger"><?php echo str_replace('password confirmation', 'Confirm Password', $message); ?></span>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                </div>
                               
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('myjsfile')
    <script>
        
        $(document).ready(function() {
            $(".show_hide_password span").on('click', function(event) {
                event.preventDefault();
                var input_type = $(this).parent().parent().find('input').attr("type");
                if (input_type == "text") {
                    $(this).parent().parent().find('input').attr('type', 'password');
                    $(this).find('i').addClass("fa-eye-slash");
                    $(this).find('i').removeClass("fa-eye");
                } else if (input_type == "password") {
                    $(this).parent().parent().find('input').attr('type', 'text');
                    $(this).find('i').removeClass("fa-eye-slash");
                    $(this).find('i').addClass("fa-eye");
                }
            });
        });
    </script>
@stop
