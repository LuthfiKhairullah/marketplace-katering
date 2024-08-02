<?php

namespace App\Http\Controllers;

use App\Models\ProfileCustomer;
use App\Models\ProfileMerchant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function process_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($login)) {
            return redirect()->route('order.home')
                ->with('success', 'Login Successfully.');
        } else {
            return redirect()->route('auth.login')
                ->with('error', 'Email and password is incorrect.');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function process_register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'type_role' => 'required|string',
        ]);

        $user = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('type_role'),
        ]);

        if ($request->input('type_role') == 'Merchant') {
            ProfileMerchant::create([
                'user_id' => $user->id,
                'merchant_name' => $request->input('name'),
            ]);
        } else if ($request->input('type_role') == 'Customer') {
            ProfileCustomer::create([
                'user_id' => $user->id,
                'customer_name' => $request->input('name'),
            ]);
        }

        return redirect()->route('auth.login')
            ->with('success', 'Account created successfully.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login')
            ->with('success', 'Account logout successfully.');
    }
}
