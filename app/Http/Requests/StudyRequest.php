<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudyRequest extends FormRequest
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
            'description'=>'required',
            'date_init'=>'required',
            'description'=>'required',
            //'status'=>['require',
            //Rule::in('Finalizado','Em atraso', 'Em andamaneto')]
        ];
    }
    public function messages()
    {
        return [
            'require' => 'Preencha todos os campos',

        ];

    }
}
