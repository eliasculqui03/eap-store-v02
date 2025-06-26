<?php

use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\HomePage;
use App\Livewire\ProductsDetailPage;
use App\Livewire\ProductsPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/categories', CategoriesPage::class)->name('categories');
Route::get('/products', ProductsPage::class)->name('products');
Route::get('/products/{slug}', ProductsDetailPage::class)->name('products.detail');
Route::get('/cart', CartPage::class)->name('cart');
