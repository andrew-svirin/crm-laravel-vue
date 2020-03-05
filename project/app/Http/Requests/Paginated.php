<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Paginated
 * @property-read int $page
 * @property-read int $size
 * @property-read string|null $filter
 */
class Paginated extends FormRequest
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
            'page' => 'required|int',
            'size' => 'required|int',
            'filter' => 'nullable|string',
        ];
    }
}