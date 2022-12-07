<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function list(Request $request)
    {
        $viewData = array();
        $viewData['title'] = "Dashboard";

        $viewData['user_dashboard'] = User::all();
        $viewData['categories'] = Category::all();
        $viewData['transactions'] = "";

        if ($request->category_id) {

            $transactions = DB::table('users')
                ->join('accounts as acc', 'acc.account_user_id', '=', 'users.id')
                ->join('transactions as txs', 'txs.transaction_account_id', '=', 'acc.account_id')
                ->join('trans_category as tc', 'tc.cat_transaction_id', '=', 'txs.transaction_id')
                ->join('category as cat', 'cat.category_id', '=', 'tc.trans_category_id')
                ->select(
                    'txs.transaction_date',
                    'txs.transaction_amount',
                    'txs.transaction_type',
                    'cat.category_name'
                )
                ->where('users.id', '=', Auth::id())
                ->where('cat.category_id', '=', $request->category_id)
                ->where('txs.transaction_type', '=', $request->transaction_type);

            $viewData['category'] = Category::findOrFail($request->category_id);

            $viewData['transactions'] = $transactions->get();

            $viewData['sum_transaction'] = $transactions->sum('txs.transaction_amount');
        }

        $viewData['sum_expenses_cat'] = $this->sumExpenseByCategory();
        $viewData['total_expenses'] = $this->totalExpense();
        $viewData['total_income'] = $this->totalIncome();

        // $this->sumExpenseByCategory();
        // $this->totalExpense();
        return view('dashboard')->with('viewData', $viewData);
    }

    public function sumExpenseByCategory()
    {

        $expenses = DB::table('users')
            ->join('accounts as acc', 'acc.account_user_id', '=', 'users.id')
            ->join('transactions as txs', 'txs.transaction_account_id', '=', 'acc.account_id')
            ->join('trans_category as tc', 'tc.cat_transaction_id', '=', 'txs.transaction_id')
            ->join('category as cat', 'cat.category_id', '=', 'tc.trans_category_id')
            ->selectRaw('sum(txs.transaction_amount) as sumAmount, cat.category_name')
            ->where('users.id', '=', Auth::id())
            ->where('txs.transaction_type', '=', 'expense')
            ->groupBy('cat.category_name')->get();
        // ->sum('txs.transaction_amount')

        // dd($expenses);
        return $expenses;
    }

    public function totalExpense()
    {

        $expenses = DB::table('users')
            ->join('accounts as acc', 'acc.account_user_id', '=', 'users.id')
            ->join('transactions as txs', 'txs.transaction_account_id', '=', 'acc.account_id')
            ->join('trans_category as tc', 'tc.cat_transaction_id', '=', 'txs.transaction_id')
            ->join('category as cat', 'cat.category_id', '=', 'tc.trans_category_id')
            ->selectRaw('sum(txs.transaction_amount) as total_amount')
            ->where('users.id', '=', Auth::id())
            ->where('txs.transaction_type', '=', 'expense')
            ->get();
        // ->sum('txs.transaction_amount')
        // dd($expenses);

        // dd($expenses);
        // returns the first position of the collection due to a conflict in the division in the blade
        return $expenses->first();
        // dd($expenses);

    }

    public function totalIncome()
    {

        $income = DB::table('users')
            ->join('accounts as acc', 'acc.account_user_id', '=', 'users.id')
            ->join('transactions as txs', 'txs.transaction_account_id', '=', 'acc.account_id')
            ->join('trans_category as tc', 'tc.cat_transaction_id', '=', 'txs.transaction_id')
            ->join('category as cat', 'cat.category_id', '=', 'tc.trans_category_id')
            ->selectRaw('sum(txs.transaction_amount) as total_amount')
            ->where('users.id', '=', Auth::id())
            ->where('txs.transaction_type', '=', 'income')
            ->get();
        // ->sum('txs.transaction_amount')
        // dd($expenses);

        // dd($expenses);

        return $income->first();
        // dd($expenses);

    }
}
