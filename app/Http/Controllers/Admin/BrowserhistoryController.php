<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Browserhistory;
use Illuminate\Http\Request;

class BrowserhistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'link'=>'required',
        ]);

        $client = new \GuzzleHttp\Client();
    
        $response = $client->request('GET', 'https://api.listingleopard.com/single/product-page?asin='.$request->asin.'&domain=amazon.com', [
           'headers' => [
                'X-api-key' => '3fec8651-4434-44cb-bfad-40d58cfb4229',
                'accept' => 'application/json',
            ],
        ]);
    
        $productDetail =  $response->getBody();

        
        $histroy = Browserhistory::create(['user_id'=>$request->user_id, 'link'=>$request->link, 'asin'=>$request->asin, 'product_detail'=>$productDetail]);
        
        return response()->json([
            'history'=> $histroy,
            'status' => true,
            'message' => 'User Browser History Add Successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Browserhistory  $browserhistory
     * @return \Illuminate\Http\Response
     */
    public function show(Browserhistory $browserhistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Browserhistory  $browserhistory
     * @return \Illuminate\Http\Response
     */
    public function edit(Browserhistory $browserhistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Browserhistory  $browserhistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Browserhistory $browserhistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Browserhistory  $browserhistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Browserhistory $browserhistory)
    {
        //
    }
}
