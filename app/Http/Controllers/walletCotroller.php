<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;

class walletCotroller extends Controller
{
    public function wallet($username)
    {
        $categories = Categories::whereNull('parent_id')
            ->where('status', 1) // Chỉ lấy danh mục cha đang hoạt động
            ->with([
                'children' => function ($query) {
                    $query->where('status', 1) // Chỉ lấy danh mục con đang hoạt động
                        ->with([
                            'children' => function ($subQuery) {
                                $subQuery->where('status', 1); // Chỉ lấy danh mục cháu đang hoạt động
                            }
                        ]);
                }
            ])->get();
            $listBank = Bank::where('status', 1)->get();   
            $user = User::where('username', $username)->first();
        // return view('client.contents.wallets.cash')->with(['categories' => $categories])->with(['listBank' => $listBank]);
        return view('client.contents.wallets.cash')->with([
            'categories' => $categories,
            'listBank' => $listBank,
            'user' => $user,
        ]);
    }
 
}
