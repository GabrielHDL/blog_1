<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {

        $post = $this->route()->parameter('post');

        $rules = [
            'name' => 'required|min:3|max:100',
            'slug' => 'required|min:3|max:100|unique:posts',
            'status' => 'required|in:1,2',
            'file' => 'image'
        ];

        if($post) {
            $rules['slug'] = 'required|min:3|max:100|unique:posts,slug,'. $post->id;
        }

        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'extract' => 'required|min:3|max:300',
                'body' => 'required|min:3',
                'category_id' => 'required',
                'tags' => 'required',
            ]);
        }

        return $rules;
    }
}
