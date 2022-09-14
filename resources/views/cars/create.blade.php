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
                            <h3 class="card-title">Add Car</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Categorie</label>
                                        <select class="form-control" name="categorie_id"  >
                                        <option value="">Select Categorie</option>
                                        @foreach($categories as $item)
                                        <option value="{{ $item->id }}" {{ old('categorie_id') == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                        @endforeach
                                        </select>
                                        @error('categorie_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Owner</label>
                                        <select class="form-control" name="owner_id"  >
                                        <option value="">Select Owner</option>
                                        @foreach($owner as $item)
                                        <option value="{{ $item->id }}"  {{ old('owner_id') == $item->id ? 'selected' : ''}}>{{ $item->fullname }}</option>
                                        @endforeach
                                        </select>
                                        @error('owner_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Number</label>
                                            <input type="text" value="{{ old('number') }}" class="form-control"
                                                name='number' id="exampleInputEmail1" placeholder="Enter  number">
                                            @error('number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                   
    </div>
    <div class="row">
    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Model</label>
                                            <input type="text" value="{{ old('model') }}" class="form-control"
                                                name='model' id="exampleInputEmail1" placeholder="Enter  Model">
                                            @error('model')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Color</label>
                                            <input type="text" value="{{ old('color') }}" class="form-control"
                                                name='color' id="exampleInputEmail1" placeholder="Enter  Color">
                                            @error('color')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Engine Type</label>
                                            <input type="text" value="{{ old('engine_type') }}" class="form-control"
                                                name='engine_type' id="exampleInputEmail1" placeholder="Enter  Engine Type">
                                            @error('engine_type')
                                                <span class="text-danger">{{ $message }}</span>
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




