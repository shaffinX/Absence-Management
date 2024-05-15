<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\users;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Login(Request $request)
    {
        $users = Users::where('email', $request->email)->first();
        if($users){
            if (Hash::check($request->password, $users->password)) {
                $send = ['job'=>$users->job,'name'=>$users->name,'id'=> $users->id];
                return response($send);
            } else {
                return response(false);
               
            }

            
        }
        else{
            return response(false);
        }
    }
    public function Team()
    {
        $query = DB::table('resource')->get();
        return $query;
    }

    public function Members()
    {
        $query = users::all();
        return $query;
    }

    public function CreateUser(Request $request)
    {
        try {
            $pass = $request->password;
            $hashedPassword = Hash::make($pass);
            $data=array('name'=>$request->name,"email"=>$request->email,"job"=>$request->job,"password"=>$hashedPassword);
            users::insert($data);
            
            if($request->job=='user'){
                $reso=array('availableteam'=>$request->name,'resourcesteam'=>$request->name);
                DB::table('resource')->insert($reso);
            }
            else{
                $reso=array('resourcesteam'=>$request->name);
                DB::table('resource')->insert($reso);
            }

            return response(true);
        } catch (\Throwable $th) {
            return response(false);
        }
    }

    public function getter()
    {
        $name="Admin";
        $email="admin@gmail.com";
        $job="admin";
        $password="root@123";
        

        try {
            $hashedPassword = Hash::make($password);
            $data=array("name"=>$name,"email"=>$email,"job"=>$job,"password"=>$hashedPassword);            
            users::insert($data);
            
            $reso=array('resourcesteam'=>$name);
            DB::table('resource')->insert($reso);

            $data2=array("name"=>$name,"email"=>$email,"job"=>$job,"password"=>$password);   
            return response($data2);
        } catch (\Throwable $th) {
            return response(false);
        }
        
    }
    public function UpdateUser(Request $request)
    {
        try {
            $pass = $request->password;
            $hashedPassword = Hash::make($pass);
            $data=array("job"=>$request->job,"password"=>$hashedPassword);
            users::where('id',$request->userid)->update($data);
            return response(true);
        } catch (\Throwable $th) {
            return response(false);
        }
    }
    public function DeleteUser(Request $request)
    {
        try {
            $uss = Users::find($request->del);
            if ($uss) {
                $userName = $uss->name;
                DB::table('resource')->where('availableteam', $userName)->delete();
                DB::table('resource')->where('resourcesteam', $userName)->delete();
            }
            users::where('id',$request->del)->delete();
            return response(true);
        } catch (\Throwable $th) {
            return response(false);
        }
    }
}
