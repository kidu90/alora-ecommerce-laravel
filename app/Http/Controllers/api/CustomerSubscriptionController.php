<?php

namespace App\Http\Controllers\api;

use App\Models\CustomerSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CustomerSubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:subscriptions,plan_id',
            'start_date' => 'required|date',
            'next_delivery_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:active,paused,cancelled',
        ]);

        $subscription = CustomerSubscription::create([
            'user_id' => Auth::id(),
            'plan_id' => $request->plan_id,
            'start_date' => $request->start_date,
            'next_delivery_date' => $request->next_delivery_date,
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'Subscription applied', 'data' => $subscription], 201);
    }


    public function index()
    {
        $subscriptions = CustomerSubscription::where('user_id', Auth::id())->get();
        return response()->json($subscriptions);
    }

    public function apply(Request $request)
    {
        return $this->store($request);
    }

    public function cancel($id)
    {
        $subscription = CustomerSubscription::findOrFail($id);
        if ($subscription->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $subscription->status = 'cancelled';
        $subscription->save();

        return response()->json(['message' => 'Subscription cancelled successfully']);
    }
}
