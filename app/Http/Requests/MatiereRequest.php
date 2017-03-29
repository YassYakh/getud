<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MatiereRequest extends Request
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
            'Nom'       => 'required',
            'id_prof'   => 'required'
        ];
       }elseif (Request::isMethod('get')) {
          return [  'search'   => 'required',
                    'note'=>'required'
                    ];
        } else {
           return [
            'Nom'       => 'required|unique:matieres',
            'id_prof'   => 'required'
        ];
       }
       
       
    }
}
