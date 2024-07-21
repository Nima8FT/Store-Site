<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\Admin\Content\FAQController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\Market\GalleryController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\Market\PropertyController;
use App\Http\Controllers\Admin\Market\StoreController;
use App\Http\Controllers\Admin\Notify\EmailController;
use App\Http\Controllers\Admin\Notify\SMSController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\User\CustomerController;
use App\Http\Controllers\Admin\User\PremissionController;
use App\Http\Controllers\Admin\User\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\OrderController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Market\CommentController;
use App\Http\Controllers\Admin\Market\PaymentController;
use App\Http\Controllers\Admin\Market\CategoryController;
use App\Http\Controllers\Admin\Content\CategoryController as ContentCategoryController;
use App\Http\Controllers\Admin\Content\CommentController as ContentCommentController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Market\Discount\CopanController;
use App\Http\Controllers\Admin\Market\Discount\AmazingSaleController;
use App\Http\Controllers\Admin\Market\Discount\CommonDiscountController;


// Admin Route
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');

    //Market
    Route::prefix('market')->as('market.')->group(function () {
        Route::resource('category', CategoryController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('comment', CommentController::class);
        Route::resource('delivery', DeliveryController::class);
        Route::prefix('discount')->group(function () {
            Route::resource('copan', CopanController::class);
            Route::resource('common-discount', CommonDiscountController::class);
            Route::resource('amazing-sale', AmazingSaleController::class);
        });
        Route::prefix('order')->group(function () {
            Route::get('/', [OrderController::class, 'all'])->name('admin.market.order.all');
            Route::get('/new-order', [OrderController::class, 'newOrders'])->name('admin.market.order.newOrders');
            Route::get('/sending', [OrderController::class, 'sending'])->name('admin.market.order.sending');
            Route::get('/unpaid', [OrderController::class, 'unpaid'])->name('admin.market.order.unpaid');
            Route::get('/canceled', [OrderController::class, 'canceled'])->name('admin.market.order.canceled');
            Route::get('/returned', [OrderController::class, 'returned'])->name('admin.market.order.returned');
            Route::get('/show', [OrderController::class, 'show'])->name('admin.market.order.show');
            Route::get('/change-send-status', [OrderController::class, 'changeSendStatus'])->name('admin.market.order.changeSendStatus');
            Route::get('/change-order-status', [OrderController::class, 'changeOrderStatus'])->name('admin.market.order.changeOrderStatus');
            Route::get('/cancel-order', [OrderController::class, 'cancelOrder'])->name('admin.market.order.cancelOrder');
        });
        Route::prefix('payment')->group(function () {
            Route::get('/', [PaymentController::class, 'index'])->name('admin.market.payment.all');
            Route::get('/online', [PaymentController::class, 'online'])->name('admin.market.payment.online');
            Route::get('/offline', [PaymentController::class, 'offline'])->name('admin.market.payment.offline');
            Route::get('/attandance', [PaymentController::class, 'attandance'])->name('admin.market.payment.attandance');
            Route::get('/confirm', [PaymentController::class, 'confirm'])->name('admin.market.payment.confirm');
        });
        Route::resource('/product', ProductController::class);
        Route::resource('/gallery', GalleryController::class);
        Route::resource('/property', PropertyController::class);

        //store
        Route::resource('/store', StoreController::class);
        Route::get('add-to-store', [StoreController::class, 'addToStore'])->name('admin.market.store.addToStore');
    });

    Route::prefix('content')->as('content.')->group(function () {
        Route::resource('category', ContentCategoryController::class);
        Route::resource('comment', ContentCommentController::class);
        Route::resource('faq', FAQController::class);
        Route::resource('menu', MenuController::class);
        Route::resource('page', PageController::class);
        Route::resource('post', PostController::class);
    });

    Route::prefix('user')->as('user.')->group(function () {
        Route::resource('admin-user', AdminUserController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('role', RoleController::class);
        Route::resource('premission', PremissionController::class);
    });

    Route::prefix('notify')->as('notify.')->group(function () {
        Route::resource('email', EmailController::class);
        Route::resource('sms', SMSController::class);
    });

});