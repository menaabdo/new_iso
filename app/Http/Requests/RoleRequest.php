<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RoleRequest extends FormRequest
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
    public function rules(Request $request)
    {

        if (Request::route()->getName() == 'roles.store') {
            return [
                'name' => ['required', 'string', 'between:3,25', 'unique:roles,name'],
                'description' => ['nullable','string','between:3,25'],
                'permissions' => ['required'],
                'permissions.*' => ['required'],
            ];
        }

        if (Request::route()->getName() == 'roles.update') {
            $id = $request->id;
            return [
                'name' => ['required', 'string', 'between:3,25', 'unique:roles,name,' . $id],
                'description' => ['nullable','string','between:3,25'],
                'permissions' => ['required'],
                'permissions.*' => ['required'],
            ];
        }
    }
}
