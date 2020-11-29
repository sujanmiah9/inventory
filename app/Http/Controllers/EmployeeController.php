<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Throwable;

class EmployeeController extends Controller
{
    public function create()
    {
        return view('employee.createEmployee');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'city'=>'required',
            'nid'=>'required',
            'salary'=>'required',
            'address'=>'required',
        ]);
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'experiense'=>$request->experiense,
            'nid'=>$request->nid,
            'salary'=>$request->salary,
            'vacation'=>$request->vacation,
            'city'=>$request->city,
            'address'=>$request->address
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
            $employee = Employee::create($data);
            try{
                if($employee){
                    $notification = array(
                        'message'=>'Employee Added Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                return Redirect()->back()->with($notification);
            }  
        }else{
            try{
                $employee = Employee::create($data);
                if($employee){
                    $notification = array(
                        'message'=>'Employee Added Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Somthing is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
    }

    public function index()
    {
        $employee = Employee::all();
        return view('employee.allemployee',compact('employee'));
    }

    public function view($id)
    {
        $viewEmployee = Employee::find($id);
        return view('employee.viewEmployee', compact('viewEmployee'));
    }

    public function destroy($id)
    {
        $deleteEmployee = Employee::find($id);
        $delete = $deleteEmployee->delete();
        if($delete){
            $notification = array(
                'message'=>'Data Delete Successfull!',
                'alert-type'=>'success',
            );
            return Redirect()->route('index.employee')->with($notification);
        }
    }

    public function edit($id)
    {
        $editEmployee = Employee::find($id);
        return view('employee.editEmployee', compact('editEmployee'));
    }

    public function update(Request $request, $id)
    {   
        $updateEmployee = Employee::find($id);
        $photo = $updateEmployee->photo;
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'experiense'=>$request->experiense,
            'nid'=>$request->nid,
            'salary'=>$request->salary,
            'vacation'=>$request->vacation,
            'city'=>$request->city,
            'address'=>$request->address
        ];
        $img =$request-> file('photo');
        if($img){
            @unlink($photo);
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;

            $img_path = 'upload/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['photo']=$img_url;
            $update = $updateEmployee->update($data);
            try{
                if($update){
                    $notification = array(
                        'message'=>'Data Update Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->route('index.employee')->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong !',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $update = $updateEmployee->update($data);
            try{
                if($update){
                    $notification = array(
                        'message'=>'Data Update Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->route('index.employee')->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Something is Wrong !',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
    }
}
