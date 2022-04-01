<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Product;
use App\Models\Model\Category;
use App\Models\Model\Brand;
use App\Models\Model\Color;
use App\Models\Model\Size;
use App\Models\Model\ProductColor;
use App\Models\Model\ProductSize;
use App\Models\Model\ProductSubImage;
use Auth;
use DB;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    
public function view(){
              $data['allData'] = Product::all();
              return view('backend.product.view-product',$data);
              }
public function add(){
              $data['categoris'] = Category::all();
              $data['brands'] = Brand::all();
              $data['colors'] = Color::all();
              $data['sizes'] = Size::all();
              
              return view('backend.product.add-product',$data);
            }

public function store(Request $request){

  
         DB::transaction(function() use($request){
          $this->validate($request,[
            'name' => 'required|unique:products,name',
            'color_id' => 'required',
            'size_id' => 'required'
          ]);
 
             $product = new Product();
             $product->category_id = $request->category_id;
             $product->brand_id    = $request->brand_id;
             $product->name        = $request->name;
             $product->slug       = str_slug($request->name);
             $product->short_desc  = $request->short_desc;
             $product->long_desc   = $request->long_desc;
             $product->price       = $request->price;
              $img = $request->file('image');
              if($img){
              $imgName = date('YmdHi').$img->getClientOriginalName();
              $img->move('upload/product_images/', $imgName);
              $product['image'] = $imgName;
            }
           if($product->save()){

              $files = $request->sub_image;
              if(!empty($files)){
                foreach($files as $file){
                  $imgName = date('YmdHi').$file->getClientOriginalName();
                  $file->move('upload/product_images/product_sub_images', $imgName);
                  $subimage['sub_image'] = $imgName;

                $subimage = new ProductSubImage();
                $subimage->product_id = $product->id;
                $subimage->sub_image = $imgName;
                $subimage->save();
              }
            }
                  $colors = $request->color_id;
                  if(!empty($colors)){
                    foreach($colors as $color){
                      
                      $mycolor = new ProductColor();
                      $mycolor->product_id = $product->id;
                      $mycolor->color_id = $color;
                      $mycolor->save();
                    }
                  }

                  $sizes = $request->size_id;
                  if(!empty($sizes)){
                    foreach($sizes as $size){
                      
                      $mysize = new ProductSize();
                      $mysize->product_id = $product->id;
                      $mysize->size_id = $size;
                      $mysize->save();
                    }
                  }

              }else{
                return redirect()->back()->with('error' ,'sorry! Dont save');
              }
              });
            
              return redirect()->route('products.view')->with('success', 'size inserted successfully');
          }

 public function edit($id){
       $data['editdata']  = Product::find($id);
       $data['categoris'] = Category::all();
       $data['brands']    = Brand::all();
       $data['colors']    = Color::all();
       $data['sizes']     = Size::all();
       $data['color_array'] = ProductColor::where('product_id',$id)->orderBy('id','asc')->pluck('color_id');
      
       $data['size_array']= ProductSize::where('product_id',$id)->orderBy('id','asc')->pluck('size_id');
       return view('backend.product.add-product',$data);
     }




   public function update(ProductRequest $request,$id){

     	    //  DB::transaction(function() use ($request,$id) {
        //      $this->validate($request, [
        //   'color_id' => 'required',
        //   'size_id' => 'required'
        //  ]);
             $product = Product::find($id);
             $product->category_id = $request->category_id;
             $product->brand_id    = $request->brand_id;
             $product->name        = $request->name;
             $product->slug        = str_slug($request->name);
             $product->short_desc  = $request->short_desc;
             $product->long_desc   = $request->long_desc;
             $product->price       = $request->price;
              $img = $request->file('image');
              if($img){
              $imgName = date('YmdHi').$img->getClientOriginalName();
              $img->move('upload/product_images/', $imgName);
                if(file_exists('upload/product_images/'.$product->image) ANd ! empty($product->image)){
                  unlink('upload/product_images/'.$product->image);
                }
               $product['image'] = $imgName;
               }
              if($product->save()){

       //product subimage update

        $files = $request->sub_image;
           
        if(!empty($files)){
          $subImage = ProductSubImage::where('product_id',$id)->get()->toArray(); 
          foreach($subImage as $value){
            if(!empty($value)){
              unlink('upload/product_images/product_sub_images/'.$value['sub_image']);
            }
            ProductSubImage::where('product_id',$id)->delete();
           }
          }


          if(!empty($files)){
            foreach($files as $file){
              $imgName = date('YmdHi').$file->getClientOriginalName();
              $file->move('upload/product_images/product_sub_images', $imgName);
              $subimage['sub_image'] = $imgName;

            $subimage = new ProductSubImage();
            $subimage->product_id = $product->id;
            $subimage->sub_image = $imgName;
            $subimage->save();
          }
        }
      //product color update
          $colors = $request->color_id;
        if(!empty($colors)){
            ProductSubImage::where('product_id',$id)->delete();
          }
          if(!empty($colors)){
            $product->colors()->sync($colors);
          }

       //product size update

              $sizes = $request->size_id;
              if(!empty($sizes)){
                ProductSubImage::where('product_id',$id)->delete();
              }

              if(!empty($sizes)){
                $product->sizes()->sync($sizes);
            }

          }else{
                return redirect()->back()->with('error' ,'sorry! Dont save');
              }
            // });
    
           return redirect()->route('products.view')->with('success', 'size Updated successfully');
      }



 public function delete($id){
        $product = Product::find($id);
        if(file_exists('upload/product_images/'.$product->image) ANd ! empty($product->image)){
          unlink('upload/product_images/'.$product->image);
        }
        $subImage = ProductSubImage::where('product_id', $product->id)->get()->toArray();
        if (!empty($subImage)) {
        foreach ($subImage as $value) {
                if(!empty($value)) {
                    unlink('upload/product_images/product_sub_images/'.$value['sub_image']);
                }
            }
          }
          ProductSubImage::where('product_id',$product->id)->delete();
          ProductColor::where('product_id',$product->id)->delete();
          ProductSize::where('product_id',$product->id)->delete();
          $product->delete(); 
          return redirect()->route('products.view')->with('success','product deleted successfully');
      }

 public function details($id){
        $Product= Product::find($id);
        return view('backend.product.details-product',compact('Product'));
      }
 
 
}
