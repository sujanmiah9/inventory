<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Throwable;

class ProductController extends Controller
{
    public function create()
    {
        $category = Category::all();
        $supplier = Supplier::all();
        return view('product.createProduct', compact('category', 'supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'cat_id'=>'required',
            'sup_id'=>'required',
            'code'=>'required',
            'buyDate'=>'required',
            'expireDate'=>'required',
            'buyPrice'=>'required',
            'selPrice'=>'required',
        ],[
            'cat_id.required'=>'Category Name Not Selected',
            'sup_id.required'=>'Supplier Name Not Selected',
            'code.required'=>'Product code is Empty',
        ]);

        $data = [
            'name'=>$request->name,
            'cat_id'=>$request->cat_id,
            'sup_id'=>$request->sup_id,
            'code'=>$request->code,
            'route'=>$request->route,
            'buyDate'=>$request->buyDate,
            'expireDate'=>$request->expireDate,
            'buyPrice'=>$request->buyPrice,
            'selPrice'=>$request->selPrice,
        ];
        $img =$request-> file('photo');
        if($img){
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;

            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['photo']=$img_url;
            $product = Product::create($data);
            try{
                if($product){
                    $notification = array(
                        'message'=>'Product Added Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong !!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $product = Product::create($data);
            try{
                if($product){
                    $notification = array(
                        'message'=>'Product Added Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong !!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
    }

    public function index()
    {
        $product = Product::all();
        return view('product.allProduct', compact('product'));
    }

    public function view($id)
    {
        $viewProduct = DB::table('products')
                        ->join('categories', 'products.cat_id', 'categories.id')
                        ->join('suppliers', 'products.sup_id', 'suppliers.id')
                        ->select('categories.cat_name','suppliers.sup_name', 'products.*')
                        ->where('products.id',$id)->first();
        return view('product.viewProduct', compact('viewProduct'));
    }

    public function destroy($id)
    {
        $deleteProduct = Product::find($id);
        $delete = $deleteProduct->delete();
        if($delete){
            $notification = array(
                'message'=>'Data Deleted Successfull !',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $editProduct = Product::find($id);
        $category = Category::all();
        $supplier = Supplier::all();
        return view('product.editProduct', compact('editProduct','category','supplier'));
    }

    public function update(Request $request, $id)
    {
        $updateProduct = Product::find($id);
        $oldphoto = $updateProduct->photo;

        $data = [
            'name'=>$request->name,
            'cat_id'=>$request->cat_id,
            'sup_id'=>$request->sup_id,
            'code'=>$request->code,
            'route'=>$request->route,
            'buyDate'=>$request->buyDate,
            'expireDate'=>$request->expireDate,
            'buyPrice'=>$request->buyPrice,
            'selPrice'=>$request->selPrice,
        ];
        $img =$request-> file('photo');
        if($img){
            @unlink($oldphoto);
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;

            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['photo']=$img_url;
            $update = $updateProduct->update($data);
            try{
                if($update){
                    $notification = array(
                        'message'=>'Data Update Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->route('index.product')->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $update = $updateProduct->update($data);
            try{
                if($update){
                    $notification = array(
                        'message'=>'Data Update Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->route('index.product')->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
        
    }
}
