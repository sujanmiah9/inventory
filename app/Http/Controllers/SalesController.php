<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class SalesController extends Controller
{
//create Sales.......................
    public function create()
    {
        return view('sales.createSales',[
            'product'=>Product::with('category')->get(),
            'customer'=>Customer::select('name', 'id')->get(),
        ]);
    }
//cart Add ....................
    public function addCart(Request $request){

        $data = [
            'id'=>$request->id,
            'name'=>$request->name,
            'qty'=>$request->qty,
            'price'=>$request->unit,
            'weight'=>'0',
        ];
        $add = Cart::add($data);
        if($add){
            $notification = array(
                'message'=>'Product Add Successfull',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message'=>'Error',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }
    
    }
//cart Update......................
    public function cartUpdate(Request $request, $rowId ){
        $cartUpdate = $request->qty;
        $update = Cart::update($rowId, $cartUpdate);
        if($update){
            $notification = array(
                'message'=>'Cart Update Successfull',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message'=>'Error',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }
    }
//cart Destroy...........................
    public function destroy($rowId ){
        $delete = Cart::remove($rowId);
        if($delete){
            $notification = array(
                'message'=>'Cart Delete Successfull',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message'=>'Cart Remove Successfull',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }
    }
//invoice create...........................
    public function invoiceSales(Request $request)
    {
        $request->validate([
            'customer_id'=>'required',
        ],[
            'customer_id.required'=>'Select A customer First',
        ]);
        $id = $request->customer_id;
        $customer = Customer::where('id',$id)->first();
        $content = Cart::content();
        return view('sales.invoiceSales',compact('content','customer'));
    }
//order store.................................
    public function storeSales(Request $request)
    {
        $data = [
            'customer_id'=>$request->customer_id,
            'order_no'=>$request->order_no,
            'order_date'=>$request->order_date,
            'total_product'=>$request->total_product,
            'sub_total'=>$request->sub_total,
            'tax'=>$request->tax,
            'total'=>$request->total,
            'payment_type'=>$request->payment_type,
            'pay'=>$request->pay,
            'due'=>$request->due,
        ];
        $order_id = Order::insertGetId($data);
        $contents = Cart::content();
        $pdata = array();
        foreach($contents as $content)
        {
            $pdata['order_id']=$order_id;
            $pdata['product_id']=$content->id;
            $pdata['quantity']=$content->qty;
            $pdata['unit_cost']=$content->price;
            $pdata['total']=$content->total;

            $insert = OrderDetails::insert($pdata);
        }
        try{
            if($insert){
                Cart::destroy();
                $notification = array(
                    'message'=>'Order Successfull!',
                    'alert-type'=>'success',
                );
                return Redirect()->route('dashboard')->with($notification);
            }
        }catch(Throwable $exception){
            $notification = array(
                'message'=>'Somthing is Wrong!',
                'alert-type'=>'error',
            );
            return Redirect()->route('create.sales')->with($notification);
        }
    }
//order Pending List..................................
    public function pending(){
        $order = DB::table('orders')
                ->join('customers', 'orders.customer_id','customers.id')
                ->where('status', 'Pending')
                ->select('orders.*', 'customers.name')
                ->get();
        // $order = Order::with('customer')->where('status', 'Pending')->get();
        return view('sales.detailSales',compact('order'));
    }
//sales Success list................................
    public function success(){
        $order = DB::table('orders')
                ->join('customers', 'orders.customer_id','customers.id')
                ->where('status', 'Success')
                ->select('orders.*', 'customers.name')
                ->get();
        // $order = Order::with('customer')->where('status', 'success')->get();
        return view('sales.salesSuccess',compact('order'));
    }
//sales Success history....................................
    public function salesSuccessHistor($id)
    {
        $order = DB::table('orders')
                ->join('customers','orders.customer_id', 'customers.id')
                ->where('orders.id', $id)
                ->first();
        
        $orderDetails =OrderDetails::where('order_id',$id)->with('product')->get();
        
        return view('sales.salesSuccessHistor', compact('order','orderDetails'));
    }
//salesHistory................................................
    public function SalesHistory($id)
    {
        $order = DB::table('orders')
                ->join('customers','orders.customer_id', 'customers.id')
                ->where('orders.id', $id)
                ->select('orders.*', 'customers.name','customers.address', 'customers.phone', 'customers.shopName')
                ->first();
        
        $orderDetails =OrderDetails::where('order_id',$id)->with('product')->get();
        
        return view('sales.salesHistory', compact('order','orderDetails'));
        
    }
//salesDone....................................................
    public function salesDone($id)
    {
        $done = Order::where('id',$id)->update(['status'=>'Success']);
        if($done){
            $notification = array(
                'message'=>'Order confirmed  Successfull!',
                'alert-type'=>'success',
            );
            return Redirect()->route('dashboard')->with($notification);
        }else{
            $notification = array(
                'message'=>'Somthing is Wrong!',
                'alert-type'=>'error',
            );
            return Redirect()->route('dashboard')->with($notification);
        }
    }
}
