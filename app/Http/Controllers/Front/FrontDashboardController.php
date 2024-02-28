<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Frontuser;
use App\Models\Favoritestore;
use App\Models\Browserhistory;
use App\Models\Store;

class FrontDashboardController extends Controller
{
    public function index(){
        
        if(Auth::guard('front')->check()){
            cookie()->queue(cookie('cxm', Auth::guard('front')->user()->id, 60));
        }
  
        // available store
        $stores = Store::with(['like'])->where('active',1)->get();

        $favoriteStore = Auth::guard('front')->user()->favoriteStore;

        $userHistory = Browserhistory::where('user_id',Auth::guard('front')->user()->id)->get();

        // foreach ($userHistory as $history) {
        //     if($history->asin){
        //         $client = new \GuzzleHttp\Client();
    
        //         $response = $client->request('GET', 'https://api.listingleopard.com/single/product-page?asin='.$history->asin.'&domain=amazon.com', [
        //         'headers' => [
        //             'X-api-key' => '3fec8651-4434-44cb-bfad-40d58cfb4229',
        //             'accept' => 'application/json',
        //         ],
        //         ]);
    
        //         $data =  json_decode($response->getBody());
        //        // dd($data[0]->product);
        //     }
        // }


        return view('front.dashboard',['stores' => $stores, 'favoriteStore'=>$favoriteStore, 'userHistory'=>$userHistory]);
    }
}
