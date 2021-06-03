<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mybooksController extends Controller
{
    public function index(){
        try{
            $myBooks=DB::table('books')
            ->join('barrows','books.id','=','barrows.book_id')
            ->where('barrows.User_id','=',session('userId'))
            ->select('books.*','barrows.id as barrowid', 'barrows.status')
            ->get();

            // $myBooks=$myBooks->toArray();
        }
        catch(\Exception $exception){
            dd($exception);
        }
        return view('pages.mybooks',compact('myBooks'));


    }
}
