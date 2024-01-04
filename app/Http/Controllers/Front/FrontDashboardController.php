<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Frontuser;
use App\Models\Store;

class FrontDashboardController extends Controller
{
    public function index(){
        
        if(Auth::guard('front')->check()){
            cookie()->queue(cookie('cxm', Auth::guard('front')->user()->id, 60));
        }
       
        return view('front.dashboard');
    }
}
