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
                            <h3 class="card-title">Assign Mechanic</h3>
                        </div>
                        <br><Br>
                        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
            </div> @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('/cars/storeMechanic')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Categorie</label>
                                        <select class="form-control" id="categorie_id" name="categorie_id"  >
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
                                        <label>Car</label>
                                        <select class="form-control" id='car_id' name="car_id"  >
                                        <option value="">Select Car</option>
                                        
                                        </select>
                                        @error('car_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mechanic</label>
                                        <select class="form-control" name="mechanic_id"  >
                                        <option value="">Select Mechanic</option>
                                        @foreach($mechanic as $item)
                                        <option value="{{ $item->id }}"  {{ old('mechanic_id') == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                        @endforeach
                                        </select>
                                        @error('mechanic_id')
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
@section('myjsfile')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#categorie_id").change(function(e){
    $.ajax({
               type:'POST',
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
               url : "{{ url('/cars/getcars') }}",              
               data:{'categorie_id' : $(this).val(),"_token": "{{ csrf_token() }}"},
               success:function(data) {
                
                //console.log(data.car);
                var mySelect = $('#car_id');
                var car = data.car;
                $('#car_id').empty();
                $("#car_id").append('<option>--Select Car--</option>');
                car.forEach(element => {
                    mySelect.append(
        $('<option></option>').val(element.id).html(element.number)
    );
});

               }
            });

 })
});
   
</script>



