@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h2>Truck Orders</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Location</th>
                <th>Destination</th>
                <th>Cargo Type</th>
                <th>No of Trucks</th>
                <th>Type of Truck</th>
                <th>Cargo Weight</th>
                <th>Pickup Time</th>
                <th>Delivery Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->user->email }}</td>
                <td>{{ $order->location }}</td>
                <td>{{ $order->destination }}</td>
                <td>{{ $order->cargo_type }}</td>
                <td>{{ $order->no_of_trucks }}</td>
                <td>{{ $order->type_of_truck ?? 'N/A' }}</td>
                <td>{{ $order->cargo_weight ?? 'N/A' }}</td>
                <td>{{ $order->pickup_time }}</td>
                <td>{{ $order->delivery_time }}</td>
                <td class="status {{ strtolower(str_replace(' ', '-', $order->status)) }}">{{ ucfirst($order->status) }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.updateOrder', $order->id) }}" class="mb-2">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-control">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in progress" {{ $order->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        </select>
                        <input type="submit" value="Update" class="btn btn-primary mt-2">
                    </form>
                    <form method="POST" action="{{ route('admin.communicate', $order->id) }}">
                        @csrf
                        <textarea name="message" placeholder="Message to the user" class="form-control mb-2"></textarea>
                        <input type="submit" value="Send Message" class="btn btn-success">
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="12" class="text-center">No orders found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
