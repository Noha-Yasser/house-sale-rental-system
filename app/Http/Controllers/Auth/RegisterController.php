<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{


    // عرض صفحة التسجيل
    public function showRegisterForm()
    {
        return view('front.register');
    }

    // معالجة التسجيل
     public function register(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'role' => 'required|in:Customer,Company',
                'email' => 'required|email|unique:customers,email|unique:companies,email',
                'password' => 'required|min:6|confirmed',
                'phone' => 'required',

                'full_name' => 'required_if:role,Customer',
                'birthday' => 'required_if:role,Customer|date',
                'gender' => 'required_if:role,Customer',

                'company_name' => 'required_if:role,Company',
                'description' => 'required_if:role,Company',
                // 'website' => 'required_if:role,Company|url',
            ]);

            // Save data
            if ($request->role == 'Customer') {
                Customer::create([
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                    'birthday' => $request->birthday,
                    'gender' => $request->gender,
                ]);
            } elseif ($request->role == 'Company') {
                Company::create([
                    'company_name' => $request->company_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                    'description' => $request->description,
                    'address' => $request->address,
                    'website' => $request->website,
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Registration successful!',
                'redirect' => route('login.page')
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
