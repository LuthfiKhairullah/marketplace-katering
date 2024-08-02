<?php

namespace App\Http\Controllers;

use App\Models\ProfileMerchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileMerchantController extends Controller
{
    public function edit()
    {
        $id = Auth::id();
        $profile = ProfileMerchant::where('user_id', $id)->get();
        return view('merchant.profile.edit', [
            'profile' => $profile
        ]);
    }

    public function process_edit(Request $request)
    {
        $request->validate([
            'merchant_name' => 'required|string',
            'merchant_address' => 'required|string',
            'merchant_contact' => 'required|string',
            'merchant_description' => 'required|string',
        ]);

        $id = Auth::id();
        $profile = ProfileMerchant::findOrFail($id);
        $data = [
            'merchant_name' => $request->input('merchant_name'),
            'merchant_address' => $request->input('merchant_address'),
            'merchant_contact' => $request->input('merchant_contact'),
            'merchant_description' => $request->input('merchant_description'),
        ];
        $profile->fill($data);
        $profile->save();

        return redirect()->route('profile_merchant.edit')
            ->with('success', 'Profile updated successfully.');
    }
}
