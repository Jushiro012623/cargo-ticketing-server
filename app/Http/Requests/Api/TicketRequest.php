<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'full_name'=> 'required|string|min:8',
            'type_id' => 'required',
        ];
        if ($this->type_id == 1) {
            $rules['fare_id'] = 'required|exists:fares,id';
            $rules['discount'] = 'nullable';
            $rules['additional_fee'] = 'nullable';
        } elseif ($this->type_id == 2) {
            $rules['vehicle_type'] = 'required';
            $rules['plate_number'] = 'required';
            $rules['fare_id'] = 'required|exists:fares,id';
            $rules['weight'] = 'required';
        } elseif ($this->type_id == 3) {
            $rules['cargo_description'] = 'required|min:8';
            $rules['item_name'] = 'required|';
            $rules['quantity'] = 'required|';
            $rules['fare_id'] = 'required|exists:fares,id';
            $rules['weight'] = 'required';
        } else {
            throw new \Exception('Invalid method', 405);
        }
        return $rules;
    }
}
