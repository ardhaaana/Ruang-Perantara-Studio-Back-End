<?php

use App\Http\Controllers\API\TransactionController as APITransactionController;
use App\Http\Controllers\API\Transfer_confirmController as APITransfer_confirmController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MyTransactionController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\Transfer_confirmController;
use App\Models\Transaction;
use Carbon\Carbon;

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
Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        
        Route::middleware(['admin'])->group(function () {
    
       Route::resource('product', ProductController::class);
            Route::resource('category', ProductCategoryController::class);
            
            Route::get('/print_all', [PrintController::class, 'printAllReport'])->name('print.all.report');
            Route::get('/invoice/{id}', [PrintController::class, 'printIndividu']);
            
            //Route::get('transfer_confirm', Transfer_confirmController::class);
            
            Route::resource('transfer_confirm', Transfer_confirmController::class)->only([
                'index'
            ]);
            Route::resource('product.gallery', ProductGalleryController::class)->shallow()->only([
                'index', 'create', 'store', 'destroy'
            ]);
            Route::resource('transaction', TransactionController::class)->only([
                'index', 'show', 'edit', 'update'
            ]);

            Route::resource('user', UserController::class)->only([
                'index', 'edit', 'update', 'destroy'
            ]);
        });

                    
    });
    
});

  