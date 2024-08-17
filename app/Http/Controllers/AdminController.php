<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\OrderStatusUpdate;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function getAllOrders()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,in progress,delivered',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.dashboard')->with('status', 'Order status updated successfully!');
    }

    public function communicateWithUser(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $user = $order->user;

        $user->notify(new NewOrderNotification($order));

        return redirect()->route('admin.dashboard')->with('status', 'Message sent to the user successfully!');
    }

    public function dashboard()
    {
        $orders = Order::with('user')->get();
        return view('dashboard', compact('orders'));
    }
}
