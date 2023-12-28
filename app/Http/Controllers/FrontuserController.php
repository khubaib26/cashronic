<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontuserController extends Controller
{
    public function get_logedin_user_detail(){
        
        // if(Auth::guard('front')->check()){
        //     //return redirect('login');
        //     dd('user');
        // }
        dd('not');
    }
}
