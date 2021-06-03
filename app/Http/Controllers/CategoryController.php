<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index(){

       $catagories=new Category();
       $catagories=$catagories->all();

       return view('pages.add_category',compact('catagories'));
   }
   public function add(Request $request){


    try{

        $category = new Category();
        $category->category=$request->category;
        $category->save();

    }catch(\Exception $ex){

    }
    return redirect()->back();

   }
   public function delete($id){
        $category=Category::find($id);
        $category->delete();
        return redirect()->back();
   }
   public function edit($id){
       $category=new Category();
       $category=Category::where('id',$id)->first();

       session([
           'category_mode'=>'edit',
           'id'=>$category->id,
           'category'=>$category->category
       ]);
       return redirect()->back();
    }
    public function update(Request $request, $id){
        $category=new Category();
        $category=Category::find($id);
        $category->category=$request->category;
        $category->save();
        session([
            'category_mode'=>'add',
            'id'=>'',
            'category'=>''
        ]);
        return redirect()->back();

    }
}
