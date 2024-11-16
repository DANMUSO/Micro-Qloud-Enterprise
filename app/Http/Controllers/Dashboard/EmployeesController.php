<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Companies;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeeCreated;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class EmployeesController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone_no' => 'required|string|max:15',
            'amount' => 'required|numeric',
            'company_id' => 'required|exists:companies,id', // Ensure company_id exists in companies table
            'status' => 'nullable|integer|in:0,1', // Optional status field
        ]);
// Generate a random password (you can change this logic as needed)
$plainPassword = Str::random(12); // You can generate a random string here

// Hash the password using bcrypt
$hashedPassword = bcrypt($plainPassword);
        // Create a new employee
        $employee = Employees::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'amount' => $request->amount,
            'company_id' => $request->company_id,
            'status' => $request->status ?? 0,
        ]);
        $employee = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
            'role' =>  0,
        ]);
        // Send email with the generated password
        Mail::to($employee->email)->send(new EmployeeCreated($employee, $plainPassword));
        // Return a success response
        return response()->json(['success' => 'Employee added successfully.']);
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
    public function update($id, Request $request)
    {
        // Find the employee by ID
        $employee = Employees::find($id);
    
        if (!$employee) {
            return response()->json(['success' => false, 'message' => 'Employee not found.']);
        }
    
        // Determine action based on request
        $action = $request->action;
    
        // Update employee status: 0 for active, 1 for inactive
        $employee->status = $action === 'activate' ? 0 : 1;
        $employee->save();
    
        // Find user by employee's email
        $user = User::withTrashed()->where('email', $employee->email)->first();
    
        if ($user) {
            if ($action === 'activate') {
                // Restore user if employee is being activated
                $user->restore();
                $message = 'Employee and associated user activated successfully.';
            } else {
                // Soft delete user if employee is being deactivated
                $user->delete();
                $message = 'Employee and associated user deactivated successfully.';
            }
        } else {
            $message = $action === 'activate' 
                ? 'Employee activated, but associated user not found.' 
                : 'Employee deactivated, but associated user not found.';
        }
    
        return response()->json(['success' => true, 'message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
