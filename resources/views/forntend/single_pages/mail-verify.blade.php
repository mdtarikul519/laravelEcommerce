@extends('forntend.layouts.master')
@section('content')
<style>
    #login .container #login-row #login-column #login-box {
        margin-top: 120px;
        max-width: 600px;
        margin-bottom: 40px;
        height: 320px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
        }
        #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
        }
</style>
<!-- Banner Section -->
	<<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
		 Email verifaction form
		</h2>
	</section>	
	<!-- About us Section -->
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form"  class="form" action="{{route('verify.store')}}" method="post">
                            @csrf
                            <h3 class="text-center text-info">Email verify</h3>
                            <div class="form-group">
                                <label class="text-info">Email :</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                                <font color="red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                            </div>
                            <div class="form-group">
                                <label  class="text-info">verifaction code:</label><br>
                                <input type="text" name="code" id="code" class="form-control">
                                <font color="red">{{($errors->has('code'))?($errors->first('code')):''}}</font>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection