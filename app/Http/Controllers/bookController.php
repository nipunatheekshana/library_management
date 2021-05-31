<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;


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


        // dd($request->image->extension());

        // rename and upload the image
        $id=db::table('books')->max('id');
        $const='book-';
        $imageid=$id+1;
        $image_name =$const.$imageid; //new image name
        $guessExtension = $request->file('image')->guessExtension(); //file extention
        $file = $request->file('image')->storeAs('books', $image_name.'.'.$guessExtension,'public_uploads' );

        //build url for the image
        $const_url='img/books/';
        $url=$const_url.$image_name.'.'.$guessExtension;





        DB::table('books')->insert(
            [
                'name' =>$request->name,
                'quantity' =>$request->quantity,
                'discription'=>$request->discription,
                'img'=>$url

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
