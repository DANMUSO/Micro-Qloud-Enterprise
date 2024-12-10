<?php

use Illuminate\Support\Facades\Route;
if (env('APP_ENV') === 'production') {

    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    \URL::forceScheme('https');
}
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
Route::get('/pendingpayments', [App\Http\Controllers\Dashboard\PendingpaymentController::class, 'index'])->name('pendingpayments');
Route::get('/prospectloanees', [App\Http\Controllers\Dashboard\ProspectloansController::class, 'index'])->name('prospectloanees');
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
Route::get('/companies', [App\Http\Controllers\Dashboard\CompaniesController::class, 'index'])->name('companies');
Route::get('/transactions', [App\Http\Controllers\Dashboard\TransactionsController::class, 'index'])->name('transactions');
Route::get('/utilities', [App\Http\Controllers\Dashboard\UtilitiesController::class, 'index'])->name('utilities');
Route::post('/submit-company', [App\Http\Controllers\Dashboard\CompaniesController::class, 'submitCompanyDetails'])->name('submit.company');
// routes/web.php
Route::get('/declinedtransactions', [App\Http\Controllers\Dashboard\TransactionsController::class, 'declined'])->name('declinedtransactions');
Route::get('/companies/{company}/staff', [App\Http\Controllers\Dashboard\CompaniesController::class, 'showStaff'])->name('companies.staff');
Route::post('employees', [App\Http\Controllers\Dashboard\EmployeesController::class, 'store'])->name('employees.store');
Route::post('/transaction/store', [App\Http\Controllers\Dashboard\TransactionsController::class, 'store'])->name('transaction.store');
Route::post('/loanrequest/status/{id}', [App\Http\Controllers\Dashboard\TransactionsController::class, 'update']);
Route::post('/employee/activation/{id}', [App\Http\Controllers\Dashboard\EmployeesController::class, 'update']);
Route::post('/company/activate-deactivate', [App\Http\Controllers\Dashboard\CompaniesController::class, 'changeStatus'])->name('company.changeStatus');
Route::post('/payment/update', [App\Http\Controllers\Dashboard\TransactionsController::class, 'updatePayment'])->name('payment.update');
Route::post('/transactions/update-status', [App\Http\Controllers\Dashboard\TransactionsController::class, 'updateStatus']);
Route::post('/FormProspect', [App\Http\Controllers\LoanrequestController::class, 'store'])->name('FormProspect');
Route::get('/prospect', [App\Http\Controllers\LoanrequestController::class, 'index'])->name('prospect');
Route::post('/update-payroll-date', [App\Http\Controllers\LoanrequestController::class, 'updatePayrollDate'])->name('update-payroll-date');
Route::post('/submit-client-details', [App\Http\Controllers\Dashboard\OnboardedclientsController::class, 'store'])->name('submit-client-details');
Route::post('/client/activation/{id}', [App\Http\Controllers\Dashboard\OnboardedclientsController::class, 'update']);
Route::get('/client/{id}/loans', [App\Http\Controllers\Dashboard\OnboardedclientsController::class, 'showClient'])->name('client.loans');
Route::post('/loanclient/create', [App\Http\Controllers\Dashboard\LoanController::class, 'createLoan']);
