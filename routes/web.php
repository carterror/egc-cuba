<?php

use App\Http\Controllers\admin\CardsController;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ReferController;
use App\Http\Controllers\admin\ConfigController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\BuysController;
use App\Http\Controllers\BuysController as ControllersBuysController;
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

require __DIR__.'/auth.php';

Route::prefix('/admin')->middleware(['auth', 'isadmin'])->group(function(){
    
    Route::get('/', [ConfigController::class, 'index'])->name('admin');
    Route::get('/limpia', [ConfigController::class, 'limpia'])->name('limpia');

    Route::get('/cards', [CardsController::class, 'index'])->name('cards');
    Route::get('/cards/create', [CardsController::class, 'create'])->name('cards.create');
    Route::post('/cards/create', [CardsController::class, 'store'])->name('cards.store');
    Route::get('/cards/{id}/edit', [CardsController::class, 'edit'])->name('cards.edit');
    // Route::put('/cards/{id}', [CardsController::class, 'update'])->name('cards.update');
    Route::match(['put', 'patch'], '/cards/{id}', [CardsController::class, 'update'])->name('cards.update');
    Route::get('/cards/{id}/delete', [CardsController::class, 'delete'])->name('cards.delete');

    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::post('/users/{id}/money', [UsersController::class, 'update'])->name('users.money');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UsersController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/delete', [UsersController::class, 'delete'])->name('users.delete');

    Route::get('/buys', [BuysController::class, 'index'])->name('buys');
    Route::get('/buys/find/{id}', [BuysController::class, 'find'])->name('buys.find');
    Route::get('/buys/sid', [BuysController::class, 'sid'])->name('buys.sid');
    Route::post('/buys/search', [BuysController::class, 'search'])->name('buys.search');
    Route::get('/buys/{id}/{action}', [BuysController::class, 'delete'])->name('buys.delete');
    Route::get('/buys/extern/{id}/{action}', [BuysController::class, 'extern'])->name('extern.delete');

    Route::get('/config', [ConfigController::class, 'config'])->name('config');
    Route::post('/config/update', [ConfigController::class, 'store'])->name('config.update');


});

    Route::get('/', function () {
        return redirect('/dashboard');    
    });

    Route::post('/dashboard/search', [IndexController::class, 'search'])->name('buscar');

    Route::get('/dashboard/{search?}', [IndexController::class, 'index'])->name('dashboard');

    Route::get('/referido', [ReferController::class, 'index'])->name('refer')->middleware(['auth', 'verified']);
    Route::get('/referido/{id}/order/', [ReferController::class, 'order'])->name('order')->middleware(['auth', 'verified']);
    
    Route::get('/help', [ReferController::class, 'help'])->name('help');
    Route::get('/termi', [ReferController::class, 'termi'])->name('termi');

    Route::get('/info', [IndexController::class, 'info'])->name('info')->middleware(['auth', 'verified']);
    Route::post('/info/edit', [IndexController::class, 'edit_info'])->name('info.edit')->middleware(['auth', 'verified']);
    Route::post('/info/pass', [IndexController::class, 'edit_pass'])->name('pass.edit')->middleware(['auth', 'verified']);

    Route::get('/register/{id}', [ReferController::class, 'referir'])->name('refer.referir')->middleware('guest');
    Route::post('/register/referido', [ReferController::class, 'store'])->name('refer.store')->middleware('guest');

    Route::get('/card/{id}', [IndexController::class, 'card'])->name('card');

    Route::post('/card/{id}/buy', [IndexController::class, 'buyCard'])->name('buy.card')->middleware(['auth', 'verified', 'iscerrada', 'datos']);

    Route::get('/buy', [ControllersBuysController::class, 'index'])->name('buy')->middleware(['auth', 'verified']);
    Route::get('/buy/{id}', [ControllersBuysController::class, 'cancel'])->name('buy.cancel')->middleware(['auth', 'verified']);
    // Route::get('/buy', [ControllersBuysController::class, 'index'])->name('buy')->middleware(['auth', 'verified']);