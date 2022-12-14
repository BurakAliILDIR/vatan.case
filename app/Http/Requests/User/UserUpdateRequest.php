<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return TRUE;
    }

    public function rules()
    {
        return [
            User::NAME => [ 'required', 'string', 'min:3', 'max:30' ],
        ];
    }
}
