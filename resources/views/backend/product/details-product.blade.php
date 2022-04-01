@extends('backend.layouts.master')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mange Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Details</li>
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
                <h3>Product List
                  <a class="btn btn-success float-right" href="{{route('products.view')}}"><i class="fa fa-list"></i>product list</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
            <table class="table table-bordered table-hover table-sm">
                <tbody>
                    <tr>
                        <td width="50%">Catagory</td>
                        <td width="50%">{{$Product['category']['name']}}</td>
                    </tr>
                    <tr>
                        <td width="50%">Brand</td>
                        <td width="50%">{{$Product['brand']['name']}}</td>
                    </tr>
                    <tr>
                        <td width="50%">Product Name</td>
                        <td width="50%">{{$Product->name}}</td>
                    </tr>
                    <tr>
                        <td width="50%">Price</td>
                        <td width="50%">{{$Product->price}}</td>
                    </tr>
                    <tr>
                        <td width="50%">Short Description</td>
                        <td width="50%">{{$Product->short_desc}}</td>
                    </tr>
                    <tr>
                        <td width="50%">Long Description</td>
                        <td width="50%">{{$Product->long_desc}}</td>
                    </tr>
                    <tr>
                        <td width="50%">Image</td>
                        <td width="50%"> <img src="{{(!empty($Product->image))?url('upload/product_images/'.$Product->image):url('upload/No-image-found.jpg')}}"
                            style="width:60px; height:60px;">
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">Colors</td>
                        <td width="50%">
                            @php
                              $colors = App\Models\Model\ProductColor::where('product_id', $Product->id)->get();
                            @endphp
                            @foreach ($colors as $c)
                            {{$c['color']['name']}},
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">Sizes</td>
                        <td width="50%">
                            @php
                              $sizes = App\Models\Model\ProductSize::where('product_id', $Product->id)->get();
                            @endphp
                            @foreach ($sizes as $s)
                            {{$s['size']['name']}},
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">Sub Images</td>
                        <td width="50%">
                            @php
                              $subimage = App\Models\Model\ProductSubImage::where('product_id', $Product->id)->get();
                            @endphp
                            @foreach ($subimage as $img)
                            <img src="{{(url('upload/product_images/product_sub_images/'.$img->sub_image))}}"
                            style="width:60px; height:60px;">
                            @endforeach
                        </td>
                    </tr>
                
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