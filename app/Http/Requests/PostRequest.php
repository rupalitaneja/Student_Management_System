<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'Sid' => 'required',
            'email' => 'required|email', 
            'name' => 'required|min:4', 
            'number' => 'required', 
            'address' => 'required',
            'class' => 'required', 
            'birth' => 'required',
            'course_id' => 'required',
            'mentor' => 'required'
        ];
    }
}
