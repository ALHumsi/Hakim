<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view("Admin.auth.login");
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            "email" => 'required|email',
            "password" => "required|min:6|max:12"
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if(!$admin){
            return back()->with('fail', 'we do not recognize your email address');
        } else {
            //check password
            if(Hash::check($request->password, $admin->password)){
                $request->session()->put('LoggedUser', $admin->id);
                return redirect('/admin');
            } else{
                return back()->with('fail', 'Incorrect Password');
            }
        }
    }
}
