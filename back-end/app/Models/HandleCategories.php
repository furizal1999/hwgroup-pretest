<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HandleCategories extends Model
{
    function getCategories(){
        $data = DB::table('categories')
            ->get();
        return $data;
    }

    function addCategories($name){
         $data =  DB::table('categories')->insert([
            'name' => $name,
        ]);
        return $data;
    }
    
    function updateCategories($id, $name){
        return DB::table('categories')
            ->where('id', $id)
            ->update(['name' => $name, 'updated_at' => Carbon::now()]);
    }

    function deleteCategories($id){
        // return response()->json(['message' => $id], 200);
        return DB::table('categories')->where('id', $id)->delete();
    }
}
