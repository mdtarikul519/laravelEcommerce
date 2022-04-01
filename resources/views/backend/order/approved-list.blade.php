@extends('backend.layouts.master')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mange Approved List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Approved</li>
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
                <h3>Approved order List
                  
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Order No</th>
                        <th>Total Amount</th>
                        <th>customer Payment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                    @foreach ($orders as $key => $order)
                    <tr class="{{$order->id}}">
                        <td>{{$key+1}}</td>
                        <td> #{{$order->order_no}}</td>
                        <td>{{$order->order_total}}</td>
                        <td>{{$order['payment']['payment_method']}}
                            @if($order['payment']['payment_method'] == 'Bkash')
                            (Tranaction no is:{{$order['payment']['transaction_no']}})
                            @endif
                        </td>
                        <td>
                            @if ($order->status=='0')
                                <span style="background: #DD4F42; padding:5px; color:#fff">Unapprouved</span>
                                @elseif($order->status=='1')
                                <span  style="background: #1BA160; padding:5px; color:#fff">Approuved</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('orders.details.list',$order->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye">Details</i></a>
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