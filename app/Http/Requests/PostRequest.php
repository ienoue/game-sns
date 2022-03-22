<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PostRequest extends FormRequest
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
            'text' => 'required|max:300',
            'tags' => 'json|regex:/^[^\s\/]+$/u|nullable|max:20'
        ];
    }

    public function attributes()
    {
        return [
            'text' => '本文',
            'tags' => 'タグ'
        ];
    }

    public function passedValidation()
    {
        $tags = collect(json_decode($this->tags))
            ->slice(0, 5)
            ->map(function ($tag) {
                return $tag->value;
            });
        $this->merge([
            'tags' => $tags,
        ]);
    }
}
