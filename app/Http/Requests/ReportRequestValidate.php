<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReportRequestValidate extends FormRequest
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
            'posts' => 'sometimes',
            'users' => 'sometimes',
            'news' => 'sometimes',
            'tags' => 'sometimes',
            'comments' => 'sometimes',
        ];
        return $rules;
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'posts' => $this->checkedFilter($this->posts),
            'users' => $this->checkedFilter($this->users),
            'news' => $this->checkedFilter($this->news),
            'tags' => $this->checkedFilter($this->tags),
            'comments' => $this->checkedFilter($this->comments),
        ]);
    }
    protected function checkedFilter($checked)
    {
        $filtered = null;
        if ($checked == "on") {
            $filtered = true;
        }
        return $filtered;
    }
}