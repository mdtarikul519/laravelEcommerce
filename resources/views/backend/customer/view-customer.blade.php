@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mange Customer</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Customer</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-md-12">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3>Customer List
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>SL.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile_no</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                {{-- @foreach($users as $key => $user) --}}
                
                @foreach($allData as $key => $customer)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$customer->name}}</td>
                  <td>{{$customer->email}}</td>
                  <td>{{$customer->mobile}}</td>
                  <td>
                    <a title="Delete" id="delete" class="btn btn-sm btn-danger" 
                    href="{{route('customers.delete',$customer->id)}}"><i class="fa fa-trash">
                    </i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
            </div><!-- /.card-body -->
          </div>

          <!-- /.card -->
        </section>
       </div>
   </div>
      </section> 
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection