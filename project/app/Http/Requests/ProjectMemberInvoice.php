<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ProjectMemberInvoice
 * @property-read string $id
 * @property-read string $user_id
 * @property-read string $project_id
 */
class ProjectMemberInvoice extends FormRequest
{
    /**
     * {@inheritdoc}
     */
    public function authorize()
    {
        return \Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|uuid',
            'user_id' => 'required|uuid',
            'project_id' => 'required|uuid',
        ];
    }
}