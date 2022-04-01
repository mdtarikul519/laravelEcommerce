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
class CartController extends Controller
{
   public function addtoCart(Request $request){
    $this->validate($request,[
        'size_id' => 'required',
        'color_id' => 'required',
     ]);

      $product       = Product::where('id',$request->id)->first();
      $product_size  = Size::where('id',$request->size_id)->first();
      $product_color = Color::where('id',$request->color_id)->first();
      Cart::add([
          'id'     => $product->id,
          'qty'    => $request->qty,
          'price'  => $product->price,
          'name'   => $product->name,
          'weight' => 550,
          'options'=>[
                'size_id'    => $request->size_id,
                'size_name'  => $product_size->name,
                'color_id'   => $request->color_id,
                'color_name' => $product_color->name,
                'image'      => $product->image
          ],
     ]);
     return redirect()->route('show.cart')->with('success','product added successfully');     
   }

   public function showCart(){
    $data['logo'] = Logo::first();
    $data['contact'] = Contact::first();
    return view('forntend.single_pages.shopping-cart',$data);

   }

public function updateCart(Request $request){
       Cart::update($request->rowId,$request->qty);

        return redirect()->route('show.cart')->with('success','product Updated successfully'); 
   }

   public function deleteCart($rowId){
      Cart::remove($rowId);

       return redirect()->route('show.cart')->with('success','product Delete successfully'); 
  }
}
