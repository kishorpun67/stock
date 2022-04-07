<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
use Session;

class TaskController extends Controller
{
    public function Task()
    {
        $task = Task::get();
        Session::flash('page', 'task');
        return view('admin.task.view_task', compact('task'));
    }

    public function addEditTask(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add task";
            $button ="Submit";
            $task = new Task;
            $taskdata = array();
            $message = "Task has been added sucessfully";
        }else{
            $title = "Edit Task";
            $button ="Update";
            $taskdata = Task::where('admin_id',auth('admin')->user()->id)->where('id',$id)->first();
            $taskdata= json_decode(json_encode($taskdata),true);
            $task = Task::find($id);
            $message = "Task has been updated sucessfully";
        }
        if($request->isMethod('post')) {
            $data = $request->all();
        //dd($data);
            if(empty($data['started'])){
                return redirect()->back()->with('error_message', 'Started task is required !');
            }
            
            if(empty($data['radio']))
            {
                $data['radio'] = "";
            }
            if(empty($data['status']))
            {
                $data['status'] = "";
            }


            // if(empty($data['user_id']))
            // {
            //     $data['user_id'] = "";
            // }
            // if(empty($data['parent_id']))
            // {
            //     $data['parent_id'] = "";
            // }
            $task->admin_id = auth('admin')->user()->id;
            $task->started = $data['started'];
            $task->project = $data['project'];
            $task->status = $data['status'];
            $task->save();
            Session::flash('success_message', $message);
            return redirect('admin/task');
        }
        Session::flash('page', 'task');
        return view('admin.task.add_edit_task', compact('title','button','taskdata'));
    }

    public function deleteTask($id)
    {
      $id =Task::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Task has been deleted successfully!');
    }
}
