<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Model\About;

class AboutController extends Controller
{
     public function view(){
    	   $data['allData'] = About::all();
    	   return view('backend.about.view-about',$data);
    }
     public function add(){
     	return view('backend.about.add-about');
     }
     public function store(Request $request){
	     $data = new About();
	     $data->description   = $request->description;
	     $data->created_by  = Auth::user()->id;
	     $data->save();
	     return redirect()->route('abouts.view')->with('success','Data inserted successfully');
     }
     public function edit($id){
     	$editdata = About::find($id);
     	return view('backend.about.edit-about',compact('editdata'));
     }

     public function update(Request $request,$id){
     	   $data = About::find($id);
     	   $data->description   = $request->description;
     	   $data->updated_by = Auth::user()->id;
	        $data->save();
	        return redirect()->route('abouts.view')->with('success','Data updated successfully');

     }
     public function delete($id){
             $about = About::find($id);
             $about->delete(); 
             return redirect()->route('abouts.view')->with('success','Data deleted successfully');
     }
}
