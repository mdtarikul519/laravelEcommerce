<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Shipping;
use App\Models\Model\Payment;
use App\Models\Model\OrderDetails;
use App\Models\Model\Order;

class orderController extends Controller
{
   public function pendingList(){
    $data['orders'] = Order::where('status','0')->get();
    return view('backend.order.pending-list', $data);
   }

   public function approvedList(){
    $data['orders'] = Order::where('status','1')->get();
    return view('backend.order.approved-list', $data);
   }

   public function details($id){
    $data['order'] = Order::find($id);
    return view('backend.order.order-dtails', $data);
   }

   public function approved(Order $order){
    $order->status ='1';
    $order->save();
    return redirect()->route('orders.appdoved.list');
   }


}
