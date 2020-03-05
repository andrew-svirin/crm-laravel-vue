<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class CreateProject
 * @property-read string $id
 * @property-read string $title
 * @property-read string|null $description
 * @property-read string|null $status
 */
class ProjectCreate extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string:65000',
            'status' => [
                'nullable',
                Rule::in([Project::STATUS_ON_DEVELOP, Project::STATUS_ON_ESTIMATE, Project::STATUS_ON_HOLD]),
            ],
        ];
    }
}