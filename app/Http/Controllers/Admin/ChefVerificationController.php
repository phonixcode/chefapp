<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ChefVerification;
use App\Http\Controllers\Controller;

class ChefVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chefVerifications = ChefVerification::with('user')->paginate(10);
        return view('admin.chef_verifications.index', compact('chefVerifications'));
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
        //
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,rejected',
        ]);
    
        $verification = ChefVerification::findOrFail($id);
        $verification->status = $request->input('status');
        $verification->save();
    
        return redirect()->back()->with('status', 'Verification status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
