<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;


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

    protected function getValidatorInstance(): Validator
    {
        $this->merge([
            'tags_as_array' => json_decode($this->tags, true),
        ]);

        return parent::getValidatorInstance();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text' => 'required|string|max:300',
            'tags' => 'json|nullable',
            'tags_as_array' => 'array|nullable',
            // max:5が動作していないことに注意
            'tags_as_array.*' => 'array|array:value|max:5',
            'tags_as_array.*.value' => 'string|max:20',
        ];
    }

    public function attributes()
    {
        return [
            'text' => '本文',
            'tags' => 'タグ',
            'tags_as_array.*.value' => 'タグ',
            'tags_as_array.*' => 'タグ',
        ];
    }

    public function passedValidation()
    {
        $tags = collect($this->tags_as_array)
            ->slice(0, 5)
            ->map(function ($tag) {
                return $tag['value'];
            });
        $this->merge([
            'tags' => $tags,
        ]);
    }
}
