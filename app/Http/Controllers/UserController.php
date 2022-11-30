<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

//Bring in the model
use App\Models\User;

class UserController extends Controller {
    
    public function display_main()  {
        return view('main');
    }

 




}

?>