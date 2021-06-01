<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;


class bookController extends Controller
{
    //page loading function
    public function index(Request $request){

        $books=Book::all();
        $category=Category::all();

        $data=[$books,$category];

        return view('pages/managebooks',compact('data'));

    }

    //product deleting function
    public function delete($id){


        DB::table('books')->where('id', '=', $id)->delete();
        return redirect()->back();
    }

    //product adding function
    public function add(Request $request){

        try{
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

            $book=new Book();
            $book->isbnNum=$request->isbnNum;
            $book->title=$request->title;
            $book->authorName=$request->authorName;
            $book->publisher=$request->publisher;
            $book->category_id=$request->category;
            $book->edition=$request->edition;
            $book->img=$url;
            $book->barrow_status=0;
            $book->discription=$request->discription;
            $book->save();

        }
        catch(\Exception $exception){
            dd($exception);
        }

        return redirect()->back();
    }

    //load update
    public function edit($id){
        $book=DB::table('books')->where('id', '=', $id)->first();

        $category=new Category();
        $category=Category::where('id',$book->category_id)->first();

        session([
            'bookmanage_mode' =>'edit',
            'isbnNum'=>$book->isbnNum,
            'title'=>$book->title,
            'authorName'=>$book->authorName,
            'publisher'=>$book->publisher,
            'category'=>$category->category,
            'category_id'=>$book->category_id,
            'edition'=>$book->edition,
            'discription'=>$book->discription,
            'id'=>$book->id
        ]);
        return redirect()->back()->with(['category'=>$category]);
    }
    public function update(Request $request, $id){

        $book=new Book();
        $book=Book::find($id);
        $book->isbnNum=$request->isbnNum;
        $book->title=$request->title;
        $book->authorName=$request->authorName;
        $book->publisher=$request->publisher;
        $book->category_id=$request->category;
        $book->edition=$request->edition;
        $book->discription=$request->discription;
        $book->save();

        session([
            'bookmanage_mode' =>'add',
            'isbnNum'=>'',
            'title'=>'',
            'authorName'=>'',
            'publisher'=>'',
            'category'=>'',
            'category_id'=>'',
            'edition'=>'',
            'discription'=>'',
            'id'=>''
        ]);
        return redirect()->back();

    }

}
