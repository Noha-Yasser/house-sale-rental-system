<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('front.login');
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required|in:Customer,Company,Admin',
        ]);


        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $role = $request->role;
        $guard = $this->getGuardByRole($role);


        if (Auth::guard($guard)->attempt($credentials, $request->remember)) {

            return $this->redirectByRole($role);
        }


        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }


    private function getGuardByRole($role)
    {
        switch ($role) {
            case 'Admin':
                return 'admin';
            case 'Company':
                return 'company';
            case 'Customer':
                return 'customer';
            default:
                return 'web';
        }
    }


    private function redirectByRole($role)
    {
        switch ($role) {
            case 'Admin':
                return redirect()->route('dashboard.home');
            case 'Company':
                return redirect()->route('company.dashboard');
            case 'Customer':
                return redirect()->route('web.temp');
            default:
                return redirect('/');
        }
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        Auth::guard('company')->logout();
        Auth::guard('customer')->logout();
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
