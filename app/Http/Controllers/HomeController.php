<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Employees;
use App\Models\Companies;
use App\Models\Transactions;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $userName = $user->name;
       
        $role = $user->role; 
        if($role == 2){
              // Get the current date and the date 12 months ago
    $currentMonth = Carbon::now();
    $last12Months = Carbon::now()->subMonths(12);
            // Get the Payments data (status 2) for the last 12 months
    $paymentsv1 = Transactions::selectRaw('sum(amount) as total_amount, MONTH(created_at) as month')
    ->where('status', 4)
    ->whereBetween('created_at', [$last12Months, $currentMonth])
    ->groupBy('month')
    ->pluck('total_amount', 'month');

// Get the Disbursement data (status 4) for the last 12 months
$disbursementsv1 = Transactions::selectRaw('sum(amount) as total_amount, MONTH(created_at) as month')
    ->where('status', 2)
    ->whereBetween('created_at', [$last12Months, $currentMonth])
    ->groupBy('month')
    ->pluck('total_amount', 'month');

// Initialize arrays for Payments and Disbursements data
$paymentData = [];
$disbursementData = [];

// Loop through the last 12 months and populate the data arrays
for ($month = 1; $month <= 12; $month++) {
    $paymentData[] = isset($paymentsv1[$month]) ? $paymentsv1[$month] : 0;
    $disbursementData[] = isset($disbursementsv1[$month]) ? $disbursementsv1[$month] : 0;
}

// Set up the chart labels for the last 12 months
$labels = [
    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
];
            $disbursement = Transactions::select('amount', "profit")->where('status', 2)->get();
            $paid = Transactions::select('amount', "profit")->where('status', 4)->get();
            $olb = Transactions::select('amount', "profit")->where('status', 5)->get();
            Session::put([
                'userName' =>  $userName,
                'disbursement' =>  $disbursement,
                'paid' =>  $paid,
                'olb' =>  $olb,
            ]);
            return view('admin', compact('labels', 'paymentData', 'disbursementData'));
        }else{
            $email = $user->email;
            $employee = Employees::with('company')->where('email', $email)->first();
            $transaction = Transactions::where('employee_id', $employee->id)->latest()->first();
    
            Session::put([
                'userName' =>  $userName,
                'employee' =>  $employee,
                'transaction' =>  $transaction,
            ]);
            return view('home');
        }
      
        
    }
}
