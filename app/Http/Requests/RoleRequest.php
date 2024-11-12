<?php

namespace App\Http\Requests;

use App\Models\Role;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        // return Gate::allows('role_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'permissions.*' => [
                'integer',
            ],
            'permissions' => [
                'required',
                'array',
            ],
        ];
    }
}
