<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;

class DiagnosisRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {

        return [
            'diagnosis_name' => 'required|min:5',
            'goal' => 'required',
            'criteria.*' => 'required',
            'major.*' => 'required',
            'minor.*' => 'required',
            'intervention' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'diagnosis_name.required' => 'Diagnosis belum di isi',
            'goal.required' => 'Tujuan belum di isi',
            'criteria.*.required' => 'Kriteria belum di isi',
            'major.*.required' => 'Gejala mayor belum di isi',
            'minor.*.required' => 'Gejala minor belum di isi',
        ];
    }
}
