<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Product;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\purchaseDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class PurchaseController extends Controller
{
    public function create()
    {

        return view('purchase.createPurchase',[
            'product'=>Product::with('category')->get(),
            'supplier'=>Supplier::select('sup_name', 'id')->get(),
        ]);
    }

    public function detail(){
        $purchase = Purchase::with('supplier')->get();
        return view('purchase.detailPurchase',compact('purchase'));
    }

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

    public function invoicePurchase(Request $request)
    {
        $request->validate([
            'sup_id'=>'required',
        ],[
            'sup_id.required'=>'Select A Supplier First',
        ]);
        $id = $request->sup_id;
        $supplier = Supplier::where('id',$id)->first();
        $content = Cart::content();
        return view('purchase.invoicePurchase',compact('content','supplier'));
    }

    public function storePurchase(Request $request)
    {
        $data = [
            'supplier_id'=>$request->supplier_id,
            'purchase_no'=>$request->purchase_no,
            'purchase_date'=>$request->purchase_date,
            'total_product'=>$request->total_product,
            'sub_total'=>$request->sub_total,
            'tax'=>$request->tax,
            'total'=>$request->total,
            'payment_type'=>$request->payment_type,
            'pay'=>$request->pay,
            'due'=>$request->due,
        ];
        $purchase_id = Purchase::insertGetId($data);
        $contents = Cart::content();
        $pdata = array();
        foreach($contents as $content)
        {
            $pdata['purchase_id']=$purchase_id;
            $pdata['product_id']=$content->id;
            $pdata['quantity']=$content->qty;
            $pdata['unit_cost']=$content->price;
            $pdata['total']=$content->total;

            $insert = purchaseDetails::insert($pdata);
        }
        try{
            if($insert){
                Cart::destroy();
                $notification = array(
                    'message'=>'Purchase Successfull!',
                    'alert-type'=>'success',
                );
                return Redirect()->route('create.purchase')->with($notification);
            }
        }catch(Throwable $exception){
            $notification = array(
                'message'=>'Somthing is Wrong!',
                'alert-type'=>'error',
            );
            return Redirect()->route('create.purchase')->with($notification);
        }
    }

    public function purchaseHistory($id)
    {
        $purchase = DB::table('purchases')
                ->join('suppliers','purchases.supplier_id', 'suppliers.id')
                ->where('purchases.id', $id)
                ->first();
        
        $purchaseDetails =purchaseDetails::where('purchase_id',$id)->with('product')->get();
        
        return view('purchase.purchaseHistory', compact('purchase','purchaseDetails'));
        
    }
}
