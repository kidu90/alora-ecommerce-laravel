<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return response()->json($subscriptions);
    }

    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);
        return response()->json($subscription);
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|string|unique:subscriptions',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration_months' => 'required|integer|min:1',
            'is_custom_box' => 'boolean'
        ]);

        $subscription = Subscription::create($request->all());
        return response()->json($subscription, 201);
    }

    public function update(Request $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        
        $request->validate([
            'plan_id' => 'required|string|unique:subscriptions,plan_id,' . $subscription->id,
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration_months' => 'required|integer|min:1',
            'is_custom_box' => 'boolean'
        ]);

        $subscription->update($request->all());
        return response()->json($subscription);
    }

    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return response()->json(null, 204);
    }
}