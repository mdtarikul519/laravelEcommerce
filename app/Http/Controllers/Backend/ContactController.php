<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Model\Contact;
use App\Models\Model\Communicate;


class ContactController extends Controller
{
     public function view(){
    	$data['allData'] = Contact::all();
    	return view('backend.contact.view-contact',$data);
    }
     public function add(){
     	return view('backend.contact.add-contact');
     }
     public function store(Request $request){
	     $data = new Contact();
	     $data->address   = $request->address;
	     $data->phon_no   = $request->phon_no;
	     $data->email     = $request->email;
	     $data->facebook  = $request->facebook;
	     $data->youtube   = $request->youtube;
	     $data->twitter   = $request->twitter;
	     $data->google_plus = $request->google_plus;
	     $data->created_by  = Auth::user()->id;
	     $data->save();
	     return redirect()->route('contacts.view')->with('success','Data inserted successfully');
     }
     public function edit($id){
     	$editdata = Contact::find($id);
     	return view('backend.contact.edit-contact',compact('editdata'));
     }

     public function update(Request $request,$id){
     	   $data = contact::find($id);
     	  $data->address   = $request->address;
	     $data->phon_no   = $request->phon_no;
	     $data->email     = $request->email;
	     $data->facebook  = $request->facebook;
	     $data->youtube   = $request->youtube;
	     $data->twitter   = $request->twitter;
	     $data->google_plus = $request->google_plus; 
     	 $data->updated_by = Auth::user()->id;
	     $data->save();
	     return redirect()->route('contacts.view')->with('success','Data updated successfully');

     }
     public function delete($id){
      $contact = Contact::find($id);
       $contact->delete(); 
        return redirect()->route('contacts.view')->with('success','Data deleted successfully');
     }
     public function communicate(){
        $data['allData'] = Communicate::orderBy('id','DESC')->get();
        // dd($data['allData']);

        return view('backend.contact.view-communicate',$data);
    }
    public function deletCommunicate($id){
        $communicate = Communicate::find($id);
         // dd($communicate);
        $communicate->delete(); 

        return redirect()->route('communicate')->with('success','Data deleted successfully');
    }

}
