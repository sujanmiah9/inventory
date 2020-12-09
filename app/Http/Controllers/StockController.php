<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function view(){
        return view('stock.viewStock');
    } 
    public function show(){
        return view('stock.inout');
    } 
}
