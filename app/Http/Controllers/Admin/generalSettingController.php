<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;

class generalSettingController extends Controller
{
    public function clearCache(){
        Artisan::call('optimize:clear');
        Artisan::call('cache:clear'); 
        Artisan::call('route:cache');
        Artisan::call('view:clear');

        notify()->success('Clear Cache !!!');
        //return redirect()->back()->withSuccess('Post deleted !!!');
        //return redirect('admin.dashboard');
        //return redirect()->route('admin.dashboard');
        //return redirect('/admin/dashboard');
        return redirect()->back();
        //dd('clear cache');
         
    }
}
