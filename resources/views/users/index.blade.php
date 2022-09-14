@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content pt-3">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div lass="float-left">
              <h3 class="card-title">Manage Users</h3>
            </div>
            <div class="float-right">
              <a class="btn btn-success btn-sm" href="{{ route('users.create') }}"> Add User </a>
            </div>
          </div>
          <!-- /.card-header -->
          <?php $i = 0; $i++; ?>
          <div class="card-body">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
            </div>

            @endif
            <table id="example2" class="table table-bordered table-hover">
              <thead class="thead-light">
                <tr>
                  <th>Sr. No.</th>
                  <th>Name</th>
                  <th>Email</th> 
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $key => $data)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>                  
                  <td><a class="btn btn-primary btn-xs" href="{{ route('users.edit',$data->id) }}"><i class="far fa-edit"></i> Edit </a></td>
                  
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>

  </div><!-- /.container-fluid -->
</section>
<style>
  .w-5 {
    display: none;
  }
</style>
<!-- /.content -->
@endsection
@section('myjsfile')
<script>
 $(document).ready( function () {
    $('#example2').DataTable();
} );
</script>
@stop