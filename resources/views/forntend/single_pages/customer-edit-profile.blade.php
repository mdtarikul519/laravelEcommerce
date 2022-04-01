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
			Customer Edit Profile
		</h2>
	</section>	

		<div class="container">
			<div class="row" style="padding: 15px 0px 15px 0px;">
				<div class="col-md-2">
					<ul class="proof">
						<li><a href="{{route('dashbord')}}">My Profile</a></li>
						<li><a href="{{route('password.change')}}">Password Change</a></li>
						<li><a href="">My Orders</a></li>
					</ul>
				</div>
				<div class="col-md-10">
                    <h3>Edit Profile</h3>
				     <form  method="post" action="{{route('customer.update.profile')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="col-md-4">
                                <label >Full name</label>
                                <input type="text" name="name" value="{{$editdata->name}}" class="form-control">
                                <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                           </div>
                            <div class="col-md-4">
                              <label >Email</label>
                               <input type="email" name="email" value="{{$editdata->email}}" class="form-control">
                               <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                           </div>
                           <div class="col-md-4">
                            <label >Mobile Number</label>
                             <input type="text" name="mobile" value="{{$editdata->mobile}}" class="form-control">
                             <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                         </div>
                         <div class="col-md-4">
                            <label >Address</label>
                             <input type="text" name="address" value="{{$editdata->address}}" class="form-control">
                             <font style="color: red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                         </div>
                         <div class="col-md-4">
                            <label >Gender</label>
                             <select name="gender"class="form-control">
                                 <option value="">Select Gender</option>
                                 <option value="Male" {{($editdata->gender=="Male")?"selected":""}}>Male</option>
                                 <option value="Female" {{($editdata->gender=="Female")?"selected":""}}>Female</option>
                             </select>
                         </div>
                         <div class="col-md-4">
                            <label >Image</label>
                             <input type="file" name="image" id="image" class="form-control">
                         </div>
                         <div class="col-md-4">
                            @if($editdata->image != null)
                            <img class="profile-user-img img-fluid img-circle" id="showImage" src="/upload/user_images/{{ $editdata->image  }} " alt="User profile picture" style="width:150px; height:160px; border:1px solid #0000;">
                            @else
                            <img class="profile-user-img img-fluid img-circle" id="showImage" src="/upload/no-image-found.jpg" alt="User profile picture" style="width:150px;  height:160px; border:1px solid #000;">
                            @endif
                         </div>
                         <div class="col-md-4" style="padding-top:50px;">
                            <button type="submit" class="btn btn-primary">profile update</button>
                         </div>
                        </div>
                     </form>
				</div>
			</div>
		</div>
@endsection