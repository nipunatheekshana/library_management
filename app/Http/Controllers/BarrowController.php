<?php

namespace App\Http\Controllers;

use App\Models\Barrow;
use App\Models\Book;
use Illuminate\Http\Request;

class BarrowController extends Controller
{

    public function barrow($id){
        try{
            //insert data into barrow tabale
            $barrow=new Barrow();
            $barrow->book_id=$id;
            $barrow->User_id =session('userId');
            $barrow->status=true;
            $barrow->save();

            //update barrow status data in books tabale
            $book=new Book();
            $book=Book::find($id);
            $book->barrow_status=true;
            $save=$book->save();

            $responseBody = $this->responseBody(true, "barrow", "success", $save);

        }catch(\Exception $error){

            $responseBody = $this->responseBody(false, "barrow", "error", $error);

        }
        return response()->json([ "data" => $responseBody ]);

    }

    public function return($id,$barrowid){
        try{
            $book=new Book();
            $book=Book::find($id);
            $book->barrow_status=false;
            $save=$book->save();

            $return = new Barrow();
            $return=Barrow::find($barrowid);
            $return->status=false;
            $save=$return->save();

            $responseBody = $this->responseBody(true, "return", "success", $save);

        }
        catch(\Exception $ex){

            $responseBody = $this->responseBody(false, "return", "error", $ex);

        }
        return response()->json([ "data" => $responseBody ]);
    }



    // $responseBody = $this->responseBody(true, "Supplier", "All", $field_officers_array);
    function responseBody($success, $name, $message, $result) {
        $body = [
            "success" => $success,
            "name" => $name,
            "message" => $message,
            "result" => $result
        ];
        return $body;
    }

}
