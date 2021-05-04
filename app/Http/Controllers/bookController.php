<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bookController extends Controller
{
    //page loading function
    public function index(Request $request){

        $books=Book::all();

        // session([
        //     'bookmanage_mode' =>'add',
        //     'name'=>'',
        //     'quantity'=>'',
        //     'discription'=>'',
        //     'id'=>''
        // ]);

        return view('pages/managebooks',compact('books'));

    }

    //product deleting function
    public function delete($id){


        DB::table('books')->where('id', '=', $id)->delete();
        return redirect()->back();
    }

    //product adding function
    public function add(Request $request){

        DB::table('books')->insert(
            [
                'name' =>$request->name,
                'quantity' =>$request->quantity,
                'discription'=>$request->discription,
             ]
        );
        return redirect()->back();
    }

    //load update
    public function edit($id){
        $book=DB::table('books')->where('id', '=', $id)->first();
        // dd($product);
        session([
            'bookmanage_mode' =>'edit',
            'name'=>$book->name,
            'quantity'=>$book->quantity,
            'discription'=>$book->discription,
            'id'=>$book->id
        ]);
        return redirect()->back();
    }
    public function update($id){
        DB::table('books')
              ->where('id', $id)
              ->update([
                  'name' => request('name'),
                  'quantity' => request('quantity'),
                  'discription' => request('discription'),

        ]);

        session([
            'bookmanage_mode' =>'add',
            'name'=>'',
            'quantity'=>'',
            'discription'=>'',
            'id'=>''
        ]);
        return redirect()->back();

    }

}
