@extends('forntend.layouts.master')
@section('content')

<style type="text/css">
	.proof li{
		background: #1781BF;
		padding: 7px;
		margin: 3px;
		border-radius: 15px;
	}
	.proof li a {
        color: aliceblue ;
		padding-left: 15px; 
	}
    .mytable tr td{
      padding: 10px; 
    }
	
</style>


<!-- Banner Section -->
	<<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Ordder Details
		</h2>
	</section>	

		<div class="container">
			<div class="row" style="padding: 15px 0px 15px 0px;">
				<div class="col-md-2">
					<ul class="proof">
						<li><a href="{{route('dashbord')}}">My Profile</a></li>
						<li><a href="{{route('password.change')}}">Password Change</a></li>
						<li><a href="{{route('customer.order.list')}}">My Orders</a></li>
					</ul>
				</div>
				<div class="col-md-10">
                     <table class="text-center mytable" width="100%" border="1">
                         <tr>
                             <td width='30%'>
                                <img src="{{url('upload/logo_images/'.$logo->image)}}" alt="IMG-LOGO">
                             </td>
                             <td width='40%'><h3><strong>Furnis Furnicer</strong></h3>
                                {{$contact->phon_no}}&nbsp;&nbsp;&nbsp;<br>
								{{$contact->email}} <br>
                                {{$contact->address}}
                            </td>
                             <td width='30%'>
                              <strong>{{$order->order_no}}</strong>
                             </td>
                         </tr>
                         <tr>
                             <td class="text-alin">Billing Info:</td>
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
				</div>
			</div>
		</div>
@endsection