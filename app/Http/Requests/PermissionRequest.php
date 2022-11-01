<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PermissionRequest extends FormRequest
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
        if (Request::route()->getName() == 'permissions.store') {
            return [
                'name' => ['required', 'string', 'between:3,25', 'unique:permissions,name'],
                'description' => ['nullable','string','between:3,25'],
            ];
        }

        if (Request::route()->getName() == 'permissions.update') {
            $id = $request->id;
            return [
                'name' => ['required', 'string', 'between:3,25', 'unique:permissions,name,' . $id],
                'description' => ['nullable','string','between:3,25'],
            ];
        }
    }
}
