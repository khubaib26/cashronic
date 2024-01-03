<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('role_or_permission:Category access|Category create|Category edit|Category delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Category create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Category edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Category delete', ['only' => ['destroy']]);
    } 


    public function index()
    {
        $categories = Category::paginate(10);
        //dd($categories);
        return view('setting.category.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('setting.category.new', ['categories' => $categories]);
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
            'name'=>'required',
        ]);

        if($request->parent_category != ''){
            Subcategory::create([
                'name'  =>  $request->name,
                'category_id' => $request->parent_category
            ]);
        }else{
            Category::create([
                'name'=>$request->name
            ]);
        }

        notify()->success('Category created !!!');
        return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $sid=null)
    {
        
        if($sid != ''){
            $category = Subcategory::find($sid);
        }else{
            $category = Category::find($id);
        }

        $categories = Category::get();
        return view('setting.category.edit',['category'=>$category, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
        ]);

        if($request->parent_category != ''){
            $subcategory = Subcategory::find($id);
            $subcategory->name = $request->name;
            $subcategory->category_id  = $request->parent_category;
            $subcategory->save();
        }else{
            $category = Category::find($id);
            $category->name = $request->name;
            $category->save();
        }

        notify()->success('Category updated !!!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        notify()->success('Category deleted !!!');
        return redirect()->back();
    }


    public function sub_category_destroy($sid)
    {
        Subcategory::find($sid)->delete();
        notify()->success('Sub Category deleted !!!');
        return redirect()->back();
    }
}
