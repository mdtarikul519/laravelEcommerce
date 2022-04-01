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
                <h3>
                    @if(isset($editdata))
                      Edit Brand
                    @else
                    Add Brand
                    @endif
                    
                 <a class="btn btn-success float-right" href="{{route('brands.view')}}"><i class="fa fa-list"></i>Brand list</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
            <form method="post" action="{{(@$editdata)?route('brands.update',$editdata->id):route('brands.store')}}" id="myform" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form_row">
                        <div class="form_group col-md-8">
                        <label>Brand</label>
                        <input type="text" name="name" value="{{@$editdata->name}}" class="form-control" placeholder="Brand name">
                        <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                       </div>
                
                    <div class="form-group col-md-6" style="padding-top: 25px">
                       <button type="submit" class=" btn btn-primary">{{(@$editdata)?"Update":"Submit"}}</button>
                    </div>

                </div>
              </form>
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
  <script type="text/javascript">
   $(document).ready(function () {
  $('#myform').validate({
    rules:{
      name: {
        required: true,
      },
    },
    messages: {
    
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

  @endsection