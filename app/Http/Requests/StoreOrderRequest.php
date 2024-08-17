<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'location' => 'required|string',
            'destination' => 'required|string',
            'no_of_trucks' => 'required|integer',
            'type_of_truck' => 'nullable|string',
            'company_name' => 'nullable|string',
            'cargo_type' => 'required|string',
            'cargo_weight' => 'nullable|string',
            'pickup_time' => 'required|date',
            'delivery_time' => 'required|date',
        ];
    }
}
