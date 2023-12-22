<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontuser;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class FrontUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('role_or_permission:FrontUser access|FrontUser create|FrontUser edit|FrontUser delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:FrontUser create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:FrontUser edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:FrontUser delete', ['only' => ['destroy']]);
    } 



    public function index()
    {
        $frontuser = Frontuser::paginate(10);
        return view('setting.front-user.index',['users' => $frontuser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.front-user.new');
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
            'email' => 'required|email|unique:users',
            'password'=>'required|confirmed'
        ]);
        $user = Frontuser::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
        ]);
        notify()->success('Front User created !!!');

        //return redirect()->back()->withSuccess('Front User created !!!');
        //return redirect()->to('/admin/front-users');
        return redirect('admin/front-users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Frontuser::find($id);
        //dd($user);
        return view('setting.front-user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:frontusers,email,'.$id.',id',
        ]);

        if($request->password != null){
            $request->validate([
                'password' => 'required|confirmed'
            ]);
            $validated['password'] = bcrypt($request->password);
        }

        //$user->update($validated);
        $user = Frontuser::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        notify()->success('User updated !!!');

        //return redirect()->back()->withSuccess('User updated !!!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Frontuser::find($id)->delete();
        notify()->success('User deleted !!!');
        //return redirect()->back()->withSuccess('Post deleted !!!');
        return redirect()->back();
    }
}
