<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Favoritestore as Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    
    public function addFavoriteStore($store_id)
    {

        $cid = auth()->guard('front')->user()->id;
        if(!Favorite::where(['store_id'=>$store_id,'frontuser_id'=>$cid])->exists()){
            Favorite::create(['store_id'=>$store_id,'frontuser_id'=>$cid]);
            notify()->success('The course was successfully added to your list of favorite courses');
            return redirect()->back();
        }else{
            notify()->error('There are already courses in your favorites !!!');
             return redirect()->back();
        }

    }

}
