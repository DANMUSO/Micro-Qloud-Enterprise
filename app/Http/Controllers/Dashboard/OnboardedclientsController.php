<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Onboardedclients;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientCreated;
use Illuminate\Support\Str;
use App\Models\Loan;
class OnboardedclientsController extends Controller
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
        $clients = Onboardedclients::get();
        return view('Dashboard.Onboardedclients', compact('clients'));
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
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:onboardedclients,email',
            'phone' => 'required|string||unique:onboardedclients,phone',
            'location' => 'required|string|max:255',
            'shop_name' => 'required|string|max:255',
            'photo' => 'required|file|image|max:2048', // Max 2MB
            'permit' => 'required|file|max:2048', // Max 2MB
            'id_photos.*' => 'required|file|image|max:2048', // Max 2MB per image
        ]);
    
        // Save the filenames
        $photoName = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('photos', $photoName, 'public');
    
        $permitName = $request->file('permit')->getClientOriginalName();
        $request->file('permit')->storeAs('permits', $permitName, 'public');
    
        $idPhotoNames = [];
        if ($request->hasFile('id_photos')) {
            foreach ($request->file('id_photos') as $file) {
                $name = $file->getClientOriginalName();
                $file->storeAs('id_photos', $name, 'public');
                $idPhotoNames[] = $name;
            }
        }
    
        // Generate a random password (you can change this logic as needed)
        $plainPassword = Str::random(12); // You can generate a random string here

        // Hash the password using bcrypt
        $hashedPassword = bcrypt($plainPassword);
        // Save the details to the database
        Onboardedclients::create([
            'full_name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'location' => $validatedData['location'],
            'shop_name' => $validatedData['shop_name'],
            'photo' => $photoName,
            'permit' => $permitName,
            'status' => 1,
            'id_photos' => json_encode($idPhotoNames),
        ]);
        $client = User::create([
            'name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'password' => $hashedPassword,
            'role' =>  '4', //Client ROLE ID
        ]);
    // Send email with the generated password
    Mail::to($client->email)->send(new ClientCreated($client, $plainPassword));
        return response()->json([
            'success' => true,
            'message' => 'Client created successfully!',
            
        ]);
    
    }

    /**
     * Display the specified resource.
     */
    public function showClient(string $id)
    {
        $client = Onboardedclients::with('loans.loanschedule')->find($id);
       
       
        return view('Dashboard.Client',  compact('client'));
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
        // Find the client by ID
        $client = Onboardedclients::find($id);
    
        if (!$client) {
            return response()->json(['success' => false, 'message' => 'Client not found.']);
        }
    
        // Determine action based on request
        $action = $request->action;
    
        // Update client status: 1 for active, 0 for inactive
        $client->status = $action === 'activate' ? 1 : 0;
        $client->save();
    
        // Find user by client's email
        $user = User::withTrashed()->where('email', $client->email)->first();
    
        if ($user) {
            if ($action === 'activate') {
                // Restore user if client is being activated
                $user->restore();
                $message = 'Client and associated user activated successfully.';
            } else {
                // Soft delete user if client is being deactivated
                $user->delete();
                $message = 'Client and associated user deactivated successfully.';
            }
        } else {
            $message = $action === 'activate' 
                ? 'Client activated, but associated user not found.' 
                : 'Client deactivated, but associated user not found.';
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
