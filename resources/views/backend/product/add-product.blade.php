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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Left col -->
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    @if (isset($editdata))
                                        Edit Product
                                    @else
                                        Add Product
                                    @endif
                                    <a class="btn btn-success float-right" href="{{ route('products.view') }}"><i
                                            class="fa fa-list"></i>Product list</a>
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form method="post"
                                    action="{{ @$editdata ? route('products.update', $editdata->id) : route('products.store') }}"
                                    id="myform" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form_row">

                                        <div class="form_group col-md-6">
                                            <label>Category</label>
                                            <Select name="category_id" class="form-control">
                                                <option value="">Select Category</option>
                                                @forelse ($categoris as $Category)
                                                    <option value="{{ $Category->id }}"
                                                        {{ @$editdata->category_id == $Category->id ? 'selected' : '' }}>
                                                        {{ $Category->name }}</option>
                                                @empty
                                                @endforelse
                                            </Select>
                                        </div>

                                        <div class="form_group col-md-6">
                                            <label>Brand</label>
                                            <Select name="brand_id" class="form-control">
                                                <option value="">Select Brand</option>
                                                @forelse ($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        {{ @$editdata->brand_id == $brand->id ? 'selected' : '' }}>
                                                        {{ $brand->name }}</option>
                                                @empty
                                                @endforelse
                                            </Select>
                                        </div>

                                        <div class="form_group col-md-6">
                                            <label>product Name</label>
                                            <input type="text" name="name" value="{{ @$editdata->name }}"
                                                class="form-control" placeholder="Product name">
                                            <font color="red">{{ $errors->has('name') ? $errors->first('name') : '' }}
                                            </font>
                                        </div>

                                        <div class="form_group col-md-6">
                                            {{ $color_array }}


                                            <label>Color</label>
                                            <select name="color_id[]" class="form-control select2" multiple>
                                                @forelse ($colors as $color)
                                                    {{-- {{ in_array($color->id, $color_array) ? 'selected' : '' }} --}}
                                                    <option value="{{ $color->id }}"
                                                        {{ $color_array->contains($color->id) ? 'selected' : '' }}>
                                                        {{ $color->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                            <font color="red">
                                                {{ $errors->has('color->id') ? $errors->first('color->id') : '' }}
                                            </font>
                                        </div>

                                        <div class="form_group col-md-6">
                                            <label>Size</label>
                                            {{$size_array}}
                                            <select name="size_id[]" class="form-control select2" multiple>
                                                @forelse ($sizes as $size)
                                                    {{-- {{ in_array($size->id, $sizes) ? 'selected' : '' }} --}}
                                                    <option value="{{ $size->id }}"
                                                        {{ $size_array->contains($size->id) ? 'selected' : '' }}>
                                                        {{ $size->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                            <font color="red">
                                                {{ $errors->has('size->id') ? $errors->first('size->id') : '' }}</font>
                                        </div>

                                        <div class="form_group col-md-12">
                                            <label>Short Description</label>
                                            <textarea name="short_desc" class="form-control">{{ @$editdata->short_desc }}</textarea>
                                            <font color="red">
                                                {{ $errors->has('short_desc') ? $errors->first('short_desc') : '' }}
                                            </font>
                                        </div>

                                        <div class="form_group col-md-12">
                                            <label>Long Description</label>
                                            <textarea name="long_desc" class="form-control" rows="4">{{ @$editdata->long_desc }}</textarea>
                                            <font color="red">
                                                {{ $errors->has('long_desc') ? $errors->first('long_desc') : '' }}</font>
                                        </div>

                                        <div class="form_group col-md-6">
                                            <label>Price</label>
                                            <input type="number" name="price" value="{{ @$editdata->price }}"
                                                class="form-control">
                                        </div>

                                        <div class="form_group col-md-6">
                                            <label>image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>

                                        <div class="form_group col-md-6">
                                            <img id="showImage"
                                                src="{{ !empty($editdata->image)? url('upload/product_images/' . $editdata->image): url('upload/No-image-found.jpg') }}"
                                                style="width:60px; height:60px;">
                                        </div>

                                        <div class="form_group col-md-6">
                                            <label>Sub image</label>
                                            <input type="file" name="sub_image[]" class="form-control" multiple>
                                        </div>

                                        <div class="form-group col-md-6" style="padding-top: 25px">
                                            <button type="submit"
                                                class=" btn btn-primary">{{ @$editdata ? 'Update' : 'Submit' }}</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myform').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                    brand_id: {
                        required: true,
                    },
                    short_desc: {
                        required: true,
                    },
                    long_desc: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                },
                messages: {

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
