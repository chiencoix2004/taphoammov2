<?php

namespace App\Http\Controllers\ManagerShops;

use App\Http\Controllers\Controller;
use App\Models\information_users_shops;
use Illuminate\Http\Request;

class ManagerShopController extends Controller
{  
    public function showRegisterShop() {
        return view('client.shops.registerShop');
    } 

    public function registerShop(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'email' => 'required|email|unique:information_users_shops,email',
            'phone' => 'required|regex:/^[0-9]{10,15}$/|unique:information_users_shops,phone',
            'nameBank' => 'required|string',
            'register_terms' => 'accepted',
        ]);

        // Save the form data to the database
        information_users_shops::create([
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'name_bank' => $validatedData['nameBank'],
            'agreed_terms' => true,
        ]);

        // Redirect with a success message
        // return redirect()->back()->with('success', 'Đăng ký thành công!');
        return redirect()->route('shop.index');
    }

    public function showShop() { 
        return view('client.shops.index');
    }
}
