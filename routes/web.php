<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Frontend\DetailCategoryController;
use App\Http\Controllers\Frontend\DetailProductController;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\SuperAdmin\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// VIEW HOMEPAGE
Route::resource('/', HomepageController::class);

// VIEW CATEGORY
/*Route::resource('view-category',DetailCategoryController::class);*/
Route::get('view-category/{slug}', [DetailCategoryController::class,'index']);

// VIEW PRODUCT
Route::get('detail/{id}/{slug}', [DetailProductController::class,'index']);
Route::get('product-list',[ProductController::class,'productListAjax']);
Route::post('searchProduct',[ProductController::class,'searchProduct']);

// VIEW CART
Route::post('/add-to-cart',[CartController::class,'addProductToCart'])->name('addToCart');
Route::get('/load-cart-data',[CartController::class,'cartCount'])->name('cartCount');

Route::group(['middleware' => 'admin'], function (){
    Route::resource('admin/dashboard', AdminController::class);
    //    Produk
    Route::resource('products', ProductController::class);
    Route::delete('selected-products', [ProductController::class, 'deleteSelectedItem'])->name('products.deleteSelectedProduct');
    Route::delete('products/{id}', [ProductController::class, 'destroy']);
    Route::get('products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('update-products/{id}', [ProductController::class, 'update']);
    Route::post('products/media', [ProductController::class,'storeMedia'])->name('products.storeMedia');
    Route::post('dropzone', [ProductController::class,'dropzone'])->name('dropzone');
    //    Kategori
    Route::resource('category', CategoryController::class);
    Route::delete('selected-category', [CategoryController::class, 'deleteSelectedItem'])->name('category.deleteSelectedCategory');
    Route::delete('category/{id}', [CategoryController::class, 'destroy']);
    Route::get('category/edit/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    //    Carousel
    Route::resource('carousel', CarouselController::class);
    Route::delete('selected-carousel', [CarouselController::class, 'deleteSelectedItem'])->name('carousel.deleteSelectedCarousel');
    Route::delete('carousel/{id}', [CarouselController::class, 'destroy']);
    Route::get('carousel/edit/{id}', [CarouselController::class, 'edit']);
    Route::put('update-carousel/{id}', [CarouselController::class, 'update']);
    //    Transaksi
    Route::resource('transaction', TransactionController::class);
    Route::get('transaction/detail/{id}', [TransactionController::class,'detailTrans'])->name('detailTrans');
    Route::post('update-status-transaksi/{id}', [TransactionController::class,'updateTrans'])->name('updateStatusTrans');
    Route::get('transaction-confirmed', [TransactionController::class,'confirmedTrans'])->name('confirmedTrans');
    Route::get('transaction-rejected', [TransactionController::class,'rejectedTrans'])->name('rejectedTrans');
    //     Pengguna
    Route::resource('users', UsersController::class);
    Route::post('update-level-user/{id}', [UsersController::class,'updateUser'])->name('updateUser');
/*    Route::post('delete-user/{id}', [UsersController::class,'deleteUser'])->name('deleteUser');*/
});

Route::group(['middleware' => 'customer'], function (){
    Route::resource('customer/account', CustomerController::class);
    //    Order
    Route::get('order', [OrderController::class,'myOrder'])->name('myOrder');
    Route::get('order/detail/{id}', [OrderController::class,'detailOrder'])->name('detailOrder');
    //    Cart
    Route::resource('cart', CartController::class);
    Route::post('delete-cart-item',[CartController::class,'deleteProduct']);
    Route::put('update-cart-item',[CartController::class,'updateProduct']);
    //    Checkout
    Route::resource('checkout', CheckoutController::class);
    //    Buy
    Route::get('direct-buy/{id}', [CheckoutController::class,'buyDirect'])->name('buyDirect');
    //    Order
});

