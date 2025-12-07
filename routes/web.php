<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardEvidence;
use App\Http\Controllers\DashboardHistoryVerification;
use App\Http\Controllers\DashboardIndikatorController;
use App\Http\Controllers\DashboardInsentive;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardUserManajemenController;
use App\Http\Controllers\DashboardVerificationEvidence;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [PageController::class, 'index'])->name('page.index');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.home.index');
});



Route::get('/dashboard/profile', [DashboardProfileController::class, 'index'])->name('dashboard.profile.index');
Route::put('/dashboard/profile', [DashboardProfileController::class, 'update'])->name('dashboard.profile.update');

Route::get('/dashboard/indikator', [DashboardIndikatorController::class, 'index'])->name('dashboard.indikator.index');

Route::get('/dashboard/user', [DashboardUserManajemenController::class, 'index'])->name('dashboard.user.index');

Route::get('/dashboard/verification', [DashboardVerificationEvidence::class, 'index'])->name('dashboard.verification.index');
Route::get('/dashboard/verification/show', [DashboardVerificationEvidence::class, 'show'])->name('dashboard.verification.show');

Route::get('/dashboard/evidence', [DashboardEvidence::class, 'index'])->name('dashboard.evidence.index');

Route::get('/dashboard/insentive', [DashboardInsentive::class, 'index'])->name('dashboard.insentive.index');
Route::get('/dashboard/insentive/show', [DashboardInsentive::class, 'show'])->name('dashboard.insentive.show');

Route::get('/dashboard/history-verification', [DashboardHistoryVerification::class, 'index'])->name('dashboard.history.verification.index');


require __DIR__.'/auth.php';
