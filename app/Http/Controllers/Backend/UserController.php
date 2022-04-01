<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;

class UserController extends Controller
{
    public function view(){
    	$data['allData'] = User::where('usertype','Admin')->where('status','1')->get();
    	return view('backend.user.view-user',$data);

      // $users = User::all();
      // $products = Product::all();
      // return view('backend.user.view-user',compact('users','products'));
    }
     public function add(){
     	return view('backend.user.add-user');
     }
     public function store(Request $request){
       
	     $data = new User();
	     $data->usertype ='Admin';
       $data->role = $request->role;
	     $data->name = $request->name;
	     $data->email = $request->email;
	     $data->password =bcrypt($request->password);
	     $data->save();
	     return redirect()->route('user.view')->with('success','Data inserted successfully');
     }
     public function edit($id){
     	$editdata = User::find($id);
     	return view('backend.user.edit-user',compact('editdata'));
     }

     public function update(Request $request,$id){
     	 $data = User::find($id);
	     $data->role = $request->role;
	     $data->name = $request->name;
	     $data->email = $request->email;
	     $data->save();
	     return redirect()->route('user.view')->with('success','Data updated successfully');

     }
     public function delete($id){
      $user = User::find($id);
      if (file_exists('public/upload/user_images/' . $user->image) AND ! empty($user->image)) {
          unlink('public/upload/user_images/' . $user->image);
       } 
       $user->delete(); 
        return redirect()->route('user.view')->with('success','Data deleted successfully');
     }
     public function view_sent_mail_page(){
        return view('backend.user.reset_pass');
     }

     public function sent_mail(Request $req){
        $getData = User::where('email',$req->email)->first();
        if ($getData == null) {
            return redirect('/password_recover')->with('message','Account not found!');
        }else{
          $code = rand(100000,999999);
          $data = array(
              'code' => $code,
              'email' => $req->email,
            );
            User::where('email',$req->email)->update($data);
            Mail::send('backend.user.mail_body',$data, function($message) use($data){
                  $message->from('tarikulmd519@gmail.com','popularsoft Bd');
                  $message->to($data['email']);
                  $message->subject('Code for reset password!');
             });
            return view('backend.user.enter_code')
                    ->with('email',$req->email)
                    ->with('success','code sent successfully!');
        }
     }

    public function reset_pass(Request $req){
        // dd($req->all());
        $getData = User::where('email',$req->email)->where('code',$req->code)->first();
        if ($getData == null) {
            return view('backend.user.enter_code')
                    ->with('email',$req->email)
                    ->with('success','code not match!');
        }
        else{
          return view('backend.user.set_pass')
                    ->with('email',$req->email);
        }
    }
    public function update_pass(Request $req){
      $data = array(
        'password' =>bcrypt($req->password),
        'code'=>null, );
      User::where('email',$req->email)->update($data);
      return redirect('/login')->with('message', 'password changed successfully');
    }
  }
