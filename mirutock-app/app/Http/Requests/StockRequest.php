<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:12',
            'select-type' => 'required',
            'piece' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '食材の名前を入力してください',
            'name.max' => '半角12文字以内で入力してください',
            'select-type.required' => '保存方法を選択してください',
            'piece.required' => '食材の数を入力してください',
            'piece.integer' => '整数を入力してください'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()) {
                // エラーメッセージが存在する場合にセッションにエラー情報を格納
                session()->flash('edit_mode', $this->isMethod('put'));
                session()->flash('model_id', $this->route('stockId'));
            }
        });
    }
}
