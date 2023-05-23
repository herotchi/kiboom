<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

use App\Consts\PostConsts;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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
            'id' => ['bail', 'required', 'integer', Rule::exists('posts')->where('user_id', Auth::user()->id)],
            'point' => 'bail|required|integer|min:' . PostConsts::POINT_RANGE_MIN . '|max:' . PostConsts::POINT_RANGE_MAX,
            'weather' => ['bail', 'required', 'integer', Rule::in(array_keys(PostConsts::WEATHER_LIST))],
            'walk_flg' => ['bail', 'required', 'integer', Rule::in(array_keys(PostConsts::WALK_FLG_LIST))],
            'diary_1' => 'bail|required|string|min:' . PostConsts::DIARY_LENGTH_MIN . '|max:' . PostConsts::DIARY_LENGTH_MAX,
            'diary_2' => 'bail|nullable|string|min:' . PostConsts::DIARY_LENGTH_MIN . '|max:' . PostConsts::DIARY_LENGTH_MAX,
            'diary_3' => 'bail|nullable|string|min:' . PostConsts::DIARY_LENGTH_MIN . '|max:' . PostConsts::DIARY_LENGTH_MAX,
            'others' => 'bail|nullable|string|max:' . PostConsts::OTHERS_LENGTH_MAX,
        ];
    }
}
