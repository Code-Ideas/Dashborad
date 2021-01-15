<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function loginForm()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email|exists:admins',
            'password' => 'required|min:6'
        ]);
        if (auth()->guard('admin')->attempt($request->only(['email', 'password']), $request->get('remember'))) {
            return redirect()->route('admin.dashboard')->with('success', 'تم تسجيل الدخول');
        } else {
            return redirect()->back()->with('error', 'البيانات المدخلة غير صحيحة');
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect()->route('login_form');
    }
}
