<?php

namespace App\Http\Requests\Currency;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyExchangeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "from" => ['required', 'exists:currencies,code'],
            "to" => ['required', 'exists:currencies,code'],
            "amount" => ['required', 'between:0,9999999']
        ];
    }
}
