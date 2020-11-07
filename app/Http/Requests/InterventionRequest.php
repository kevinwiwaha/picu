<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterventionRequest extends FormRequest
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
            'intervention_name' => 'required',
            'definition' => 'required',
            'observasi.*' => 'required',
            'terapeutik.*' => 'required',
            'edukasi.*' => 'required',
            'kolaborasi.*' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'intervention_name.required' => 'Nama intervensi belum di isi',
            'definition.required' => 'Definisi belum di isi',
            'observasi.*.required' => 'Observasi belum diisi',

        ];
    }
}
