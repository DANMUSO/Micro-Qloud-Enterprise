<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/disbursements', [App\Http\Controllers\Dashboard\DisbursementsController::class, 'index'])->name('disbursement');
Route::get('/repayments', [App\Http\Controllers\Dashboard\RepaymentsController::class, 'index'])->name('repayments');
Route::get('/loanrequests', [App\Http\Controllers\Dashboard\LoanrequestsController::class, 'index'])->name('loanrequests');
Route::get('/pendingpayments', [App\Http\Controllers\Dashboard\PendingpaymentsController::class, 'index'])->name('pendingpayments');
Route::get('/prospectloanees', [App\Http\Controllers\Dashboard\ProspectloaneesController::class, 'index'])->name('prospectloanees');
Route::get('/activeloanees', [App\Http\Controllers\Dashboard\ActiveloaneesController::class, 'index'])->name('activeloanees');
Route::get('/inactiveloanees', [App\Http\Controllers\Dashboard\InactiveloaneesController::class, 'index'])->name('inactiveloanees');
Route::get('/onboardedclients', [App\Http\Controllers\Dashboard\OnboardedclientsController::class, 'index'])->name('onboardedclients');
Route::get('/activeclients', [App\Http\Controllers\Dashboard\ActiveclientsController::class, 'index'])->name('activeclients');
Route::get('/inactiveclients', [App\Http\Controllers\Dashboard\InactiveclientsController::class, 'index'])->name('inactiveclients');
Route::get('/prospectclients', [App\Http\Controllers\Dashboard\ProspectclientsController::class, 'index'])->name('prospectclients');
Route::get('/systemusers', [App\Http\Controllers\Dashboard\SystemusersController::class, 'index'])->name('systemusers');
Route::get('/roles', [App\Http\Controllers\Dashboard\RolesController::class, 'index'])->name('roles');
Route::get('/departments', [App\Http\Controllers\Dashboard\DepartmentsController::class, 'index'])->name('departments');
Route::get('/branches', [App\Http\Controllers\Dashboard\BranchesController::class, 'index'])->name('branches');
Route::get('/products', [App\Http\Controllers\Dashboard\ProductsController::class, 'index'])->name('products');
