<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Leave;
use Session;
use Image;

class LeaveController extends Controller
{
    public function Leave()
    {
        $leave = Leave::get();
        Session::flash('page', 'leave');
        return view('admin.leave.view_leave', compact('leave'));
    }

    public function addEditLeave(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Leave";
            $button ="Submit";
            $leave = new Leave;
            $leavedata = array();
            $message = "Leave has been added sucessfully";
        }else{
            $title = "Edit Leave";
            $button ="Update";
            $leavedata = Leave::where('admin_id',auth('admin')->user()->id)->where('id',$id)->first();
            $leavedata= json_decode(json_encode($leavedata),true);
            $leave = Leave::find($id);
            $message = "Leave has been updated sucessfully";
        }
        if($request->isMethod('post')) {
           $data = $request->all();
        //dd($data);
            // if(empty($data['letter'])){
            //     return redirect()->back()->with('error_message', 'Leave letter is required !');
            // }
             if(empty($data['date']))
            {
                $data['date'] = "";
            }
            if(empty($data['subject']))
            {
                $data['subject'] = "";
            }
            if(empty($data['days']))
            {
                $data['days'] = "";
            }
            if(empty($data['status']))
            {
                $data['status'] = "";
            }

            if($file = $request->hasFile('letter')) {
             
                $file = $request->file('letter') ;
                $fileName = $file->getClientOriginalName() ;
                $destinationPath = public_path().'/images/letter' ;
                $file->move($destinationPath,$fileName);
                $leave->letter = $fileName;

             
            }

            $leave->admin_id = auth('admin')->user()->id;
            $leave->date = $data['date'];
            $leave->subject = $data['subject'];
            $leave->days = $data['days'];
            $leave->status = "New";
            $leave->save();
            Session::flash('success_message', $message);
            return redirect('admin/leave');
        }
        Session::flash('page', 'add_leave');
        return view('admin.leave.add_edit_leave', compact('title','button','leavedata'));
    }   

    public function updateLeave($id=null)
    {
        $leave = Leave::find($id);
        $leave->status = request('status');
        $leave->save();
        Session::flash('success_message', 'Leave status has been update successfully');
        return redirect()->back();

    }

    public function deleteLeave($id)
    {
      $id =Leave::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'leave has been deleted successfully!');
    }
}
