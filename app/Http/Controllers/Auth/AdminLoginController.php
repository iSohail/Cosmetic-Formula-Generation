<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
    public function showRegisterForm()
    {
        return view('auth.admin-register');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    protected function registerAdmin(Request $request)
    {
        if (User::where('email', '=', $request->email)->exists()) {
            return view('error.errors');
        }
        if(Admin::create([
            'id' => $request->admin_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])){
            return redirect()->route('login'); 
        }
        return Redirect::back()->withErrors(['msg', 'Something went wrong!!']);

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
