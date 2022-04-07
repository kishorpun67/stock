<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Miscellaneous;
use Session;

class MiscellaneousController extends Controller
{
    public function Miscellaneous()
    {
        $miscellaneous = Miscellaneous::get();
        Session::flash('page', 'miscellaneous');
        return view('admin.miscellaneous.view_miscellaneous', compact('miscellaneous'));
    }

    public function addEditMiscellaneous(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Miscellaneous";
            $button ="Submit";
            $miscellaneous = new Miscellaneous;
            $miscellaneousdata = array();
            $message = "Miscellaneous has been added sucessfully";
        }else{
            $title = "Edit Miscellaneous";
            $button ="Update";
            $miscellaneousdata = Miscellaneous::where('admin_id',auth('admin')->user()->id)->where('id',$id)->first();
            $miscellaneousdata= json_decode(json_encode($miscellaneousdata),true);
            $miscellaneous = Miscellaneous::find($id);
            $message = "Miscellaneous has been updated sucessfully";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
        //dd($data);
            if(empty($data['electricity_uses'])){
                return redirect()->back()->with('error_message', 'electricity uses is required !');
            }
            
          
            if(empty($data['interuses']))
            {
                $data['interuses'] = "";
            }
            
            if(empty($data['water_amount']))
            {
                $data['water_amount'] = "";
            }
            if(empty($data['water_uses']))
            {
                $data['water_uses'] = "";
            }
            
            if(empty($data['consumption_bill']))
            {
                $data['consumption_bill'] = "";
            }
            
            // if(empty($data['user_id']))
            // {
            //     $data['user_id'] = "";
            // }
            // if(empty($data['parent_id']))
            // {
            //     $data['parent_id'] = "";
            // }
            $miscellaneous->admin_id = auth('admin')->user()->id;
            $miscellaneous->electricity_uses = $data['electricity_uses'];
            $miscellaneous->interuses = $data['interuses'];
            $miscellaneous->water_amount = $data['water_amount'];
            $miscellaneous->water_uses = $data['water_uses'];
            $miscellaneous->consumption_bill = $data['consumption_bill'];
            $miscellaneous->save();
            Session::flash('success_message', $message);
            return redirect('admin/miscellaneous');
        }
        Session::flash('page', 'miscellaneous');
        return view('admin.miscellaneous.add_edit_miscellaneous', compact('title','button','miscellaneousdata'));
    }

    public function deleteMiscellaneous($id)
    {
      $id =Miscellaneous::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Miscellaneous has been deleted successfully!');
    }
}

