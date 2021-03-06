<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreAssetrequest extends FormRequest
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
            'serial_number'  => 'required|string',
            'description'  => 'required|string',
            'fix_or_movable'  => 'required|string',
            'picture_path'  => 'required|mimes:jpg,jpeg,png|max:1000',
            'purchase_date'  => 'required|string',
            'start_use_date'  => 'required|string',
            'purchase_price'  => 'required|numeric',
            'warranty_expire_date'  => 'required|string',
            'degradation_in_years'  => 'required|numeric|',
            'current_value_in_naira'  => 'required|numeric',
            'location'  => 'required|string',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
