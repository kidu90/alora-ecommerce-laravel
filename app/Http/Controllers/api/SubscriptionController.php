<?php

namespace App\Http\Controllers\api;

use App\Models\Subscription;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function index()
    {
        return Subscription::all();
    }

    public function show($id)
    {
        return Subscription::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|unique:subscriptions',
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'duration_months' => 'required|integer',
            'is_custom_box' => 'boolean',
        ]);

        return Subscription::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->update($request->all());
        return $subscription;
    }

    public function destroy($id)
    {
        try {
            $subscription = Subscription::find($id);

            if (!$subscription) {
                return response()->json([
                    'message' => 'Subscription not found'
                ], 404);
            }

            $subscription->delete();

            return response()->json([
                'message' => 'Subscription deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting the subscription',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
