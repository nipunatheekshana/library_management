<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class userController extends Controller
{
    public function index(){


        $users=User::all();

        return view('pages/manage_user',compact('users'));
    }
    public function add(Request $request){
        DB::table('users')->insert(
            [
                'first_name' =>$request->first_name,
                'last_name' =>$request->last_name,
                'role'=>$request->role,
                'mobile'=>$request->mobile,
                'gender'=>$request->gender,
                'email'=>$request->email,
                'camp_id'=>$request->camp_id,
                'password'=>$request->password,
             ]
        );
        return redirect()->back();

    }
    public function delete($id){


        DB::table('users')->where('id', '=', $id)->delete();
        return redirect()->back();
    }
    public function edit($id){
        $user=DB::table('users')->where('id', '=', $id)->first();
        // dd($product);
        session([
                'usermanage_mode' =>'edit',
                'first_name' =>$user->first_name,
                'last_name' =>$user->last_name,
                'role'=>$user->role,
                'mobile'=>$user->mobile,
                'gender'=>$user->gender,
                'email'=>$user->email,
                'camp_id'=>$user->camp_id,
                'password'=>$user->password,
                'user_id'=>$user->id,

        ]);
        return redirect()->back();
    }
    public function update($id){
        DB::table('users')
              ->where('id', $id)
              ->update([
                'first_name' =>request('first_name'),
                'last_name' =>request('last_name'),
                'role'=>request('role'),
                'mobile'=>request('mobile'),
                'gender'=>request('gender'),
                'email'=>request('email'),
                'camp_id'=>request('camp_id'),
                'password'=>request('password'),

        ]);

        session([
            'usermanage_mode' =>'add',
            'first_name' =>'',
            'last_name' =>'',
            'role'=>'',
            'mobile'=>'',
            'gender'=>'',
            'email'=>'',
            'camp_id'=>'',
            'password'=>'',

        ]);
        return redirect()->back();

    }


}
