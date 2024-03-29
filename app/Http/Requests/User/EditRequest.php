<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

use App\Consts\UserConsts;

class EditRequest extends FormRequest
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
            //
            'name' => 'bail|required|string|min:' . UserConsts::NAME_LENGTH_MIN . '|max:' . UserConsts::NAME_LENGTH_MAX . '|unique:users,name',
        ];
    }
}
