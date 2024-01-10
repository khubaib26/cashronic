<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Frontuser;

class FrontUserProfileController extends Controller
{
    public function profile()
    {
        return view('front.profile');
    }


    public function userUpdate(Request $request)
    {
    
             $validated = $request->validate([
            'name'=>'required',
            
        ]);

        if($request->password != null){
            $request->validate([
                'password' => 'required'
            ]);
            $validated['password'] = bcrypt($request->password);
        }

        //$user->update($validated);
        $user = Frontuser::find(Auth::guard('front')->user()->id);
        
        $user->name = $request->name;
            if($request->password){
        $user->password = bcrypt($request->password);        
            }
        
        $user->save();
        notify()->success('Profile updated !!!');

        return redirect()->back();
      
    }
}
