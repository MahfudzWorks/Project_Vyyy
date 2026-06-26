<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {

        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            return view('admin.dashboard');
        }

        return view('customer.dashboard');
    })->name('dashboard');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard')
        ->middleware('auth');

    // ADMIN ONLY
    Route::prefix('admin')->group(function () {

        // Users
        Route::get('/users', [UserController::class, 'index'])
            ->name('admin.users.index');

        Route::get('/users/create', [UserController::class, 'create'])
            ->name('admin.users.create');

        Route::post('/users', [UserController::class, 'store'])
            ->name('admin.users.store');

        Route::get('/users/{user}/edit', [UserController::class, 'edit'])
            ->name('admin.users.edit');

        Route::put('/users/{user}', [UserController::class, 'update'])
            ->name('admin.users.update');

        Route::delete('/users/{user}', [UserController::class, 'destroy'])
            ->name('admin.users.destroy');

        // Orders
        Route::get('/orders', [OrderController::class, 'index'])
            ->name('admin.orders.index');

        // FAQ
        Route::get('/faq', [FaqController::class, 'index'])
            ->name('admin.faq.index');

        Route::get('/faq/create', [FaqController::class, 'create'])
            ->name('admin.faq.create');

        Route::post('/faq', [FaqController::class, 'store'])
            ->name('admin.faq.store');

        Route::get('/faq/{faq}/edit', [FaqController::class, 'edit'])
            ->name('admin.faq.edit');

        Route::put('/faq/{faq}', [FaqController::class, 'update'])
            ->name('admin.faq.update');

        Route::delete('/faq/{faq}', [FaqController::class, 'destroy'])
            ->name('admin.faq.destroy');

        // Testimonial
        Route::get('/testimonial', [TestimonialController::class, 'index'])
            ->name('admin.testimonial.index');

        Route::get('/testimonial/create', [TestimonialController::class, 'create'])
            ->name('admin.testimonial.create');

        Route::post('/testimonial', [TestimonialController::class, 'store'])
            ->name('admin.testimonial.store');

        Route::get('/testimonial/{testimonial}/edit', [TestimonialController::class, 'edit'])
            ->name('admin.testimonial.edit');

        Route::put('/testimonial/{testimonial}', [TestimonialController::class, 'update'])
            ->name('admin.testimonial.update');

        Route::delete('/testimonial/{testimonial}', [TestimonialController::class, 'destroy'])
            ->name('admin.testimonial.destroy');
    });
});

require __DIR__ . '/auth.php';
