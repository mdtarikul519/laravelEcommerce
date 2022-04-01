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
	
</style>


<!-- Banner Section -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
		Customer Password Change
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
				    <h3>Password change</h3>
                    <form method="post" action="{{route('password.update')}}" id="myform" autocomplete="off">
                        @csrf
                         <div class="form_row">
                           <div class="form-group col-md-4">
                           <label for="current_password">Current Password</label>
                           <input type="password" name="current_password" id="current_password" class="form-control">
                          </div>
         
                          <div class="form-group col-md-4">
                           <label for="new_password">New Password</label>
                           <input type="password" name="new_password" id="new_password" class="form-control">
                          </div>
                          <div class="form-group col-md-4">
                             <label for="again_new_password">Again New Password</label>
                             <input type="password" name="again_new_password" class="form-control">
                          </div>
                           <div class="form-group col-md-6">
                            <input type="submit" value="Update" class="btn btn-primary">
                          </div>
         
                         </div>
                       </form>
				</div>
			</div>
		</div>
@endsection