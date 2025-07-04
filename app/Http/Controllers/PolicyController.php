<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * Display a listing of all policies.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all policies from the database
        $policies = \App\Models\Policy::all();

        // Return as JSON
        return response()->json($policies);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validates the request data
        $validatedData = $request->validate([
            'policy_number' => 'required|unique:policies',
            'customer_name' => 'required|string',
            'premium_amount' => 'required|numeric',
            'status' => 'required|in:active,cancelled,pending',
        ]);

        // Creates a new policy record in the database
        $policy = \App\Models\Policy::create($validatedData);

        // Returns the created policy with 202 status
        return response()->json($policy, 201);
    }

    /**
     * Display the specified policy.
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        // Find the policy or return 404
        $policy = \App\Models\Policy::findOrFail($id);

        return response()->json($policy);
    }

    /**
     * Update the specified policy.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id)
    {
        $policy = \App\Models\Policy::findOrFail($id);

        // Validate input
        $validatedData = $request->validate([
            'policy_number' => 'sometimes|required|unique:policies,policy_number,' . $policy->id,
            'customer_name' => 'sometimes|required|string',
            'premium_amount' => 'sometimes|required|numeric',
            'status' => 'sometimes|required|in:active,cancelled,pending',
        ]);

        // sometimes means only validate if the field is present in the request 

        // Update the policy
        $policy->update($validatedData);

        return response()->json($policy);
    }

    /**
     * Remove the specified policy from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        $policy = \App\Models\Policy::findOrFail($id); // ensures 404 if not found

        $policy->delete();      // removes from DB

        return response()->json(['message' => 'Policy deleted successfully']);
    }
}
