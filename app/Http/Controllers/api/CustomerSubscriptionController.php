<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\CustomerSubscription;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerSubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:subscriptions,plan_id',
            'start_date' => 'required|date',
        ]);

        $subscription = Subscription::where('plan_id', $request->plan_id)->firstOrFail();
        
        // Calculate next delivery date based on subscription duration
        $startDate = \Carbon\Carbon::parse($request->start_date);
        $nextDeliveryDate = $startDate->copy()->addMonth();

        $customerSubscription = CustomerSubscription::create([
            'subscription_id' => $subscription->id,
            'user_id' => Auth::id(),
            'plan_id' => $request->plan_id,
            'start_date' => $request->start_date,
            'next_delivery_date' => $nextDeliveryDate,
            'status' => 'active'
        ]);

        return response()->json($customerSubscription, 201);
    }

    public function index()
    {
        $subscriptions = CustomerSubscription::with('subscription')
            ->where('user_id', Auth::id())
            ->get();
        
        return response()->json($subscriptions);
    }

    public function show($id)
    {
        $subscription = CustomerSubscription::with('subscription')
            ->where('user_id', Auth::id())
            ->findOrFail($id);
        
        return response()->json($subscription);
    }

    public function update(Request $request, $id)
    {
        $customerSubscription = CustomerSubscription::where('user_id', Auth::id())
            ->findOrFail($id);

        $request->validate([
            'status' => 'required|in:active,paused,cancelled'
        ]);

        $customerSubscription->update($request->only('status'));
        
        return response()->json($customerSubscription);
    }
}