<?php

use App\Http\Controllers\Auth\MultiAuthController;
use App\Models\Account;
use Illuminate\Support\Facades\Route;

Route::post('/login', [MultiAuthController::class, 'login']);

Route::middleware(['auth:sanctum', 'check.role:' . Account::ROLE_OWNER])->prefix('owner')->group(function () {
    Route::post('/logout', [MultiAuthController::class, 'logout'])->name('owner.logout');
    Route::get('/me', [MultiAuthController::class, 'me'])->name('owner.me');
});

Route::middleware(['auth:sanctum', 'check.role:' . Account::ROLE_ADMIN])->prefix('admin')->group(function () {
    Route::post('/logout', [MultiAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/me', [MultiAuthController::class, 'me'])->name('admin.me');
});

