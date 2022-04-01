@extends('forntend.layouts.master')
@section('content')
<!-- Banner Section -->
	<<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Customer billing Information
		</h2>
	</section>	
	<!-- About us Section -->
	<section class="about_us">
		<div class="container">
			<div class="row" style="padding: 20px 0px 20px 0px;">
				<div class="col-md-12">
                    <form  method="post" action="{{route('customer.checkout.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="col-md-6">
                                <label >Full name</label>
                                <input type="text" name="name" class="form-control">
                                
                           </div>
                            <div class="col-md-6">
                              <label >Email</label>
                               <input type="email" name="email" class="form-control">
                               <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                           </div>
                           <div class="col-md-6">
                            <label >Mobile Number</label>
                             <input type="text" name="mobile_no" class="form-control">
                             <font style="color: red">{{($errors->has('mobile_no'))?($errors->first('mobile_no')):''}}</font>
                         </div>
                         <div class="col-md-6">
                            <label >Address</label>
                             <input type="text" name="address" class="form-control">
                             <font style="color: red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                         </div>
                         <div class="col-md-4" style="padding-top:50px;">
                            <button type="submit" class="btn btn-primary">profile update</button>
                         </div>
                        </div>
                     </form>
				</div>
			</div>
		</div>
	</section>
@endsection