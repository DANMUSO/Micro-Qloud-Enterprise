<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prospectclients;
use Illuminate\Support\Facades\Mail;
use App\Mail\onboarding;
use App\Models\Companies;
use Carbon\Carbon;
class LoanrequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('prospect');
    }
    public function updatePayrollDate()
    {
        
        $currentYearMonth = Carbon::now()->format('Y-m'); // Current year and month
        $companies = Companies::all();

        foreach ($companies as $company) {
            $payrollDate = Carbon::parse($company->payroll_date);
            $currentDate = Carbon::now();
            $dateDifference = $currentDate->diffInDays($payrollDate);

            if ($dateDifference > 3 || $dateDifference < -3) {
                // Update payroll_date with current year and month, preserving the day
                $newPayrollDate = Carbon::createFromFormat('Y-m-d', $currentYearMonth . '-' . $payrollDate->format('d'));
                $company->update(['payroll_date' => $newPayrollDate]);
            }
        }

        return response()->json(['status' => 'success', 'message' => 'Payroll dates updated with current year and month.']);
    

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
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
        $name = $request ->name;
        $employer_name = $request ->employer_name;
        Mail::to('kimdan2030@gmail.com')->send(new onboarding($name, $employer_name));
        // Return a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Prospect created successfully!',
            
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
