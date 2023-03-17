<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudyPostRequest extends FormRequest
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
            'datepicker' => 'required',
            'contents' => 'required',
            'languages' => 'required',
            'hours' => ['required', 'int', 'min:1', 'max:100'],
        ];
    }

    public function messages() 
    {
        return [
            'datepicker.required' => '学習日を入力してください',
            'contents.required' => '学習コンテンツを選択してください',
            'languages.required' => '学習言語を選択してください',
            'hours.required' => '学習時間を入力してください',
            'hours.int' => '数字を入力してください',
            'hours.min' => '1以上の数字を入力してください',
            'hours.max' => '100以下の数字を入力してください',
        ];
    }
}
