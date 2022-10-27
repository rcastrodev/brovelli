<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
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
            'order'         => 'nullable|min:2|max:2',
            'content_1'     => 'nullable',
        ];

        // Slider Home
        
        if($this->section_id == 1 and !isset($this->id)){
            $args['image'] = 'mimes:jpeg,bmp,png|dimensions:min_width=1290,min_height=390|required';
        }
            
        return $args;
    }

    public function messages()
    {
        return [
            'order.min'         => 'Orden solo puede tener dos caracteres',
            'order.max'         => 'Orden solo puede tener dos caracteres',
            'image.required'    => 'La imagen es obligatoria',
            'image.mimes'       => 'Solo se aceptan imágenes en formato jpeg,bmp y png',
            'image.dimensions'  => 'Solo se aceptan imágenes con dimensiones mayores a 1290px por 390px',
        ];
    }
}
