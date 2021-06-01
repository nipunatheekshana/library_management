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
            $barrow->save();

            //update barrow status data in books tabale
            $book=new Book();
            $book=Book::find($id);
            $book->barrow_status=1;
            $save=$book->save();

            $responseBody = $this->responseBody(true, "barrow", "success", $save);

        }catch(\Exception $error){

            $responseBody = $this->responseBody(false, "barrow", "error", $error);

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
