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
	<<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Customer Dashbord
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
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="card">
								<div class="card-body">
                                   <div class="img-circel text-center">
									@if(Auth::user()->image != null)
									<img  class="profile-user-img img-fluid img-circle" src="/upload/user_images/{{ Auth::user()->image  }} " alt="User profile picture" style="width:130px;">
									@else
									<img class="profile-user-img img-fluid img-circle" src="/upload/no-image-found.jpg" alt="User profile picture" style="width:130px;" >
									@endif	 
								   </div>
								   <h3 class="text-center">{{$user->name}}</h3>
								   <p class="text-center">{{$user->address}}</p>
								   <table class="table table-bordered">
									   <tbody>
                                           <tr>
											   <td>Mobile number</td>
											   <td>{{$user->mobile}}</td>
										   </tr>
										   <tr>
											  <td>Email</td>
											<td>{{$user->email}}</td>
										   </tr>
										   <tr>
											  <td>Mobile number</td>
											  <td>{{$user->gender}}</td>
										   </tr>
									   </tbody>
								   </table>
								   <a class="btn btn-primary btn-block" href="{{route('customer.edit.profile')}}">Edit Profile</a>
								</div>
							</div>
                      	</div>
					</div>
				</div>
			</div>
		</div>
@endsection