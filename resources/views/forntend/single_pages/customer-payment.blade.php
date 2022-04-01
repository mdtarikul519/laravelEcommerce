@extends('forntend.layouts.master')
@section('content')
<style type="text/css">
   .sss{
       float: left;
   }
   .s888{
       height:40px;
       border: 1px solid #e6e6e6;
   }
</style>
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Payment Method
		</h2>
	</section>	

<!-- Shoping Cart -->
<div class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart">
                        <tr class="table_head">
                            <th class="column-1">Image</th>
                            <th class="column-3">Name</th>
                            <th class="column-2">Size</th>
                            <th class="column-2">Color</th>
                            <th class="column-3">Price</th>
                            <th class="column-4">Quantity</th>
                            <th class="column-5">Total</th>
                            <th class="column-5">Action</th>
                        </tr>
                        @php
                        $conteans = Cart::content();
                        $total = 0;
                      @endphp

                     @foreach ($conteans as $content)
                        <tr class="table_row">
                            <td class="column-1">
                                <div class="how-itemcart1">
                                    <img src="{{asset('upload\product_images/'.$content->options->image)}}" alt="IMG">
                                </div>
                            </td>
                            <td class="column-2">{{$content->name}}</td>
                            <td class="column-2">{{$content->options->size_name}}</td>
                            <td class="column-2">{{$content->options->color_name}}</td>
                            <td class="column-3">{{$content->price}} Tk</td>
                            <td class="column-4">
                             <form method="POST" action="{{route('update.cart')}}"> 
                                @csrf  
                               <div>
                                   <input class="mtext-104 cl3 txt-center num-product form-control sss" 
                                    id="qty" type="number" name="qty" value="{{$content->qty}}">
                                    <input type="hidden" name="rowId" value="{{$content->rowId}}"> 

                                    <input type="submit" value="Update" class="flex-c-m stext-101 cl2 bg8 s888 hov-btn3 p-lr-15 trans-04 pointer">
                                </div>
                             </form>
                            </td>
                            <td class="column-5">{{$content->subtotal}}</td>
                            <td class="column-5">
                                <a class="btn btn-danger" href="{{route('delete.cart',$content->rowId)}}"><i class="fb fa-times"></i></a>
                            </td>
                        </tr>
                             @php
                                 $total += $content->subtotal;
                             @endphp
                        @endforeach
                        <tr>
                            <td colspan="7" style="text-align: right; padding-right:10px;"><strong>Grand total :</strong></td> <br>
                            <td colspan="2"><strong> {{$total}}Tk</strong></td>
                        </tr>  
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
           <div class="col-md-4">
                 <h3>Select Payment Method</h3>
           </div>
           <div class="col-md-4">
         @if(Session::get('message'))
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{Session::get('message')}}</strong><br/>
            </div>
           @endif
              <form method="post" action="{{route('customer.payment.store')}}">
                  @csrf
                  @foreach ($conteans as $content)
                  <input type="hidden" name="product_id" value="$content->id">
                  @endforeach
                  <input type="hidden" name="order_total" value="{{$total}}">
                <select name="payment_method" id="payment_method" class="form-control">
                    <option value="">select payment type</option>
                    <option value="Hand Cash">Hand Cash</option>
                    <option value="Bkash">Bkash</option>
                </select>
                <font style="color: red">{{($errors->has('payment_method'))?($errors->first('payment_method')):''}}</font>
                <div class="show_field" style="display:none;">
                     <span>Bkash NO is:01721251533</span>
                     <input type="text" name="transaction_no"  class="form-control" 
                      placeholder="Write transaction no">
                   </div>
                   <button type="submit"  class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Submit</button>
              </form>
           </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on('change','#payment_method',function(){
         var payment_method = $(this).val();
         if( payment_method =='Bkash'){
         $('.show_field').show();
        }else{
         $('.show_field').hide(); 
        }
    });
  </script>

@endsection