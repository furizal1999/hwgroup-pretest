<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\HandleLoans;
use Session;

class HandleLoansController extends Controller
{
    function __construct(){
        $this->hc = new HandleLoans;
    }
    public function getLoans(Request $request)
    {
         try{
            $getLoans = $this->hc->getLoans();
            header('Content-Type: application/json');
            return response()->json($getLoans);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating loans: '.$e->getMessage()], 500);
        }
    }
    
    public function addLoans(Request $request){
        try{
            $request->validate([
                'book_id' => 'required|regex:/^[0-9]+$/',
                'user_id' => 'required|regex:/^[0-9]+$/',
                'loans_date' => 'required|date',
            ]);
            if($this->hc->addLoans($request)){
                return response()->json(['message' => 'Loans added successfully'], 201);
            } else {
                return response()->json(['message' => 'Loans not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating loans: '.$e->getMessage()], 500);
        }
    }

    public function updateLoans(Request $request, $id){
        try{
            $request->validate([
                'return_date' => 'required|date',
            ]);
            if ($this->hc->updateLoans($id, $request->return_date)) {
                return response()->json(['message' => 'Loans updated successfully'], 200);
            } else {
                return response()->json(['message' => 'Loans not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating loans: '.$e->getMessage()], 500);
        }
    }

}
