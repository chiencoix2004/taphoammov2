<?php

use App\Http\Controllers\admin\BankController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\ShopsController;
use App\Http\Controllers\admin\TitleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\client\MessengerController;
use App\Http\Controllers\client\PostClientController;
use App\Http\Controllers\client\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\walletCotroller;
use App\Models\Categories;
use App\Models\Shop;
use App\Models\Title;
use Illuminate\Support\Facades\Route;

date_default_timezone_set('Asia/Ho_Chi_Minh'); // Múi giờ Việt Nam

Route::prefix('admin')->as('admin.')
    ->group(function () {

        Route::get('/', function () {
            return view('admin.index');
        })->name('home');

        //danh mục
        Route::prefix('categories')->as('categories.')->group(function () {
            Route::get('listCategory', [CategoriesController::class, 'listCategory'])->name('listCategory');
            Route::get('detailCategory/{slug}', [CategoriesController::class, 'detailCategory'])->name('detailCategory');
            Route::post('updateCategory', [CategoriesController::class, 'updateCategory'])->name('updateCategory');
            Route::post('updateSubCategory', [CategoriesController::class, 'updateSubCategory'])->name('updateSubCategory');
            Route::post('addSubCategory', [CategoriesController::class, 'addSubCategory'])->name('addSubCategory');
            Route::post('addCategory', [CategoriesController::class, 'addCategory'])->name('addCategory');
        });

        //tài khoản
        Route::prefix('users')->as('users.')->group(function () {
            Route::get('listUser', [UsersController::class, 'listUser'])->name('listUser');
            Route::get('detailUser/{username}', [UsersController::class, 'detailUser'])->name('detailUser');
            // Route::get('detailCategory/{slug}', [CategoriesController::class, 'detailCategory'])->name('detailCategory');
            Route::post('updateUser', [UsersController::class, 'updateUser'])->name('updateUser');
            Route::post('addUser', [UsersController::class, 'addUser'])->name('addUser');
            Route::get('searchUser', [UsersController::class, 'searchUser'])->name('searchUser');

            // Route::post('updateSubCategory', [CategoriesController::class, 'updateSubCategory'])->name('updateSubCategory');
            // Route::post('addSubCategory', [CategoriesController::class, 'addSubCategory'])->name('addSubCategory');
            // Route::post('addCategory', [CategoriesController::class, 'addCategory'])->name('addCategory');
        });

        //gian hàng
        Route::prefix('shops')->as('shops.')->group(function () {
            Route::get('listShop1', [ShopsController::class, 'listShop1'])->name('listShop1');
            Route::get('listShopStatus2', [ShopsController::class, 'listShopStatus2'])->name('listShopStatus2');
            Route::get('listShopStatus3', [ShopsController::class, 'listShopStatus3'])->name('listShopStatus3');
            Route::get('detailShop/{slug}/{status}', [ShopsController::class, 'detailShop'])->name('detailShop');
            Route::post('updateStatusShop', [ShopsController::class, 'updateStatusShop'])->name('updateStatusShop');
            // Route::post('updateSubCategory', [CategoriesController::class, 'updateSubCategory'])->name('updateSubCategory');
            // Route::post('addSubCategory', [CategoriesController::class, 'addSubCategory'])->name('addSubCategory');
            // Route::post('addCategory', [CategoriesController::class, 'addCategory'])->name('addCategory');
        });

        //bài viết
        Route::prefix('posts')->as('posts.')->group(function () {
            Route::get('listPost1', [PostController::class, 'listPost1'])->name('listPost1');
            Route::get('listPost2', [PostController::class, 'listPost2'])->name('listPost2');
            // Route::get('listShopStatus3', [ShopsController::class, 'listShopStatus3'])->name('listShopStatus3');
            Route::get('detailPost/{slug}/{status}', [PostController::class, 'detailPost'])->name('detailPost');
            Route::post('updateStatusPost', [PostController::class, 'updateStatusPost'])->name('updateStatusPost');
            Route::delete('delete/{id}', [PostController::class, 'destroy'])->name('delete');
            Route::delete('delete2/{id}', [PostController::class, 'destroy2'])->name('delete2');
            // Route::post('updateSubCategory', [CategoriesController::class, 'updateSubCategory'])->name('updateSubCategory');
            // Route::post('addSubCategory', [CategoriesController::class, 'addSubCategory'])->name('addSubCategory');
            // Route::post('addCategory', [CategoriesController::class, 'addCategory'])->name('addCategory');
        });


        Route::prefix('banks')->as('banks.')->group(function () {
            Route::get('listBank', [BankController::class, 'listBank'])->name('listBank');
            Route::get('detailBank/{id}', [BankController::class, 'detailBank'])->name('detailBank');
            Route::post('updateBank', [BankController::class, 'updateBank'])->name('updateBank');
            Route::post('addBank', [BankController::class, 'addBank'])->name('addBank');
            // Route::post('addSubCategory', [CategoriesController::class, 'addSubCategory'])->name('addSubCategory');
            // Route::post('addCategory', [CategoriesController::class, 'addCategory'])->name('addCategory');
        });

        Route::prefix('transactions')->as('transactions.')->group(function () {
            Route::get('listTransaction', [TransactionController::class, 'listTransaction'])->name('listTransaction');
        });

        Route::prefix('titles')->as('titles.')->group(function () {
            Route::get('title', [TitleController::class, 'title'])->name('title');
            Route::post('updateTitle', [TitleController::class, 'updateTitle'])->name('updateTitle');
        });
    });


Route::get('/', function () {
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

    $titleClient = Title::first();
    // $title = $titleClient->title;
    // $chunks = str_split($title, 20);
    return view('client.index')->with(['categories' => $categories, 'titleClient' => $titleClient]);
})->name('home');

Route::get('listShop/{slug}', function ($slug) {
    // Lấy các danh mục cha và con đang hoạt động
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

    // Tìm danh mục theo slug và lấy kèm danh mục con
    $category = Categories::where('slug', $slug)
        ->with([
            'children' => function ($query) {
                $query->where('status', 1) // Chỉ lấy danh mục con đang hoạt động
                    ->with([
                        'children' => function ($subQuery) {
                            $subQuery->where('status', 1); // Chỉ lấy danh mục cháu đang hoạt động
                        }
                    ]);
            }
        ])
        ->firstOrFail();

    // Lấy danh sách shop thuộc danh mục này và danh mục con
    $shopIds = collect([$category->id])->merge($category->children->pluck('id'))->all();
    $shops = Shop::with('user')
        ->whereIn('id_category', $shopIds) // Lọc shop theo danh mục
        ->where('status', 2) // Lọc shop có trạng thái là 2
        ->get();

    return view('client.contents.products.listproduct', compact('category', 'shops', 'categories'));
})->name('listShop');

Route::get('showLoginForm', [AuthController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('showRegisterForm', [AuthController::class, 'showRegisterForm'])->name('showRegisterForm');
Route::post('register', [AuthController::class, 'register'])->name('register');


// Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgotPasswordForm');
Route::post('forgot-password', [AuthController::class, 'sendResetCode'])->name('forgotPassword');
Route::get('reset-password', [AuthController::class, 'showResetPasswordForm'])->name('showResetPasswordForm');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('resetPassword');
Route::post('verifyResetCode', [AuthController::class, 'verifyResetCode'])->name('verifyResetCode');
Route::get('resetPasswordForm', [AuthController::class, 'resetPasswordForm'])->name('resetPasswordForm');




Route::middleware(['auth'])->group(function () {
    Route::post('updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');
    Route::get('wallet/{username}', [walletCotroller::class, 'wallet'])->name('wallet');



    // Route::get('detailPostUser/{username}', [UserController::class, 'detailUser'])->name('detailUser');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('showAddPost', [PostClientController::class, 'showAddPost'])->name('showAddPost');
    Route::post('addPost', [PostClientController::class, 'addPost'])->name('addPost');
    Route::get('showEditPost/{slug}', [PostClientController::class, 'showEditPost'])->name('showEditPost');
    Route::post('updatePost/{slug}', [PostClientController::class, 'updatePost'])->name('updatePost');

    Route::post('Comment_donate_post', [PostClientController::class, 'Comment_donate_post'])->name('Comment_donate_post');

    // Route::get('messenger', [MessengerController::class, 'messenger'])->name('messenger');
});
Route::middleware('auth')->group(function () {
    // Route::get('messengerAll', [ChatController::class, 'messengerAll'])->name('messengerAll');
    // Route::get('messenger/{user_id}', [ChatController::class, 'messenger'])->name('messenger');
    // Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    // Route::get('/chat/fetch/{user_id}', [ChatController::class, 'fetchMessages'])->name('chat.fetch');


});

Route::middleware('auth')->group(function () {
    Route::get('messengerAll', [ChatController::class, 'messengerAll'])->name('messengerAll');
    Route::get('/messages/{userId}', [ChatController::class, 'fetchMessages'])->name('messages.fetch');
    Route::post('/messages/send', [ChatController::class, 'sendMessage'])->name('chat.send');
});

Route::get('detailUser/{username}', [UserController::class, 'detailUser'])->name('detailUser');



Route::get('listPost', [PostClientController::class, 'listPost'])->name('listPost');
Route::get('detailPost/{slug}', [PostClientController::class, 'detailPost'])->name('detailPost');



Route::fallback(function () {
    // Truy vấn danh mục cha, con, và cháu đang hoạt động
    $categories = Categories::whereNull('parent_id')
        ->where('status', 1)
        ->with([
            'children' => function ($query) {
                $query->where('status', 1)
                    ->with('children', function ($subQuery) {
                        $subQuery->where('status', 1);
                    });
            }
        ])->get();

    // Trả về view 404 với dữ liệu categories
    return response()->view('404', ['categories' => $categories], 404);
});
