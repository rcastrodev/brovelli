<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $args = [
            'order'         => 'nullable',
            'name'          => 'required',
            'description'   => 'required',
        ];

        if($this->id)
            $args['img']   = 'nullable';
        else
            $args['img']   = 'required';
        
            
        return $args;
    }

    public function messages()
    {
        return [
            'name.required'         => 'El nombre es obligatorio',
            'description.required'  => 'Contenido es obligatorio',
            'img.required'          => 'Imagen hero es requerida',
        ];
    }
}


