<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\project;
use Illuminate\Http\Request;

class Projects extends Controller
{
    public function ProjectDashboard()
    {
        $total = project::where('status',false)->count();
        return $total;
    }
    public function DsiDashboard()
    {
        $total = project::distinct()->count('dsi');
        return $total;
    }
    public function ProjectTable()
    {
        $projects = Project::all();
        return $projects;

    }
    public function ProjectTableDash()
    {
        $projects = Project::where('status',false)->limit(3)->get();
        if($projects->count()<3){
            $projects = Project::where('status',false)->get();
        }
        return $projects;

    }
    public function SubmitProject(Request $request)
    {
        
        try {
            $data=array('projectname'=>$request->projectname,"description"=>$request->description,"contactprofessional"=>$request->contactprofessional,
            "toolsconcerns"=>$request->toolsconcerns,"dsi"=>$request->dsi,"estload"=>$request->estload,"startdate"=>$request->startdate,"enddate"=>$request->enddate,
            "status"=>$request->status,"commentpro"=>$request->commentpro);
            project::insert($data);
            return response(true);
        } catch (\Exception $e) {
            return response(false);
        }
        
    }
    public function UpdateProject(Request $request)
    {
        
        try {
            $id=$request->project_id;
            $data=array('projectname'=>$request->projectname,"description"=>$request->description,"contactprofessional"=>$request->contactprofessional,
            "toolsconcerns"=>$request->toolsconcerns,"dsi"=>$request->dsi,"estload"=>$request->estload,"startdate"=>$request->startdate,"enddate"=>$request->enddate,
            "status"=>$request->status,"commentpro"=>$request->commentpro);
            project::where('project_id',$id)->update( $data );
            return response(true);
        } catch (\Exception $e) {
            return response(false);
        }
        
    }
    public function DelProject(Request $request)
    {
        
        try {
            $id=$request->del;
            project::where('project_id',$id)->delete();
            return response(true);
        } catch (\Exception $e) {
            return response(false);
        }
        
    }
}
