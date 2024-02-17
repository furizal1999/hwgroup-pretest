<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HandleLoans extends Model
{
    function getLoans(){
        $data = DB::table('categories')
                ->join('books', 'categories.id', '=', 'books.category_id')
                ->join('book_loans', 'book_loans.book_id', '=', 'books.id')
                ->join('users', 'users.id', '=', 'book_loans.user_id')
                // seleksi dilakukan agar semua datanya tampil, karena ada beberapa field memiliki nama field yang sama.
                ->select([
                    'users.id as users_id',
                    'users.name as users_name',
                    'users.email as users_email',
                    'users.created_at as users_created_at',
                    'users.status as users_status',

                    'categories.id as categories_id',
                    'categories.name as categories_name',
                    'categories.created_at as categories_created_at',
                    'categories.updated_at as categories_updated_at',

                    'books.id as books_id',
                    'books.title as books_title',
                    'books.author as books_author',
                    'books.stock as books_stock',
                    'books.created_at as books_created_at',
                    'books.updated_at as books_updated_at',

                    'book_loans.id as book_loans_id',
                    'book_loans.loan_date as book_loans_loan_date',
                    'book_loans.return_date as book_loans_return_date',
                    'book_loans.created_at as book_loans_created_at',
                    'book_loans.updated_at as book_loans_updated_at'
                ])
                ->where('users.status', 'Available')
                ->get();
        return $data;
    }

    function addLoans($request){
         $data =  DB::table('book_loans')->insert([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'loan_date' => $request->loans_date,
        ]);
        return $data;
    }
    
    function updateLoans($id, $return_date){
        return DB::table('book_loans')
            ->where('id', $id)
            ->update(['return_date' => $return_date, 'updated_at' => Carbon::now()]);
    }
}
