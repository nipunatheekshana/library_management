<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $books=new Book();
        $data=$books->where('barrow_status',0)->get();
        return view('pages.home',compact('data'));
    }
}
