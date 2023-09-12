<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    /*バリデーションのルールを記載*/
    public function rules()
    {
        return [
            'post.title' => 'required|string|max:100',
            /*required…文字が入力されていること
            string…文字列であること
            max:100…100文字以内であること*/
            'post.body' => 'required|string|max:4000',
        ];
    }
}
