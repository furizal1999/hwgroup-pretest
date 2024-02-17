<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HandleBooks extends Model
{
    function getBooks(){
        $data = DB::table('books')
            ->get();
        return $data;
    }

    function addBooks($title, $author, $category_id, $stock){
         $data =  DB::table('books')->insert([
            'title' => $title,
            'author' => $author,
            'category_id' => $category_id,
            'stock' => $stock,
        ]);
        return $data;
    }
    
    function updateBooks($id, $request){
        return DB::table('books')
            ->where('id', $id)
            ->update([
                'title' => $request->title,
                'author' => $request->author,
                'category_id' => $request->category_id,
                'stock' => $request->stock,
                'updated_at' => Carbon::now()
            ]);
    }

    function deleteBooks($id){
        return DB::table('books')->where('id', $id)->delete();
    }
}
