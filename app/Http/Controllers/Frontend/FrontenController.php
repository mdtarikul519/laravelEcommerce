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
use Mail;
use DB;

class FrontenController extends Controller
{
   public function index(){
   	$data['logo'] = Logo::first(); 
   	$data['sliders'] = Slider::all();
   	$data['contact'] = Contact::first();
    $data['catagoris'] = Product::select('category_id')->groupBy('category_id')->get();
    $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
    $data['products'] = Product::orderBy('id','desc')->paginate(11);
   return view('forntend.layouts.home',$data);
   }
   public function aboutUs(){
       $data['logo'] = Logo::first();
       $data['contact'] = Contact::first(); 
       $data['about'] = About::first();
   	return view('forntend.single_pages.about-us',$data); 
   }
   public function contactUs(){
         $data['logo'] = Logo::first();
         $data['contact'] = Contact::first(); 
   	return view('forntend.single_pages.contact-us',$data);
   }
  
 
  public function shoppingCart(){
       $data['logo'] = Logo::first();
       $data['contact'] = Contact::first();  

      return view('forntend.single_pages.shopping-cart',$data);
  }

  public function productList(){
    $data['logo'] = Logo::first(); 
    $data['contact'] = Contact::first();
    $data['catagoris'] = Product::select('category_id')->groupBy('category_id')->get();
    $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
    $data['products'] = Product::orderBy('id','desc')->paginate(11);
    return view('forntend.single_pages.product-list',$data);

  }  
    

  public function categoryWiseProduct($category_id){
    $data['logo'] = Logo::first(); 
    $data['contact'] = Contact::first();
    $data['catagoris'] = Product::select('category_id')->groupBy('category_id')->get();
    $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
    $data['products'] = Product::where('category_id',$category_id)->orderBy('id','desc')->get();
    return view('forntend.single_pages.category-wise-product',$data);

  }
  
  public function brandWiseProduct($brand_id){
    $data['logo'] = Logo::first(); 
    $data['contact'] = Contact::first();
    $data['catagoris'] = Product::select('category_id')->groupBy('category_id')->get();
    $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
    $data['products'] = Product::where('brand_id',$brand_id)->orderBy('id','desc')->get();
    return view('forntend.single_pages.brand-wise-product',$data);

  }


  public function productDetails($slug){
    $data['logo'] = Logo::first(); 
    $data['contact'] = Contact::first();
    $data['products'] = Product::where('slug',$slug)->first();
    $data['product_sub_images'] = ProductSubImage::where('product_id',$data['products']->id)->get();
    $data['product_colors'] = ProductColor::where('product_id',$data['products']->id)->get();
    $data['product_sizes'] = ProductSize::where('product_id',$data['products']->id)->get();
    return view('forntend.single_pages.product-details',$data);

  }
  
  

  public function store(Request $request){
   // dd($request->all());
    $contact = new Communicate();
    $contact->name      = $request->name;
    $contact->email     = $request->email;
    $contact->mobile_no = $request->mobile_no;
    $contact->address   = $request->address;
    $contact->msg       = $request->msg;
    $contact->save();

    $data = array(
      'name'      => $request->name,
      'email'     => $request->email,
      'mobile_no' => $request->mobile_no,
      'address'   => $request->address,
      'msg'       => $request->msg
       );
     Mail::send('forntend.emails.contact',$data, function($message) use($data){
          $message->from('tarikulmd519@gmail.com','popularsoft Bd');
          $message->to($data['email']);
          $message->subject('Thanks for contact us');
     });
    return redirect()->back()->with('success','Your massage sent successfully');
  }

  public function findProduct(Request $request){
    $slug = $request->slug;
    $data['products'] = Product::where('slug',$slug)->first();
    if($data['products']){
      $data['logo'] = Logo::first(); 
      $data['contact'] = Contact::first();
      $data['products'] = Product::where('slug',$slug)->first();
      $data['product_sub_images'] = ProductSubImage::where('product_id',$data['products']->id)->get();
      $data['product_colors'] = ProductColor::where('product_id',$data['products']->id)->get();
      $data['product_sizes'] = ProductSize::where('product_id',$data['products']->id)->get();
      return view('forntend.single_pages.find-product',$data);
    }else{
      return redirect()->back()->with('error','No product does not match');
    }
    
  }
  public function getProduct(Request $request){
    $slug = $request->slug;
    $productData = DB::table('products')->where('slug','LIKE', '%'.$slug.'%')->get();

    $html = '';
    $html .='<div><ul>';
    if ($productData) {
     foreach($productData as $v){
       $html .='<li>'.$v->slug.'</li>';
      }
     }
     $html .='</ul></div>';
     return response()->json($html);
    }
                  
  }

