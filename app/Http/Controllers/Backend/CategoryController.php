<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Category;
use Auth;
use DB;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function view(){
    	$data['allData'] = Category::all();
    	return view('backend.Category.view-Category',$data);
    }

     public function add(){
     	return view('backend.Category.add-Category');
     }

     public function store(Request $request){
       $this->validate($request,[
         'name' => 'required|unique:categories,name'
       ]);

	     $data = new Category();
	     $data->name   = $request->name;
	     $data->created_by  = Auth::user()->id;
	     $data->save();
	     return redirect()->route('categorys.view')->with('success','Category inserted successfully');
     }

     public function edit($id){
     	$editdata = Category::find($id);
     	return view('backend.Category.add-Category',compact('editdata'));
     }

     public function update(CategoryRequest $request,$id){
     	   $data = Category::find($id);
     	 $data->name   = $request->name;
     	 $data->updated_by = Auth::user()->id;
	     $data->save();
	     return redirect()->route('categorys.view')->with('success','Data updated successfully');

     }
     public function delete($id){
      $about = Category::find($id);
       $about->delete(); 
        return redirect()->route('categorys.view')->with('success','Data deleted successfully');
     }
    }