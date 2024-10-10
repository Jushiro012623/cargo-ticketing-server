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
        switch($this->getMethod()){
            case "GET":
                return [
                    'type_id' => 'sometimes|integer|in:1,2,3'
                ];
            case "POST":
                return $this->storeTicketRequest($this->type_id);
            case "PATCH":
                return [
                    'status' => 'sometimes|integer|in:0,1,2,3',
                    'voyage_number' => 'sometimes|string',
                    'payment_method_id' => 'required|string|exists:payment_methods,id',
                    'payment_status' => 'sometimes|integer',
                    'payment_date' => 'sometimes|string',
                ];
            case "PUT":
                return [
                    'status' => 'required|integer',
                    'voyage_number' => 'required|string',
                    'payment_method_id' => 'required|string|exists:payment_methods,id',
                    'payment_status' => 'required|integer',
                ];
            default:
                throw new \InvalidArgumentException('Invalid method', 405);

        }

    }

    public function storeTicketRequest($type_id)
    {
        $rules = [
            'type_id' => 'required|integer|in:1,2,3',
            'vessel_id' => 'required|exists:vessels,id',
            'route_id' => 'required|exists:routes,id',
            'payment_method_id' => 'required|exists:payment_methods,id'
        ];
        switch ($type_id) {
            case 1: // Passenger
                $rules['discount'] = 'required|string';
                $rules['additional'] = 'required|string';
                break;
            case 2: // Rolling Cargo
                $rules['vehicle_type'] = 'required|string';
                $rules['plate_number'] = 'required|string';
                $rules['weight'] = 'required|integer';
                break;
            case 3: // Drop Cargo
                $rules['cargo_description'] = 'required|min:8';
                $rules['item_name'] = 'required|string';
                $rules['quantity'] = 'required|integer';
                $rules['weight'] = 'required|integer';
                break;
            default:
            throw new \InvalidArgumentException('Invalid method', 405);
        }
        return $rules;
    }
}
