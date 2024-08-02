<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function home()
    {
        $role = Auth::user()->role;
        if ($role == 'merchant') {
            $list_orders = Orders::joinAllOrderMerchant()->where('merchant_id', Auth::id())->get();
            return view('merchant.order.home', [
                'list_orders' => $list_orders
            ]);
        } else {
            $list_orders = Orders::joinAllOrderCustomer()->where('customer_id', Auth::id())->get();
            return view('customer.order.home', [
                'list_orders' => $list_orders
            ]);
        }
    }

    public function add()
    {
        return view('customer.order.add');
    }

    public function process_add(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|string',
            'menu_description' => 'required|string',
            'menu_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'menu_price' => 'required|integer',
        ]);

        if ($request->hasFile('menu_picture')) {
            $image = $request->file('menu_picture');
            $folderPath = 'public/storage/menu_picture';
            $no = 0;
            do {
                $imageName = time() . $no . '.' . $image->getClientOriginalExtension();
                $image->storeAs($folderPath, $imageName);
                $no++;
            } while (Storage::exists($folderPath . '/' . $imageName) != true);
            Orders::create([
                'merchant_id' => Auth::id(),
                'menu_name' => $request->input('menu_name'),
                'menu_description' => $request->input('menu_description'),
                'menu_picture' => $imageName,
                'menu_price' => $request->input('menu_price'),
            ]);

            return redirect()->route('merchant.menu')
                ->with('success', 'Menu created successfully.');
        }
    }
}
