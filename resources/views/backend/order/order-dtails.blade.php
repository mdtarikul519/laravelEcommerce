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
                <h3>Order details Info
                    <a class="btn btn-success float-right" href="{{route('orders.appdoved.list')}}"><i class="fa fa-list"></i>Order approved list</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="text-center mytable" width="100%" border="1">
                    
                    <tr>
                        <td class="text-alin"><strong>Billing Info:</strong></td>
                        <td colspan="2" style="text-align: left"><strong>Name:</strong>{{$order['shipping']['name']}}&nbsp;&nbsp;&nbsp;
                           <strong>Email:</strong>{{$order['shipping']['email']}} <br>
                           <strong>Mobile No:</strong>{{$order['shipping']['mobile_no']}}&nbsp;&nbsp;&nbsp;
                           <strong>Address:</strong>{{$order['shipping']['address']}} <br>
                           <strong>Payment:</strong>
                                {{$order['payment']['payment_method']}}
                                @if($order['payment']['payment_method'] == 'Bkash')
                                (Tranaction no is:{{$order['payment']['transaction_no']}})
                                @endif
                       </td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Order Details</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Product name $ image</strong></td>
                        <td><strong>Product color $ size</strong></td>
                        <td><strong>Quantity $ Price</strong></td>
                    </tr>
                    @foreach ($order['order_details'] as $details)
                     <tr>
                        <td>
                           <img src="{{url('upload/product_images/'.$details['product']['image'])}}"
                           style="width:60px; height:60px;">&nbsp;
                           {{$details['product']['name']}}
                        </td>
                        <td>
                           {{$details['color']['name']}} & {{$details['size']['name']}} 
                        </td>
                        <td>
                            @php
                                $sub_total= $details->quantity *$details['product']['price']
                            @endphp
                           {{$details->quantity}} x {{$details['product']['price']}} = {{$sub_total}}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" style="text-align: right"><strong> Grand total</strong></td>
                        <td><strong>{{$order->order_total}}</strong></td>
                    </tr>
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