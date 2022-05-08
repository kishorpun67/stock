<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Electricity;
use Session;

class ElectricityController extends Controller
{
    public function electricity()
    {
        $electricity = Electricity::get();
        Session::flash('page', 'electricity');
        return view('admin.electricity.view_electricity', compact('electricity'));
    }

    public function addEditElectricity(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Electricity";
            $button ="Submit";
            $electricity = new Electricity;
            $electricitydata = array();
            $message = "Electricity has been added sucessfully";
        }else{
            $title = "Edit Electricity";
            $button ="Update";
            $electricitydata = Electricity::where('admin_id',auth('admin')->user()->id)->where('id',$id)->first();
            $electricitydata= json_decode(json_encode($electricitydata),true);
            $electricity = Electricity::find($id);
            $message = "Electricity has been updated sucessfully";
        }
        if($request->isMethod('post')) {
           $data = $request->all();
        //dd($data);
            if(empty($data['electricity_uses'])){
                return redirect()->back()->with('error_message', 'Electricity Name is required !');
            }

            if(empty($data['electricity_unit']))
            {
                $data['electricity_unit'] = "";
            }
            if(empty($data['electricity_month']))
            {
                $data['electricity_month'] = "";
            }
            if(empty($data['electricity_total']))
            {
                $data['electricity_total'] = "";
            }
            // if(empty($data['parent_id']))
            // {
            //     $data['parent_id'] = "";
            // }
            $electricity->admin_id = auth('admin')->user()->id;
            $electricity->electricity_uses = $data['electricity_uses'];
            $electricity->electricity_unit = $data['electricity_unit'];
            $electricity->electricity_month = $data['electricity_month'];
            $electricity->electricity_total = $data['electricity_total'];
            $electricity->save();
            Session::flash('success_message', $message);
            return redirect('admin/electricity');
        }
        Session::flash('page', 'electricity');
        return view('admin.electricity.add_edit_electricity', compact('title','button','electricitydata'));
    }

    public function electricityReport()
    {
        $electricity = Electricity::get();
        Session::flash('page', 'salary');
        return view('admin.report.electricity_report',compact('electricity'));
    }


    public function deleteElectricity($id)
    {
      $id =Electricity::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Electricity has been deleted successfully!');
    }
}

