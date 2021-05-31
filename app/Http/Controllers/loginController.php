<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    public function check(Request $request){

        $user   =   DB::table('users')
                    ->select('first_name')
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
        ->select('role','first_name','id')
        ->where('camp_id', '=', $id)
        ->first();

        $userRole=$role->role;
        $userName=$role->first_name;
        $userId=$role->id;

        $books=new Book();
        $data=$books->all();

        // dd($data);

        if($userRole=='student'){
            // echo('im a student');
            session([
                'status' => "loged",
                'role' => "student",
                'username'=>$userName,
                'userId'=>$userId
            ]);
        }
        elseif($userRole=='profesor'){
            session([
                'status' => "loged",
                'role' => "profesor",
                'username'=>$userName,
                'userId'=>$userId
            ]);
        }
        else{
            session([
                'status' => "loged",
                'role' => "librarian",
                'username'=>$userName,
                'userId'=>$userId
            ]);
        }
        return view('pages.home',compact('data'));

    }

}
