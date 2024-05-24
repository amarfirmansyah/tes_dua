<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UnitController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
   Route::get('/status', [StatusController::class, 'index'])->name('status');
   Route::get('/status/all', [StatusController::class, 'list'])->name('status.get.all');
});

Route::middleware('auth')->prefix('manufacturer')->group(function () {
    Route::get('/', [ManufacturerController::class, 'index'])->name('manufacturer');
    Route::get('/all', [ManufacturerController::class, 'show'])->name('manufacturer.get.all');
});

Route::middleware('auth')->prefix('unit')->group(function () {
   Route::get('/', [UnitController::class, 'index'])->name('unit');
   Route::get('/all', [UnitController::class, 'show'])->name('unit.get.all');
   Route::post('/create', [UnitController::class, 'store'])->name('unit.create');
   Route::patch('/edit/{unit}', [UnitController::class, 'update'])->name('unit.edit');
   Route::post('/delete/{unit}', [UnitController::class, 'destroy'])->name('unit.destroy');
});

Route::middleware('auth')->prefix('category')->group(function () {
   Route::get('/', [CategoryController::class, 'index'])->name('category');
   Route::get('/all', [CategoryController::class, 'list'])->name('category.get.all');
   Route::post('/create', [CategoryController::class, 'store'])->name('category.create');
   Route::post('/delete/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
   Route::patch('/edit/{category}', [CategoryController::class, 'update'])->name('category.edit');
});

Route::middleware('auth')->prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product');
    Route::get('/all', [ProductController::class, 'list'])->name('product.get.all');
    Route::post('/create', [ProductController::class, 'store'])->name('product.create');
    Route::post('/delete/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::patch('/edit/{product}', [ProductController::class, 'update'])->name('product.edit');

    Route::get('/check/condition', [ProductController::class, 'statusCondition']);
    Route::get('/info/diagram', [ProductController::class, 'diagram']);
});

require __DIR__.'/auth.php';
