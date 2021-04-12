<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchHouseRequest extends FormRequest
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
		        'name' => 'nullable | string |max:255',
		        'bedrooms' => 'nullable |integer',
		        'bathrooms' => 'nullable |integer',
		        'storeys' => 'nullable |integer',
		        'garages' => 'nullable |integer',
		        'min_price' => 'nullable|integer ',
		        'max_price' => 'nullable |integer',

        ];
    }
}
