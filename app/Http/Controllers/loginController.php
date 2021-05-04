<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    public function check(Request $request){

        $user   =   DB::table('users')
                    ->select('name')
                    ->where('camp_id', '=', $request->id)
                    ->first();
        // dd($user);
        if($user!=null){
            $password=  DB::table('users')
                        ->select('password')
                        ->where('camp_id', '=', $request->id)
                        ->first();
                        // echo('confuce');
                // dd($password->password);
            if($request->password==$password->password){
               return $this->roleCheck($request->id);
                //correct logins
                echo('correct');
            }
            else{
                //incorect password
                echo('incorect password');

            }
        }
        else{
            //incorect campus id
            echo('incorect username');
        }
    }

    public function roleCheck($id){

        $role=DB::table('users')
        ->select('role')
        ->where('camp_id', '=', $id)
        ->first();

        $userRole=$role->role;

        if($userRole=='student'){
            // echo('im a student');
            session([
                'status' => "loged",
                'role' => "student"
            ]);
            return view('pages.home');
        }
        elseif($userRole=='profesor'){
            session([
                'status' => "loged",
                'role' => "profesor"
            ]);
            return view('pages.home');
        }
        else{
            session([
                'status' => "loged",
                'role' => "librarian"
            ]);
            return view('pages.home');
        }

    }
}