<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsRequestValidate extends FormRequest
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
        $rules = [
            'title' => 'required|min:5|max:100',
            'brief' => 'required|max:512',
            'content' => 'required',
            'published' => 'in:null,1',
            'slug' => 'required|alpha_dash|max:5|unique:news',
            'tags' => 'sometimes',
        ];

        if ($this->news) {
            $rules['slug'] = ['required', 'alpha_dash', 'max:5', Rule::unique('news', 'slug')->ignore($this->news->slug, 'slug')];
        }
        return $rules;
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'published' => $this->publishedFilter($this->published),
            'tags' => $this->tagsFilter($this->tags),
        ]);
    }
    protected function publishedFilter($published)
    {
        $filtered = null;
        if ($published == "on") {
            $filtered = 1;
        }
        return $filtered;
    }
    protected function tagsFilter($tags)
    {
        $tagsArray = array_filter(array_map('trim', explode(',', $tags)), 'strlen');
        return collect($tagsArray)->keyBy(function ($item) { return $item; });
    }
}