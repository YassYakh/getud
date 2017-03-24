<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EtudiantRequest extends Request
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
        if (Request::isMethod('put')) {
            return [
            'nom'   => 'required',
            'prenom'   => 'required',
            'age'   => 'required',
            'mail'=>'required|email',
            'M'=>'required'

                ];
        }elseif (Request::isMethod('get')) {
          return [  'search'   => 'required'];
        }

        else{
            return [
            'nom'   => 'required',
            'prenom'   => 'required',
            'age'   => 'required',
            'mail'=>'required|email|unique:etudiants',
            'M'=>'required'
        ];


        }
    }
}
