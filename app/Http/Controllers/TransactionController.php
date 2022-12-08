<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Category;
use App\Models\TransCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transactions');
    }



    public function list()
    {
        $txData = array();
        $txData['title'] = "Detail of all registered transactions: ";
        $txData['user_id'] = Auth::id();

        $transactions = DB::table('users')
            ->join('accounts as acc', 'acc.account_user_id', '=', 'users.id')
            ->join('transactions as txs', 'txs.transaction_account_id', '=', 'acc.account_id')
            ->join('trans_category as tc', 'tc.cat_transaction_id', '=', 'txs.transaction_id')
            ->join('category as cat', 'cat.category_id', '=', 'tc.trans_category_id')
            ->select(
                'txs.transaction_id',
                'acc.bank',
                'acc.account_type',
                'txs.transaction_date',
                'txs.transaction_amount',
                'txs.merchant',
                'txs.transaction_type',
                'cat.category_name',
                'acc.account_id'
            )
            ->where('users.id', '=', Auth::id())->get();

        $txData['transaction'] = $transactions;

        return view('transactions')
            ->with('txData', $txData);
    }


    public function add()
    {

        $addData = array();
        $addData['title'] = "Add a new transaction: ";
        $addData['add_user'] = User::all();
        $addData['user_id'] = Auth::id();
        $addData['categories'] = Category::all();

        $accounts = DB::table('accounts')
            ->select(
                'account_id',
                'account_user_id',
                'account_type',
                'bank'
            )
            ->where('account_user_id', '=', Auth::id());
        $addData['accounts'] = $accounts->get();
        return view('add_transaction')->with('addData', $addData);
    }


    public function create(Request $formData)
    {

        $tx = new Transaction();
        $tx->transaction_account_id =  $formData->account_id;
        $tx->transaction_date = $formData->input('transaction_date');
        $tx->transaction_amount = $formData->input('transaction_amount');
        $tx->merchant = $formData->input('merchant');
        $tx->transaction_type = $formData->input('transaction_type');
        $tx->save();

        $tx_cat = new TransCategory();
        $tx_cat->cat_transaction_id =  $tx->id;
        $tx_cat->trans_category_id = $formData->input('category_id');
        $tx_cat->save();

        return back();
    }


    public function delete($transaction_id)
    {
        Transaction::destroy($transaction_id);
        TransCategory::destroy($transaction_id);

        return back();
    }

    public function edit($transaction_id)
    {
        $transaction = Transaction::findorFail($transaction_id);
        $editData = array();
        $editData["title"]  = 'Update the following transaction: ';
        $editData["transaction"] = $transaction;
        $editData['categories'] = Category::all();
        $cat = DB::table('users')
            ->join('accounts as acc', 'acc.account_user_id', '=', 'users.id')
            ->join('transactions as txs', 'txs.transaction_account_id', '=', 'acc.account_id')
            ->join('trans_category as tc', 'tc.cat_transaction_id', '=', 'txs.transaction_id')
            ->join('category as cat', 'cat.category_id', '=', 'tc.trans_category_id')
            ->select(
                'cat.category_name',
                'cat.category_id'
            )
            ->where('tc.cat_transaction_id', '=', $transaction_id)->get();
        $editData["cat_name"] = $cat;
        return view('edit_transaction')
            ->with('editData', $editData);
    }


    public function  update(Request $formData, $id)
    {
        $utx =  Transaction::findorFail($id);
        $utx->transaction_date = $formData->input('transaction_date');
        $utx->transaction_amount = $formData->input('transaction_amount');
        $utx->merchant = $formData->input('merchant');
        $utx->transaction_type = $formData->input('transaction_type');
        $utx->save();

        $tx_cat = TransCategory::findorFail($id);
        $tx_cat->cat_transaction_id =  $utx->transaction_id;
        $tx_cat->trans_category_id = $formData->input('category_id');
        $tx_cat->save();


        return redirect()->route('transactions');
    }

    
   
}
