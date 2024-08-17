<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewOrderNotification;
use App\Models\User;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $request->validate([
            'location' => 'required|string',
            'destination' => 'required|string',
            'no_of_trucks' => 'required|integer',
            'cargo_type' => 'required|string',
            'pickup_time' => 'required|date',
            'delivery_time' => 'required|date',
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'location' => $request->location,
            'destination' => $request->destination,
            'no_of_trucks' => $request->no_of_trucks,
            'type_of_truck' => $request->type_of_truck,
            'company_name' => $request->company_name,
            'cargo_type' => $request->cargo_type,
            'cargo_weight' => $request->cargo_weight,
            'pickup_time' => $request->pickup_time,
            'delivery_time' => $request->delivery_time,
            'status' => 'pending',
        ]);

        $admin = User::where('role', 'admin')->first();
        $admin->notify(new NewOrderNotification($order));

        return response()->json($order, 201);
    }

    public function getOrders()
    {
        $orders = Auth::user()->orders;
        return response()->json($orders);
    }
}
