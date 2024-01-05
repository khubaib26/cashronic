<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Favoritestore;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addFavoriteStore($id)
    {

        $userId = Auth::guard('front')->user()->id;
    
        $data = Favoritestore::where(['user_id'=>$userId, 'store_id'=>$id])->first();
        if($data != ''){
            notify()->error('There are already courses in your favorites !!!');
            return redirect()->back();
        }else{
            Favoritestore::create(['user_id'=>$userId, 'store_id'=>$id]);
            notify()->success('The course was successfully added to your list of favorite courses');
            return redirect()->back();
        }

    
        // dd($store);
        // //This condition does not apply
        // if (in_array(auth()->user()->favorites ,$store->favorites)) {
        //     Auth::guard('front')->favorites()->create([
        //         'store_id' => $store->id
        //     ]);
        //     notify()->success('The course was successfully added to your list of favorite courses');
        //     return back();
        // } else {
        //         notify()->error('There are already courses in your favorites !!!');
        //         return back();
        // }    
    }

}
