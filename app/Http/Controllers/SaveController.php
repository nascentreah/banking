<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Save;
use Carbon\Carbon;


class SaveController extends Controller
{

    public function Completed()
    {
        $data['title']='Money saved';
        $data['save']=Save::whereStatus(1)->get();
        return view('admin.save.completed', $data);
    } 
    
    public function Pending()
    {
        $data['title']='Savings on hold';
        $data['save']=Save::whereStatus(0)->get();
        return view('admin.save.pending', $data);
    } 

    public function Destroy($id)
    {
        $data = Save::findOrFail($id);
            $res =  $data->delete();
            if ($res) {
                return back()->with('success', 'Request was Successfully deleted!');
            } else {
                return back()->with('alert', 'Problem With Deleting Request');
            }
    } 

    public function Release($id)
    {
        $data = Save::findOrFail($id);
        $user=User::find($data->user_id);
        $data->status=1;
        $balance=$user->balance+$data->amount;
        $user->balance=$balance;
        $user->save();
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Request was Successfully approved!');
        } else {
            return back()->with('alert', 'Problem With Approving Request');
        }
    }   
}
