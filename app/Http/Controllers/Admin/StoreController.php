<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('role_or_permission:Store access|Store create|Store edit|Store delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Store create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Store edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Store delete', ['only' => ['destroy']]);
    } 


    public function index()
    {
        $store   = Store::latest()->get();

        return view('setting.store.index',['stores'=>$store]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('setting.store.new',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        // validation 
         $request->validate([
            'name'=>'required',
            'url' => 'required|url',
        ]);

        $file = $request->file('logo');
        $filePath = time().'.'.$file->getClientOriginalExtension();
      
        $store = Store::create([
            'name'=>$request->name,
            'url'=>$request->url,
            'description'=>$request->description,
            'logo'=>$filePath
        ]);
    
        $store->categories()->attach($request->categories);

        //Move Uploaded File
        $destinationPath = 'store';
        $file->move($destinationPath,$filePath);

        notify()->success('Store created !!!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $categories = Category::get();
        $store->categories;
        return view('setting.store.edit',['store'=>$store,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        
        
        

        if($request->hasFile('logo')){
            
            unlink('store/'.$store->logo);
            
            $file = $request->file('logo');
            $filePath = time().'.'.$file->getClientOriginalExtension();
            //Move Uploaded File
            $destinationPath = 'store';
            $file->move($destinationPath,$filePath);
        }else{
            $filePath = $store->logo;
        }

        $store->update([
            'name'=>$request->name,
            'url'=>$request->url,
            'description'=>$request->description,
            'logo'=>$filePath
        ]);

        
        $storeCategory = DB::table('category_store')->where('store_id', $store->id)->get()->toArray();
        foreach($storeCategory as $storCat){
            $store->categories()->detach($storCat);
        }
        
        $store->categories()->attach($request->categories);

       

        notify()->success('Store updated !!!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
