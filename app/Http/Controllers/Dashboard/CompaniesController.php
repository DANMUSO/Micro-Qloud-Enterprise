<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Employees;
use App\Models\User;
class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function changeStatus(Request $request)
    {
        $company = Companies::find($request->company_id);

        if (!$company) {
            return response()->json(['success' => false, 'message' => 'Company not found.']);
        }

        // Toggle company status
        $action = $request->action;
        $company->status = $action === 'activate' ? 0 : 1;
        $company->save();

        // Handle employees linked to the company
        $employees = Employees::where('company_id', $company->id)->get();

        foreach ($employees as $employee) {
            $user = User::withTrashed()->where('email', $employee->email)->first();

            if ($user) {
                if ($action === 'activate') {
                    $employee = Employees::find($employee->id);
                    $employee->status = 1;
                    $employee->save();
                    $user->restore();
                } else {
                    $user->delete();
                }
            }
        }

        $message = $action === 'activate' 
            ? 'Company activated and associated users restored successfully.' 
            : 'Company deactivated and associated users soft deleted successfully.';

        return response()->json(['success' => true, 'message' => $message]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all companies from the database
        $companies = Companies::all(); // You can also use paginate() if you want to paginate the results

        // Return the view with the companies data
        return view('Dashboard.Companies', compact('companies'));
 
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
    public function submitCompanyDetails(Request $request)
    {
       // Validate the form input
       $validatedData = $request->validate([
    'company_name' => 'required|unique:companies,company_name|string|max:255', // Ensure unique company name in 'companies' table
        'email' => 'required|unique:companies,email|email|max:255', // Ensure unique email in 'companies' table
        'phone' => 'required|unique:companies,phone|string|max:15', // Ensure unique phone in 'companies' table
        'payroll_date' => 'required|date',
        'staff_count' => 'required|integer|min:1',
    ]);

    // Create a new company record
    $company = new Companies();
    $company->company_name = $validatedData['company_name'];
    $company->email = $validatedData['email'];
    $company->phone = $validatedData['phone'];
    $company->payroll_date = $validatedData['payroll_date'];
    $company->staff_count = $validatedData['staff_count'];
    $company->save();

    // Return a response for Ajax
    return response()->json(['success' => 'Company details saved successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function showStaff(Companies $company)
    {
        // Get all staff members for this company
        $staff = $company->staff;

        // Return a view with the staff data
        return view('Dashboard.employees', compact('company', 'staff'));
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
