<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class MessengerController extends Controller
{
   public function messenger()  {
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
    return view('client.contents.messenger.messenger',compact('categories'));
   }
}
