 @extends('backend.layouts.master')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mange Communicate</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Contact</li>
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
                <h3>Communicate List
                  <a class="btn btn-success float-right" href="{{route('contacts.add')}}"><i class="fa fa-plus-circle"></i>Add Communicate</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>SL.</th>
                     <th>Name</th>
                     <th>Mobile_no</th>
                     <th>Email</th>
                     <th>Address</th>
                     <th>Message</th>
                     <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($allData as $key => $contact)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->mobile_no}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->address}}</td>
                    <td>{{$contact->msg}}</td>
                    <td>
                        <a title="Delete" id="delete" class="btn btn-sm btn-danger" 
                       href="{{route('contacts.communicate.delete',$contact->id)}}"><i class="fa fa-trash">
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