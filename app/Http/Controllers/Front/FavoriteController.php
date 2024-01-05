<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addFavoriteStore(Store $store)
    {
        
        if (Auth::guard('front')->check()) {
            
			//This condition does not apply
            if (in_array(auth()->user()->favorites ,$store->favorites)) {
                auth()->user()->favorites()->create([
                    'store_id' => $store->id
                ]);
                notify()->success('The course was successfully added to your list of favorite courses');
                return back();
            } else {
                notify()->error('There are already courses in your favorites !!!');
            }
        }else{
            dd('test-----');
            notify()->error('To add to your favorites list, you must first login !!!');
            return back();
        }
        
        
    }

}
