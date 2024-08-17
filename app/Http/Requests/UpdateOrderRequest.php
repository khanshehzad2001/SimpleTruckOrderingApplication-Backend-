<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'location' => 'sometimes|required|string',
            'destination' => 'sometimes|required|string',
            'no_of_trucks' => 'sometimes|required|integer',
            'type_of_truck' => 'sometimes|nullable|string',
            'company_name' => 'sometimes|nullable|string',
            'cargo_type' => 'sometimes|required|string',
            'cargo_weight' => 'sometimes|nullable|string',
            'pickup_time' => 'sometimes|required|date',
            'delivery_time' => 'sometimes|required|date',
        ];
    }
}
