<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function TaskSend()
    {
        
        $query=DB::select("
            SELECT 
                a.task_id,
                a.taskName,
                a.DescriptionStain,
                a.startDate,
                a.projectId,
                u.name as username
            FROM 
                task a
            JOIN 
                users u ON a.userId = u.id
            WHERE 
                a.userid = u.id;
        ");
        return $query;
        
    }
    public function TaskCreate(Request $request)
    {
        
        try {
            $id = DB::table('users')->select('id')->where('name', $request->name)->first()->id;
            $data=array('taskname'=>$request->taskname,"descriptionstain"=>$request->descriptionstain,"startdate"=>$request->startdate,
            "projectid"=>$request->projectid,"userid"=>$id);

            Task::insert($data);
            return response(true);
        } catch (\Throwable $th) {
            return response(false);
        }        
    }

    public function TaskUpdate(Request $request)
    {
        
        try {
            $id=$request->task_id;
            $data=array('taskname'=>$request->taskname,"startdate"=>$request->startdate,"descriptionstain"=>$request->descriptionstain);
            task::where('task_id',$id)->update( $data );
            return response(true);
        } catch (\Exception $e) {
            return response(false);
        }    
    }
    public function TaskDelete(Request $request)
    {
        
        try {
            $del=$request->del;
            task::where('task_id',$del)->delete();
            return response(true);
        } catch (\Exception $e) {
            return response(false);
        } 
    }
}
