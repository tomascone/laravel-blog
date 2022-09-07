<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user_id == auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:1,2',
        ];

        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'category_id' => 'required|exists:categories,id',
                'tags' => 'required|exists:tags,id',
                'extract' => 'required',
                'body' => 'required',
            ]);
        }

        return $rules;
    }
}
