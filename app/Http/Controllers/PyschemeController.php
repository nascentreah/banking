<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Plans;
use App\Models\Profits;
use Carbon\Carbon;


class PyschemeController extends Controller
{

    public function Plans()
    {
        $data['title']='Py scheme plans';
        $data['plan']=Plans::all();
        return view('admin.py-scheme.plans', $data);
    } 
    
    public function Create()
    {
        $data['title']='Create plan';
        return view('admin.py-scheme.create', $data);
    } 

    public function Store(Request $request)
    {
        $data['name'] = $request->name;
        $data['percent'] = $request->percent;
        $data['min_deposit'] = $request->min_amount;
        $data['amount'] = $request->max_amount;
        $data['status'] = $request->status;
        $res = Plans::create($data);
        if ($res) {
            return back()->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating New Plan');
        }
    } 
    
    public function Pending()
    {
        $data['title']='Pending investment';
        $data['profit']=Profits::whereStatus(1)->orderBy('date', 'DESC')->get();
        return view('admin.py-scheme.pending', $data);
    }     
    
    public function Completed()
    {
        $data['title']='Completed investment';
        $data['profit']=Profits::whereStatus(2)->latest()->get();
        return view('admin.py-scheme.completed', $data);
    } 

    public function Destroy($id)
    {
        $data = Profits::findOrFail($id);
            $res =  $data->delete();
            if ($res) {
                return back()->with('success', 'Request was Successfully deleted!');
            } else {
                return back()->with('alert', 'Problem With Deleting Request');
            }
    } 
    
    public function PlanDestroy($id)
    {
        $data = Plans::findOrFail($id);
            $res =  $data->delete();
            if ($res) {
                return back()->with('success', 'Request was Successfully deleted!');
            } else {
                return back()->with('alert', 'Problem With Deleting Request');
            }
    } 
    
    public function Edit($id)
    {
        $plan=$data['plan']=Plans::findOrFail($id);
        $data['title']=$plan->name;
        return view('admin.py-scheme.edit', $data);
    } 

    public function Update(Request $request)
    {
        $data = Plans::findOrFail($request->id);
        $data->name=$request->name;
        $data->percent=$request->percent;
        $data->min_deposit=$request->min_amount;
        $data->amount=$request->max_amount;
        if(empty($request->status)){
            $data->status=0;	
        }else{
            $data->status=$request->status;
        }
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }  
}
