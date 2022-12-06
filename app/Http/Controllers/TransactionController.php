<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $transactions = DB::table('users')
            ->join('accounts as acc','acc.account_user_id','=','users.id')
            ->join('transactions as txs','txs.transaction_account_id', '=', 'acc.account_id')
            ->join('trans_category as tc', 'tc.cat_transaction_id' ,'=', 'txs.transaction_id')
            ->join('category as cat','cat.category_id','=','tc.trans_category_id')
            ->select('acc.bank', 'acc.account_type', 'txs.transaction_date','txs.transaction_amount','txs.merchant',
            'txs.transaction_type', 'cat.category_name')
            ->where('users.id', '=', Auth::id())->get();

        //Call my model and bring me all the students
        $txData['transaction'] = $transactions;
        
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
