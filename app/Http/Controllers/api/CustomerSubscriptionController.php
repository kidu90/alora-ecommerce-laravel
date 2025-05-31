<?php

namespace App\Http\Controllers\api;

use App\Models\CustomerSubscription;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CustomerSubscriptionController extends Controller
{
    public function index()
    {
        return CustomerSubscription::with('subscription')->where('user_id', Auth::id())->get();
    }

    public function apply(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
        ]);

        $subscription = Subscription::findOrFail($request->subscription_id);

        $start_date = now();
        $next_delivery = now()->addMonths($subscription->duration_months);

        $existing = CustomerSubscription::where('user_id', Auth::id())
            ->where('subscription_id', $subscription->id)
            ->where('status', 'active')
            ->first();

        if ($existing) {
            return response()->json(['message' => 'You already have an active subscription.'], 400);
        }

        $customerSubscription = CustomerSubscription::create([
            'subscription_id' => $subscription->id,
            'user_id' => Auth::id(),
            'plan_id' => $subscription->plan_id,
            'start_date' => $start_date,
            'next_delivery_date' => $next_delivery,
            'status' => 'active',
        ]);

        return response()->json($customerSubscription, 201);
    }
}
