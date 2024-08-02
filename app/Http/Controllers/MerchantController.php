<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MerchantController extends Controller
{
    public function menu()
    {
        $list_menu = Menu::where('merchant_id', Auth::id())->get();
        return view('merchant.menu.home', [
            'list_menu' => $list_menu
        ]);
    }

    public function add()
    {
        return view('merchant.menu.add');
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
            Menu::create([
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

    public function edit(string $id)
    {
        $menu = Menu::where('menu_id', $id)->get();
        return view('merchant.menu.edit', [
            'menu' => $menu
        ]);
    }

    public function process_edit(Request $request, string $id)
    {
        $request->validate([
            'menu_name' => 'required|string',
            'menu_description' => 'required|string',
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
            $menu = Menu::findOrFail($id);
            $data = [
                'menu_name' => $request->input('menu_name'),
                'menu_description' => $request->input('menu_description'),
                'menu_picture' => 'public/images' . $imageName,
                'menu_price' => $request->input('menu_price'),
            ];
            $menu->fill($data);
            $menu->save();
        } else {
            $menu = Menu::findOrFail($id);
            $data = [
                'menu_name' => $request->input('menu_name'),
                'menu_description' => $request->input('menu_description'),
                'menu_price' => $request->input('menu_price'),
            ];
            $menu->fill($data);
            $menu->save();
        }

        return redirect()->route('merchant.menu')
            ->with('success', 'Menu updated successfully.');
    }

    public function delete(string $id)
    {
        $menu = Menu::findOrFail($id);
        Storage::delete('public/images/' . $menu['menu_picture']);
        $menu->delete();

        return redirect()->route('merchant.menu')
            ->with('success', 'Menu deleted successfully.');
    }
}
