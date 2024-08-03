<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\Admin\Ticket\TicketAdminController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\Admin\Ticket\TicketPriorityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\RoleController;
use App\Http\Controllers\Admin\Notify\SMSController;
use App\Http\Controllers\Admin\Content\FAQController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\OrderController;
use App\Http\Controllers\Admin\Market\StoreController;
use App\Http\Controllers\Admin\Notify\EmailController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\User\CustomerController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Market\CommentController;
use App\Http\Controllers\Admin\Market\GalleryController;
use App\Http\Controllers\Admin\Market\PaymentController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\Market\CategoryController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Market\PropertyController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\User\PremissionController;
use App\Http\Controllers\Admin\Notify\EmailFileController;
use App\Http\Controllers\Admin\Market\Discount\CopanController;
use App\Http\Controllers\Admin\Market\Discount\AmazingSaleController;
use App\Http\Controllers\Admin\Market\Discount\CommonDiscountController;
use App\Http\Controllers\Admin\Content\CommentController as ContentCommentController;
use App\Http\Controllers\Admin\Content\CategoryController as ContentCategoryController;


// Admin Route
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');

    //Market
    Route::prefix('market')->as('market.')->group(function () {
        Route::resource('category', CategoryController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('comment', CommentController::class);
        Route::resource('delivery', DeliveryController::class);
        Route::get('/delivery/status/{delivery}', [DeliveryController::class, 'status'])->name('delivery.status');
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
        Route::get('/category/status/{postCategory}', [ContentCategoryController::class, 'status'])->name('category.status');
        Route::resource('comment', ContentCommentController::class);
        Route::get('/comment/status/{comment}', [ContentCommentController::class, 'status'])->name('comment.status');
        Route::get('/comment/approved/{comment}', [ContentCommentController::class, 'approved'])->name('comment.approved');
        Route::post('/comment/answer/{comment}', [ContentCommentController::class, 'answer'])->name('comment.answer');
        Route::resource('faq', FAQController::class);
        Route::get('/faq/status/{faq}', [FAQController::class, 'status'])->name('faq.status');
        Route::resource('menu', MenuController::class);
        Route::get('/menu/status/{menu}', [MenuController::class, 'status'])->name('menu.status');
        Route::resource('page', PageController::class);
        Route::get('/page/status/{page}', [PageController::class, 'status'])->name('page.status');
        Route::resource('post', PostController::class);
        Route::get('/post/status/{post}', [PostController::class, 'status'])->name('post.status');
        Route::get('/post/commentable/{post}', [PostController::class, 'commentable'])->name('post.commentable');
    });

    Route::prefix('user')->as('user.')->group(function () {
        Route::resource('admin-user', AdminUserController::class);
        Route::get('/admin-user/status/{user}', [AdminUserController::class, 'status'])->name('admin-user.status');
        Route::get('/admin-user/activation/{user}', [AdminUserController::class, 'activation'])->name('admin-user.activation');
        Route::resource('customer', CustomerController::class);
        Route::get('/customer/status/{user}', [CustomerController::class, 'status'])->name('customer.status');
        Route::get('/customer/activation/{user}', [CustomerController::class, 'activation'])->name('customer.activation');
        Route::resource('role', RoleController::class);
        Route::get('/permission-form/{role}', [RoleController::class, 'permissionForm'])->name('role.permission-form');
        Route::put('/permission-update/{role}', [RoleController::class, 'permissionUpdate'])->name('role.permission-update');
        Route::resource('premission', PremissionController::class);
    });

    Route::prefix('notify')->as('notify.')->group(function () {
        Route::resource('email', EmailController::class);
        Route::get('/email/status/{mail}', [EmailController::class, 'status'])->name('email.status');
        Route::resource('sms', SMSController::class);
        Route::get('/sms/status/{sms}', [SMSController::class, 'status'])->name('sms.status');
        Route::prefix('email-file')->as('email-file.')->group(function () {
            Route::get('/{mail}', [EmailFileController::class, 'index'])->name('index');
            Route::get('/{mail}/create', [EmailFileController::class, 'create'])->name('create');
            Route::post('/{mail}/store', [EmailFileController::class, 'store'])->name('store');
            Route::get('/edit/{file}', [EmailFileController::class, 'edit'])->name('edit');
            Route::put('/update/{file}', [EmailFileController::class, 'update'])->name('update');
            Route::delete('/destroy/{file}', [EmailFileController::class, 'destroy'])->name('destroy');
            Route::get('/status/{file}', [EmailFileController::class, 'status'])->name('status');
        });
    });

    Route::prefix('ticket')->as('ticket.')->group(function () {
        Route::resource('category', TicketCategoryController::class);
        Route::get('/category/status/{ticket}', [TicketCategoryController::class, 'status'])->name('category.status');
        Route::resource('prioriy', TicketPriorityController::class);
        Route::get('/prioriy/status/{ticket}', [TicketPriorityController::class, 'status'])->name('prioriy.status');
        Route::get('/', [TicketController::class, 'index'])->name('index');
        Route::get('/new-tickets', [TicketController::class, 'newTickets'])->name('newTickets');
        Route::get('/open-tickets', [TicketController::class, 'openTickets'])->name('openTickets');
        Route::get('/close-tickets', [TicketController::class, 'closeTickets'])->name('closeTickets');
        Route::get('/show/{ticket}', [TicketController::class, 'show'])->name('show');
        Route::get('/change/{ticket}', [TicketController::class, 'change'])->name('change');
        Route::post('/answer/{ticket}', [TicketController::class, 'answer'])->name('answer');
        Route::prefix('admin')->as('admin.')->group(function () {
            Route::get('/', [TicketAdminController::class, 'index'])->name('index');
            Route::get('/set/{user}', [TicketAdminController::class, 'set'])->name('set');
        });
    });

    Route::resource('setting', SettingController::class);

});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
