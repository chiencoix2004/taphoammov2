<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */


    public function boot()
    {
        // Tính tổng tin nhắn chưa đọc và truyền đến view
        View::composer('client.layouts.header', function ($view) {
            $unreadMessagesCount = 0;

            if (auth()->check()) { // Kiểm tra nếu người dùng đã đăng nhập
                $unreadMessagesCount = Message::where('receiver_id', auth()->id())
                    ->where('is_read', 0)
                    ->count();
            }

            $view->with('unreadMessagesCount', $unreadMessagesCount);
        });
    }
}
