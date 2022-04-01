@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Mange Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
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
                                    <a class="btn btn-success float-right" href="{{ route('products.add') }}"><i
                                            class="fa fa-plus-circle"></i>Add Product</a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="8%">SL.</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Product Name</th>
                                            <th>color</th>
                                            <th>size</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th width="14%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $Product)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $Product['category']['name'] }}</td>
                                                <td>{{ $Product['brand']['name'] }}</td>
                                                <td>{{ $Product->name }}</td>
                                                <td>
                                                    @forelse ($Product->colors as $color)
                                                        <div class="d-flex">
                                                            {{ $color->name }}
                                                        </div>
                                                    @empty
                                                    @endforelse

                                                </td>
                                                <td>
                                                    @forelse ($Product->sizes as $size)
                                                        <div class="d-flex">
                                                            {{ $size->name }}
                                                        </div>
                                                    @empty
                                                    @endforelse

                                                </td>
                                                <td>{{ $Product->price }}</td>
                                                <td>
                                                    <img src="{{ !empty($Product->image) ? url('upload/product_images/' . $Product->image) : url('upload/No-image-found.jpg') }}"
                                                        style="width:60px; height:60px;">

                                                </td>

                                                <td>
                                                    <a title="Edit" class="btn btn-sm btn-primary"
                                                        href="{{ route('products.edit', $Product->id) }}"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a title="Edit" class="btn btn-sm btn-success"
                                                        href="{{ route('products.details', $Product->id) }}"><i
                                                            class="fa fa-eye"></i></a>
                                                    <a title="Delete" id="delete" class="btn btn-sm btn-danger"
                                                        href="{{ route('products.delete', $Product->id) }}"><i
                                                            class="fa fa-trash">
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
