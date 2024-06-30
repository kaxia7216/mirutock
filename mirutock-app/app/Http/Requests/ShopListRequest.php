<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'piece' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'piece.required' => '食材の数を入力してください',
            'piece.integer' => '整数を入力してください'
        ];
    }
}
