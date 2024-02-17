<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\HandleBooks;
use Session;

class HandleBooksController extends Controller
{
    function __construct(){
        $this->hb = new HandleBooks;
    }

    public function getBooks(Request $request)
    {
         try{
            $getBooks = $this->hb->getBooks();
            header('Content-Type: application/json');
            return response()->json($getBooks);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating book: '.$e->getMessage()], 500);
        }
    }
    
    public function addBooks(Request $request){
        try{
            $request->validate([
                'title' => 'required|string|max:500',
                'author' => 'required|string|max:255',
                'category_id' => 'required|regex:/^[0-9]+$/',
                'stock' => 'required|regex:/^[0-9]+$/',
            ]);
            if($this->hb->addBooks($request->title, $request->author, $request->category_id, $request->stock)){
                return response()->json(['message' => 'Book added successfully'], 201);
            } else {
                return response()->json(['message' => 'Book not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating book: '.$e->getMessage()], 500);
        }
    }

    public function updateBooks(Request $request, $id){
        try{
            $request->validate([
                'title' => 'required|string|max:500',
                'author' => 'required|string|max:255',
                'category_id' => 'required|regex:/^[0-9]+$/',
                'stock' => 'required|regex:/^[0-9]+$/',
            ]);
            if ($this->hb->updateBooks($id, $request)) {
                return response()->json(['message' => 'Book updated successfully'], 200);
            } else {
                return response()->json(['message' => 'Book not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating book: '.$e->getMessage()], 500);
        }
    }

    public function deleteBooks($id){
        try{
            if ($this->hb->deleteBooks($id)) {
                return response()->json(['message' => 'Book deleted successfully'], 200);
            } else {
                return response()->json(['message' => 'Book not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting book: '.$e->getMessage()], 500);
        }
    }
}
