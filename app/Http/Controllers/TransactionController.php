<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class TransactionController extends Controller
{
    public function index()
    {
        return view('txdetails');
    }

    public function list()  {
        $txData = array();
        $txData['title'] = "Detail of all registered transactions: ";
        $txData['user_id'] = Auth::id();

        //Call my model and bring me all the students
        $txData['transaction'] = Transaction::all();
        
        return view('txdetails')
            ->with('txData', $txData);
    }


    // //Create

    // public function create(Request $formData)
    // {

    //     $tx = new Transaction();
    //     $tx->transaction_id = $formData->input("transaction_id");
    //     $tx->students_id = $formData->input("students_id");


    //     $tx->save();

    //     //Send user back to where they came from
    //     return back();
    // }

    // //Delete
    // public function delete($id)
    // {
    //     Enrollment::destroy($id);
    //     return back();
    // }
}
