<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function create()
    {
        return view('sales.createSales',[
            'supplier'=>Supplier::select(['sup_name','id'])->get(),
            'category'=>Category::select(['cat_name', 'id'])->get(),
            'product'=>Product::select(['name', 'id'])->get(),
        ]);
    }
}
