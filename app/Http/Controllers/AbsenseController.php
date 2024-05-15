<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\absences;
use Illuminate\Http\Request;

class AbsenseController extends Controller
{
    public function AbscentDashboard(Request $request)
    {
        $total = absences::where('status',true)->where('userid',$request->userid)->count();
        return $total;
    }
    public function AbscentMan(Request $request)
    {
        $id=$request->id;
        $query = absences::where('userid',$id)->get();
        return $query;
    }
    public function AbscentInput(Request $request)
    {
        try {
            $data=array('typeabscence'=>$request->typeabscence,"startdate"=>$request->startdate,"enddate"=>$request->enddate,
            "status"=>$request->status,"userid"=>$request->userid);
            absences::insert($data);
            return response(true);
        } catch (\Exception $e) {
            return response(false);
        }
    }
    public function AbscentUpdate(Request $request)
    {
        try {
            $id=$request->absence_id;
            $data=array('typeabscence'=>$request->typeabscence,"startdate"=>$request->startdate,"enddate"=>$request->enddate,
            "status"=>$request->status);
            absences::where('absence_id',$id)->where('userid',$request->userid)->update( $data );
            return response(true);
        } catch (\Exception $e) {
            return response(false);
        }
    }
    public function AbscentDel(Request $request)
    {
        try {
            $id=$request->absence_id;
            absences::where('absence_id',$request->absence_id)->where('userid', $request->userid)->delete();
            return response(true);
        } catch (\Exception $e) {
            return response(false);
        }
    }
    public function AbscentAdminView()
    {
        $results = DB::select("
            SELECT 
                a.absence_id,
                a.typeAbscence,
                a.startDate,
                a.endDate,
                u.name AS name,
                a.status
            FROM 
                absences a
            JOIN 
                users u ON a.userId = u.id
            WHERE 
                a.status = false
        ");
        return $results;
    }
    public function AbscentAdminValidate(Request $request)
    {
        try {
            $id=$request->absence_id;
            absences::where('absence_id',$request->absence_id)->update(['status'=> true]);
            return response(true);
        } catch (\Exception $e) {
            return response(false);
        }
    }
}
