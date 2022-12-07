<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class AccountController extends Controller
{
     public function add()
    {

        $addData = array();
        $addData['title'] = "Add a new account: ";
        $addData['add_user'] = User::all();
        $addData['user_id'] = Auth::id();

      
        return view('add_account')->with('addData', $addData);
    }


    public function create(Request $formData)
    {
     
            $acc = new Account();
            $acc->account_user_id =  Auth::id();
            $acc->account_type = $formData->input('account_type');
            $acc->bank = $formData->input('bank');
            $acc->have_amount = $formData->input('have_amount');
            $acc->owe_amount = $formData->input('owe_amount');

            $acc->save();
        
        return back();
    }
}
