@extends('layouts.app')

@section('content')
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
    </style>
<!-- Main content -->
<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Owner</h3>
                    </div>



                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('owners.update', $owner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Full Name</label>
                                        <input type="text" value="{{ $owner->fullname }}" class="form-control" name='fullname' id="exampleInputEmail1" placeholder="Enter fullname">
                                        @error('fullname')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email </label>
                                        <input type="email" value="{{ $owner->email }}" class="form-control" name='email' id="exampleInputEmail1" placeholder="Enter email">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
</div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Number</label>
                                            <input type="number" value="{{ $owner->number }}" class="form-control"
                                                name='number' id="exampleInputEmail1" placeholder="Enter Number">
                                            @error('number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <textarea name='address' class="form-control" required>{{$owner->address }}</textarea>
                                            
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                  
                                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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
