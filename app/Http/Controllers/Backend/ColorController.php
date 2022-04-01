<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Color;
use Auth;
use DB;
use App\Http\Requests\ColorRequest;

class ColorController extends Controller
{
    
    public function view(){
    	$data['allData'] = Color::all();
    	return view('backend.Color.view-color',$data);
    }

     public function add(){
     	return view('backend.Color.add-color');
     }

     public function store(Request $request){
       $this->validate($request,[
         'name' => 'required|unique:colors,name'
       ]);

	     $data = new Color();
	     $data->name   = $request->name;
	     $data->created_by  = Auth::user()->id;
	     $data->save();
	     return redirect()->route('colors.view')->with('success','Category inserted successfully');
     }

     public function edit($id){
     	$editdata = Color::find($id);
     	return view('backend.Color.add-color',compact('editdata'));
     }

     public function update(ColorRequest $request,$id){
     	 $data = Color::find($id);
     	 $data->name   = $request->name;
     	 $data->updated_by = Auth::user()->id;
	     $data->save();
	     return redirect()->route('colors.view')->with('success','Data updated successfully');

     }
     public function delete($id){
      $about = Color::find($id);
       $about->delete(); 
        return redirect()->route('colors.view')->with('success','Data deleted successfully');
     }
}
