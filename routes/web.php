<?php

// use for Back-end //
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\promote\CartController;
use App\Http\Controllers\Promote\Order as OrderItems;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// use for Models //

use App\Models\User;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Gallery;
use App\Models\Promotion;
use App\Models\Order as Order;
use App\Models\OrderItem;

// use for Front-end //
use App\Http\Controllers\promote\promote;
use App\Http\Controllers\promote\cart;
use App\Http\Controllers\Promote\Search as PromoteSearch;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route index for frist page //

Route::get('/', function () {
    return view('promote.index');
});


Route::get('createOrderFromQR', [OrderItem::class, 'createOrderFromQR'])->name('order.createOrderFromQR');
Route::get('/order/status/{orderId}/{status}', [OrderItem::class, 'updateStatus'])->name('order.updateStatus');
Route::get('/admin/order/update-status/{orderId}/{status}', [OrderItem::class, 'updateStatus'])->name('order.updateStatus');

Route::prefix('order')->group(function () {
    Route::get('/', [OrderItem::class, 'order'])->name('promote.order');
    Route::post('/insert', [OrderItem::class, 'insert'])->name('order.insert');
    Route::post('/confirm', [OrderItem::class, 'confirm'])->name('order.confirm');
    Route::get('/status/{orderId}/{status}', [OrderItem::class, 'updateStatus'])->name('order.status');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/insert', [CartController::class, 'insertToCart'])->name('cart.insert');
    Route::delete('cart/{menuId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});


Route::get('/menu/{id}', function ($id) {
    $menu = Menu::find($id);

    // ส่งข้อมูลในรูปแบบที่เหมาะสม
    return $menu->category->toArray(); // หรือ
    return response()->json($menu->category);
});

Route::get('/menu/{id}', [MenuController::class, 'show']);

//Route for promote page //
Route::get('/index', [promote::class, 'index'])->name('promote.index');
Route::get('menu', [promote::class, 'menu'])->name('promote.menu');
Route::get('promotion', [promote::class, 'promotion'])->name('promote.promotion');
Route::get('gallery', [promote::class, 'gallery'])->name('promote.gallery');
Route::get('contact', [promote::class, 'contact'])->name('promote.contact');
Route::get('detail', [promote::class, 'detail'])->name('promote.detail');
Route::get('search', [PromoteSearch::class, 'index'])->name('promote.search');
// End Route for promote page //

// promote-w page
Route::get('/index.w', [promote::class, 'indexw'])->name('promote-w.indexw');
Route::get('menu.w', [promote::class, 'menuw'])->name('promote-w.menuw');
Route::get('promotion.w', [promote::class, 'promotionw'])->name('promote-w.promotionw');
Route::get('gallery.w', [promote::class, 'galleryw'])->name('promote-w.galleryw');
Route::get('search.w', [PromoteSearch::class, 'indexw'])->name('promote-w.searchw');
//End Route for promote-w page //

// Authentication Route

require __DIR__ . '/auth.php';

// Route for the home page (redirects to login)

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {

    // Routes for profile setting //
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    // End Route profile setting //

    // Variable admin page //
    Route::get('/', function () {
        return view('.dashboard', [
            'u' => User::all(),
            'c' => Category::all(),
            'm' => Menu::all(),
            'p' => Promotion::all(),
            'g' => Gallery::all(),
            'o' => order::all(),
        ]);
    })->middleware(['auth', 'verified'])->name('dashboard');
    // End Variable admin page //

    // Admin User Routes //
    Route::prefix('user')->group(function () {
        Route::get('admin/user/index', [UserController::class, 'index'])->name('u.index');
    });
    // End Admin User Route //

    // Admin Menu Routes
    Route::prefix('menu')->group(function () {
        Route::get('index', [MenuController::class, 'index'])->name('m.index');
        Route::get('create', [MenuController::class, 'create'])->name('m.create');
        Route::post('insert', [MenuController::class, 'insert'])->name('m.insert');
        Route::get('edit/{id}', [MenuController::class, 'edit'])->name('m.edit');
        Route::post('update/{id}', [MenuController::class, 'update'])->name('m.update');
        Route::get('delete/{id}', [MenuController::class, 'delete']);
    });
    // End Admin Menu Route //

    // Admin Category Routes //
    Route::prefix('category')->group(function () {
        Route::get('index', [CategoryController::class, 'index'])->name('c.index');
        Route::get('create', [CategoryController::class, 'create'])->name('c.create');
        Route::post('insert', [CategoryController::class, 'insert'])->name('c.insert');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('c.edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('c.update');
        Route::get('delete/{id}', [CategoryController::class, 'delete']);
    });
    // End Admin Category Route //

    // Admin Gallery Routes //
    Route::prefix('gallery')->group(function () {
        Route::get('index', [GalleryController::class, 'index'])->name('g.index');
        Route::get('create', [GalleryController::class, 'create'])->name('g.create');
        Route::post('insert', [GalleryController::class, 'insert'])->name('g.insert');
        Route::get('edit/{id}', [GalleryController::class, 'edit'])->name('g.edit');
        Route::post('update/{id}', [GalleryController::class, 'update'])->name('g.update');
        Route::get('delete/{id}', [GalleryController::class, 'delete'])->name('g.delete');
    });
    // End Admin Gallery Route //

    // Admin Promotion Routes //
    Route::prefix('promotion')->group(function () {
        Route::get('index', [PromotionController::class, 'index'])->name('p.index');
        Route::get('create', [PromotionController::class, 'create'])->name('p.create');
        Route::post('insert', [PromotionController::class, 'insert'])->name('p.insert');
        Route::get('edit/{id}', [PromotionController::class, 'edit'])->name('p.edit');
        Route::post('update/{id}', [PromotionController::class, 'update'])->name('p.update');
        Route::get('delete/{id}', [PromotionController::class, 'delete'])->name('p.delete');
    });
    // End Admin Promotion Routes //

    // Admin Order Routes //
    Route::prefix('order')->group(function () {
        Route::get('index', [OrderController::class, 'index'])->name('o.index');
    });
    // End Admin Order Routes //
});
