<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Logo;
use App\Models\Model\Slider;
use App\Models\Model\Contact;
use App\Models\Model\About;
use App\Models\Model\Communicate;
use App\Models\Model\Product;
use App\Models\Model\ProductColor;
use App\Models\Model\ProductSize;
use App\Models\Model\ProductSubImage;
use App\Models\Model\Size;
use App\Models\Model\Color;
use Cart;
use App\Models\User;
use DB;
use Mail;
use App\Models\Model\Shipping;
use App\Models\Model\Payment;
use App\Models\Model\OrderDetails;
use App\Models\Model\Order;
use Auth;
use Session;

class CekoutController extends Controller
{
  public function cekoutlogin(){
     
    $data['logo'] = Logo::first();
    $data['contact'] = Contact::first();
    return view('forntend.single_pages.customer-login',$data);
  }

  public function cekoutsignup(){
     
    $data['logo'] = Logo::first();
    $data['contact'] = Contact::first();
    return view('forntend.single_pages.customer-signup',$data);
  }

  public function signupStore(Request $request){
    DB::transaction(function() use ($request){
      $this->validate($request, [
      'name' => 'required',
      'email' => 'required|unique:users,email',
      'mobile'=>['required','unique:users,mobile','
           regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
      'password'=>'min:6|required_with:confirm_password|same:confirm_password','
      confirm_password'=>'min:6'
      ]);
    $code = rand(0000,9999);  
    $user = new User();
    $user->name     = $request->name;
    $user->email    = $request->email;
    $user->mobile   =  $request->mobile;
    $user->password = bcrypt( $request->password);
    $user->code = $code;
    $user->status = '0';
    $user->usertype = 'customer';

    $user->save();

    $data = array(
          'email' => $request->email,
          'code'  => $code,
       );
     Mail::send('forntend.emails.verify-mail',$data, function($message) use($data){
          $message->from('tarikulmd519@gmail.com','popularsoft Bd');
          $message->to($data['email']);
          $message->subject('please verify your email');
     });
    });
    return redirect()->route('mail.verify')->with('success','Your have successfully signup,plase verify your email');
  
  }
  public function emailVerify(){
     
    $data['logo'] = Logo::first();
    $data['contact'] = Contact::first();
    return view('forntend.single_pages.mail-verify',$data);
  }
  public function verifyStore(Request $request){
      $this->validate($request,[
      'code' => 'required',
      'email' => 'required',
    ]);
    $cekdata = User::where('email',$request->email)->where('code',$request->code)->first();
    if ($cekdata) {
      $cekdata->status ='1';
      $cekdata->save();
      return redirect()->route('customer.login')->with('success','Your have successfully signup,plase verifyed, plese login');
    }else{
      return redirect()->back()->with('error','Sorry email or verification code does not match!');
    }
  }

  public function checkOut(){
    $data['logo'] = Logo::first();
    $data['contact'] = Contact::first();
    return view('forntend.single_pages.customer-checkout',$data);
  
  }
  public function checkOutstore(Request $request){
    $this->validate($request, [
      'name' => 'required',
      'mobile_no'=>'required',
      'address' =>'required'
    
      ]);

      $checkout = new Shipping();
      $checkout->User_id   = Auth::User()->id;
      $checkout->name      = $request->name;
      $checkout->email     = $request->email;
      $checkout->mobile_no =  $request->mobile_no;
      $checkout->address   =  $request->address;
      $checkout->save();
      Session::put('shipping_id',$checkout->id);
      return redirect()->route('customer.payment')->with('success','Data saved successfully');
    
    }
  }