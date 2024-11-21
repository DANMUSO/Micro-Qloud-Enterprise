<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Prospectclients;
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
Route::get('/prospect', function () {
    return view('prospect');
});
Route::post('/FormProspect', function (Request $request) {
 // Validate the incoming request
 $validated = $request->validate([
    'name' => 'required|string|max:255',
    'phone' => 'required|string|max:255|unique:prospectclients,phone',
    'email' => 'required|email|max:255|unique:prospectclients,email',
    'employer_name' => 'required|string|max:255',
    'address' => 'required|string|max:255',
]);

// Create a new prospect record using the validated data
$prospect = Prospectclients::create($validated);

// Return a JSON response
return response()->json([
    'success' => true,
    'message' => 'Prospect created successfully!',
    'data' => $prospect
]);

})->name('FormProspect');

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

