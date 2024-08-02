<?php

namespace App\Http\Controllers;

use App\Models\ProfileCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCustomerController extends Controller
{
    public function edit()
    {
        $id = Auth::id();
        $profile = ProfileCustomer::where('user_id', $id)->get();
        return view('customer.profile.edit', [
            'profile' => $profile
        ]);
    }

    public function process_edit(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
        ]);

        $id = Auth::id();
        $profile = ProfileCustomer::findOrFail($id);
        $data = [
            'customer_name' => $request->input('customer_name'),
        ];
        $profile->fill($data);
        $profile->save();
        return redirect()->route('profile_customer.edit')
            ->with('success', 'Profile updated successfully.');
    }
}
