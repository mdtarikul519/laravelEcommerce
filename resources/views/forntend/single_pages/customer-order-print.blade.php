<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Invoice</title>
    <style>
        .mytable tr td{
            padding: 10px;
        }
    </style>
</head>
<body>
    <center>
    <table class="text-center mytable" width="900px" border="1">
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

    </center>
</body>
</html>