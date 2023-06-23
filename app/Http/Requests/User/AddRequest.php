<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

use App\Consts\UserConsts;
use App\Rules\AlphaDashJp;

class AddRequest extends FormRequest
{
    protected $alphaDashJp;

    public function __construct(AlphaDashJp $alphaDashJp)
    {
        $this->alphaDashJp = $alphaDashJp;
    }

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
            'login_id'  => ['bail', 'required', 'string', $this->alphaDashJp, 'min:' . UserConsts::LOGIN_ID_LENGTH_MIN, 'max:' . UserConsts::LOGIN_ID_LENGTH_MAX, 'unique:users,login_id'],
            'password'  => ['bail', 'required', 'string', $this->alphaDashJp, 'min:' . UserConsts::PASSWORD_LENGTH_MIN, 'max:' . UserConsts::PASSWORD_LENGTH_MAX, 'confirmed'],
            'password_confirmation'  => 'bail|required',
            'user_policy'  => 'bail|required|accepted',
        ];
    }
}
