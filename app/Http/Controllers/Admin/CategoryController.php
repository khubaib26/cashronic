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
        //$categories = Category::paginate(10);
        $categories = Category::where('parent_id', null)->paginate(10);
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
        $categories = Category::where('parent_id', null)->get();
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


        Category::create(['name'=>$request->name, 'parent_id'=>$request->parent_category]);
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
        $category = Category::find($id);
       
        $categories = Category::where('parent_id', null)->get();
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

        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_category;
        $category->save();
             
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
