<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{

    public function login(Request $request)                       //--------------------------->log in page auto method
    {

        $input = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('crud')->attempt($input)) {
            $request->session()->regenerate();                         //-------------------------->generate session
            return redirect()->route('crud.dashboard');
        }

        return back()->withErrors(['email' => 'Data not matched with our records.']);
    }


    public function loginpage()                                        //--------------------------->log in page Redirect
    {
        return view('crud.login');
    }



    public function logout()                                           //---------------------------> Redirect-log in page
    {
        Auth::guard('crud')->logout();

        return redirect('/');
    }



    public function authinfo(){

        // dd(Auth::user()->name,Auth::user()->id,Auth::user()->phone);
        return view('crud.authinfo',['authdata' =>Auth::guard('crud')->user()]);

    }




}
