<?php

namespace App\Http\Controllers;

use App\Models\DetailOrders;
use App\Models\Menu;
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
        $list_menu = Menu::all();
        return view('customer.order.add', [
            'list_menu' => $list_menu
        ]);
    }

    public function process_add(Request $request)
    {
        $request->validate([
            'order_delivery_date' => 'required|string',
        ]);

        $order = Orders::create([
            'customer_id' => Auth::id(),
            'merchant_id' => $request->input('merchant_id'),
            'order_invoice' => date('YmdHis'),
            'order_delivery_date' => $request->input('order_delivery_date'),
        ]);

        for ($i = 0; $i < count($request->input('detail_order_name')); $i++) {
            DetailOrders::create([
                'order_id' => $order->id,
                'detail_order_name' => $request->input('detail_order_name')[$i],
                'detail_order_qty' => $request->input('detail_order_qty')[$i],
                'detail_order_price' => $request->input('detail_order_price')[$i],
                'detail_order_total_price' => $request->input('detail_order_total_price')[$i],
            ]);
        }

        return redirect()->route('order.edit')
            ->with('success', 'Profile updated successfully.');
    }
}
