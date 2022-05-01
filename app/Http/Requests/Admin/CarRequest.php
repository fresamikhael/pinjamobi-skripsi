<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'name' => 'required|max:50',
            'users_id' => 'required|exists:users,id',
            'categories_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'penalty' => 'required|integer',
            'description' => 'required',
            'status' => 'required|string|in:TERSEDIA,DISEWA',
            'v_regist_number' => 'required|string',
            'colour' => 'required|string|max:30'
        ];
    }
}
