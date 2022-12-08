<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\TransCategory;
use App\Models\Account;



class UserController extends Controller
{

    public function display_main()
    {
        return view('main');
    }

    public function type()
    {

        $userData = array();
        $userData['title'] = "Manage application users:";
        $userData["users"] = User::all();

        return view('admin')->with('userData', $userData);
    }

    public function delete($user_id)
    {
        User::destroy($user_id);
        Transaction::destroy($user_id);
        TransCategory::destroy($user_id);
        Account::destroy($user_id);

        return back();
    }
}
