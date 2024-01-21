<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home-page');
Route::get('/about', [PageController::class, 'about'])->name('about-page');
Route::get('/terms', [PageController::class, 'terms'])->name('terms-page');
Route::get('/policy', [PageController::class, 'policy'])->name('policy-page');
Route::get('/blog', [PageController::class, 'blog'])->name('blog-page');
Route::get('/contact', [PageController::class, 'contact'])->name('contact-page');
Route::get('/faq', [PageController::class, 'faq'])->name('faq-page');
Route::get('/blog', [PageController::class, 'post'])->name('post-page');
Route::get('/blog/{post}', [PageController::class, 'postDetails'])->name('post-details');
Route::get('/service', [PageController::class, 'Services'])->name('service-page');





Route::get('optimize',function (){
    \Illuminate\Support\Facades\Artisan::call('optimize');
    return 1;
});
Route::get('clear',function (){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return 1;
});