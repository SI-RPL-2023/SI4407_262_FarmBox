<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", HomeController::class)->name("welcome");
Route::get("shop", [ShopController::class, "index"])->name("shop.index");
Route::get("shop/{product}", [ShopController::class, "show"])->name(
    "shop.show"
);
Route::get('pages', [PagesController::class, 'index'])->name('pages');
Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::get("cart", [CartController::class, "index"])->name("cart.index");
Route::get("komentar", [KomentarController::class, "index"])->name("komentar");
Route::post("komentar", [KomentarController::class, "store"])->name("komentar.store");

Route::post("cart", [CartController::class, "store"])->name("cart.store");
Route::delete("cart/{cart}", [CartController::class, "destroy"])->name(
    "cart.destroy"
);

Route::get("checkout/{checkout}", [CheckoutController::class, "show"])->name(
    "checkout.index"
);
Route::post("checkout", [CheckoutController::class, "store"])->name(
    "checkout.store"
);

Route::middleware(["role:superadmin"])->group(function () {
    Route::get("/dashboard", DashboardController::class)->name("dashboard");

    // Route For Blog
    Route::resource("admin-blog", AdminBlogController::class);

    //    Route For Product
    Route::resource("products", ProductController::class);
    Route::resource("categories", CategoryController::class);
});

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit"
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update"
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy"
    );


    Route::get('/product/{product}/review', [ReviewController::class, 'index'])->name('review.index');
    Route::post('/product/{product}/review', [ReviewController::class, 'store'])->name('review.store');


    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/add', [WishlistController::class, 'store'])->name('wishlist.add');
});

require __DIR__ . "/auth.php";
