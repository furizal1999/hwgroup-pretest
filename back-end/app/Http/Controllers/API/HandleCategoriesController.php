<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\HandleCategories;
use Session;

class HandleCategoriesController extends Controller
{
    function __construct(){
        $this->hc = new HandleCategories;
    }
    public function getCategories(Request $request)
    {
         try{
            $getCategories = $this->hc->getCategories();
            header('Content-Type: application/json');
            return response()->json($getCategories);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating category: '.$e->getMessage()], 500);
        }
    }
    
    public function addCategories(Request $request){
        try{
            $request->validate([
                'name' => 'required|string|max:255|unique:categories,name',
            ]);
            if($this->hc->addCategories($request->name)){
                return response()->json(['message' => 'Category added successfully'], 201);
            } else {
                return response()->json(['message' => 'Category not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating category: '.$e->getMessage()], 500);
        }
    }

    public function updateCategories(Request $request, $id){
        try{
            $request->validate([
                'name' => 'required|string|max:255|unique:categories,name,'.$id,
            ]);
            if ($this->hc->updateCategories($id, $request->name)) {
                return response()->json(['message' => 'Category updated successfully'], 200);
            } else {
                return response()->json(['message' => 'Category not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating category: '.$e->getMessage()], 500);
        }
    }

    public function deleteCategories($id){
        try{
            if ($this->hc->deleteCategories($id)) {
                return response()->json(['message' => 'Category deleted successfully'], 200);
            } else {
                return response()->json(['message' => 'Category not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting category: '.$e->getMessage()], 500);
        }
    }
}
