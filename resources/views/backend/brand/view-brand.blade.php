@extends('backend.layouts.master')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mange Brand</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Brand</li>
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
                <h3>Brand List
                  <a class="btn btn-success float-right" href="{{route('brands.add')}}"><i class="fa fa-plus-circle"></i>Add Brand</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="8%">SL.</th>
                     <th>Brand</th>
                     <th width="12%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($allData as $key => $brand)
                  @php
                  $count_brand= App\Models\Model\Product::where('brand_id', $brand->id)->count();
                 @endphp
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{$brand->name}}</td>
                     <td>
                      <a title="Edit" class="btn btn-sm btn-primary" 
                      href="{{route('brands.edit',$brand->id)}}"><i class="fa fa-edit"></i></a>

                      @if ($count_brand<1)
                      <a title="Delete" id="delete" class="btn btn-sm btn-danger" 
                      href="{{route('brands.delete',$brand->id)}}"><i class="fa fa-trash">
                      </i></a>
                      @endif
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