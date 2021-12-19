<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
        $curso = $this->route()->parameter('curso');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:cursos',
            'status' => 'required|in:1,2',
            'file' => 'image|required'
        ];
        if($curso){
            $rules['slug'] = 'required|unique:cursos,slug,'. $curso->id;
        }
        if($this->status == 2){
            $rules = array_merge($rules,[
                'category_id' => 'required',
                'extract' => 'required',
                'body' => 'required',
            ]);
        }
        return $rules;
    }
}
