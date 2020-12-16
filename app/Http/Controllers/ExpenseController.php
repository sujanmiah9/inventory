<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Throwable;

class ExpenseController extends Controller
{
    public function create()
    {
        return view('expense.createExpense');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'detail'=>'required',
            'amount'=>'required|numeric',
        ],[
            'detail.required'=>'Detail field is empty.',
            'amount.required'=>'Amount field is empty.',
            'amount.numeric'=>'The amount field must be a number.',
        ]);

        $data = [
            'detail'=>$request->detail,
            'amount'=>$request->amount,
            'date'=>$request->date,
            'month'=>$request->month,
            'year'=>$request->year,
        ];
        $expense = Expense::create($data);
        try{
            if($expense){
                $notification = array(
                    'message'=>'Daily Expenses Added Successfull!',
                    'alert-type'=>'success',
                );
                return Redirect()->back()->with($notification);
            }
        }catch(Throwable $Exception)
        {
            $notification = array(
                'message'=>'Something is Wrong !!',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function daily()
    {
        $date = date('d/m/y');
        $dailyEx = Expense::where('date',$date)->get();
        return view('expense.dailyExpense', compact('dailyEx'));
    }

    public function dailyEdit($id)
    {
        $dailyEdit = Expense::find($id);
        return view('expense.dailyEdit', compact('dailyEdit'));
    }

    public function dailyUpdate(Request $request, $id)
    {
        $dailyUpdate = Expense::find($id);
        $data = [
            'detail'=>$request->detail,
            'amount'=>$request->amount,
        ];
        $d_update = $dailyUpdate->update($data);
        try
        {
            if($d_update){
                $notification = array(
                    'message'=>'Data Update Successfull!',
                    'alert-type'=>'success',
                );
                return Redirect()->route('daily.expense')->with($notification);
            }
        }catch(Throwable $Exception)
        {
            $notification = array(
                'message'=>'Something is Wrong !!',
                'alert-type'=>'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function destroyDaily(Request $request)
    {
        $deleteDaily = Expense::find($request->id);
        $d_delete = $deleteDaily->delete();
        if($d_delete){
            $notification = array(
                'message'=>'Delete Successfull!',
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function monthly()
    {
        $month = date('F');
        $monthEx = Expense::where('month',$month)->get();
        return view('expense.monthlyExpense', compact('monthEx'));
    }

    public function yearly()
    {
        $year = date('Y');
        $yearEx = Expense::where('year',$year)->get();
        return view('expense.yearlyExpense', compact('yearEx'));
    }
}
