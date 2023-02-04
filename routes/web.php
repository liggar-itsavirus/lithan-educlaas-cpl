<?php

use App\Http\Livewire\Pages\Admin\AdminIndex;
use App\Http\Livewire\Pages\Admin\AdminManageCafe;
use App\Http\Livewire\Pages\Admin\AdminManageOutlet;
use App\Http\Livewire\Pages\Admin\AdminOrderDetail;
use App\Http\Livewire\Pages\Admin\ManageOrder;
use App\Http\Livewire\Pages\Admin\ManageProduct;
use App\Http\Livewire\Pages\ShowAllProduct as GuestShowAllProduct;
use App\Http\Livewire\Pages\Users\ShippingAddress;
use App\Http\Livewire\Pages\Users\ShoppingCart;
use App\Http\Livewire\Pages\Users\ShowAllProduct as UserShowAllProduct;
use App\Http\Livewire\Pages\Users\UserIndex;
use App\Http\Livewire\Pages\Welcome;
use App\Http\Livewire\Pages\Users\UserAddress;
use App\Http\Livewire\Pages\Users\UserCafe;
use App\Http\Livewire\Pages\Users\UserOrder;
use App\Http\Livewire\Pages\Users\UserOrderDetail;
use App\Http\Livewire\Pages\Users\UserOurStory;
use App\Http\Livewire\Pages\Users\UserOutlet;
use App\Http\Livewire\Pages\Users\UserPayment;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', Welcome::class)->name('landing');
Route::get('/show-all-product/{category}', GuestShowAllProduct::class)->name('show-all-product');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if (Auth::check()) {

        if (Auth::user()->role == 'user') {
            return redirect()->route('user.index');
        } else if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.index');
        }
    }
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:user', 'prefix' => 'user'], function () {
        Route::get('/', UserIndex::class)->name('user.index');
        Route::get('/show-all-product/{category}', UserShowAllProduct::class)->name('user.show-all-product');
        Route::get('/shopping-cart', ShoppingCart::class)->name('user.shopping-cart');
        Route::get('/shipping-address', ShippingAddress::class)->name('user.shipping-address');
        Route::get('/address', UserAddress::class)->name('user.user-address');
        Route::get('/payment', UserPayment::class)->name('user.user-payment');
        Route::get('/order', UserOrder::class)->name('user.user-order');
        Route::get('/order-detail/{id}', UserOrderDetail::class)->name('user.user-order-detail');
        Route::get('/cafe/{menu_category}', UserCafe::class)->name('user.user-cafe');
        Route::get('/outlet', UserOutlet::class)->name('user.user-outlet');
        Route::get('/our-story', UserOurStory::class)->name('user.user-our-story');
    });

    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {
        Route::get('/', AdminIndex::class)->name('admin.index');
        Route::get('/manage-order', ManageOrder::class)->name('admin.manage-order');
        Route::get('/manage-product', ManageProduct::class)->name('admin.manage-product');
        Route::get('/manage-cafe', AdminManageCafe::class)->name('admin.manage-cafe');
        Route::get('/manage-outlet', AdminManageOutlet::class)->name('admin.admin-manage-oulet');
        Route::get('/order-detail/{id}', AdminOrderDetail::class)->name('admin.admin-order-detail');
    });
});
