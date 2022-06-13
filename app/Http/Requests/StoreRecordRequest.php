<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'principal_id' => 'required|exists:principals,id|string',
            'start' => 'required|string',
            'to' => 'required|string',
            'no_of_pillars' => 'required|integer',
            'plan_no' => 'required|string',
            'location' => 'required|string|max:100',
            'lga_id' => 'required|exists:lgas,id|string',
            'unit_price_id' => 'required|exists:unit_prices,id|string',
            'payment_mode_id' => 'required|exists:payment_modes,id|string',
            'quarter_id' => 'required|exists:quarters,id|string',
            'type_id' => 'required|exists:types,id|string',
        ];
    }
}
