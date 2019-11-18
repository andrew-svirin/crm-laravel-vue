<?php

namespace App\Http\Resources;

use App\ProjectMember;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProjectMemberResource
 * @mixin ProjectMember
 */
class ProjectMemberResource extends JsonResource
{
    /**
     * {@inheritdoc}
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'project_id' => $this->project_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}