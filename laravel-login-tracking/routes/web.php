<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// เปลี่ยนหน้าแรกเป็นหน้าเข้าสู่ระบบ
Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

// เส้นทางสำหรับโปรไฟล์ผู้ใช้
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// เส้นทางสำหรับการเข้าสู่ระบบ
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// เส้นทางสำหรับหน้าหลักและการติดตามการเข้าสู่ระบบ
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/export/excel', [HomeController::class, 'exportExcel'])->name('export.excel');
    Route::get('/export/pdf', [HomeController::class, 'exportPdf'])->name('export.pdf');
});

// โหลดเส้นทางการรับรองความถูกต้อง
require __DIR__.'/auth.php';
