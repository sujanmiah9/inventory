<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Purchase;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function salesReport(){
        return view('report.sales_report_create');
    }

    public function reportShow(Request $request)
    {
        $date = strtotime($request->start_date);
        $start_date = date('d/m/y',$date);
        $date2 = strtotime($request->end_date);
        $end_date = date('d/m/y',$date2);

        if($request->report_type == 'sales'){
            $sales_report = Order::whereBetween('order_date', [$start_date, $end_date])->get();
            return view('report.sales_report', compact('sales_report'));
        }else{
            $purchase_report = Purchase::whereBetween('purchase_date', [$start_date, $end_date])->get();
            return view('report.purchase_report', compact('purchase_report'));
        }
        
    }
}
