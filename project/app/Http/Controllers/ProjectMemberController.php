<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectMemberResource;
use App\Models\ProjectMember;

class ProjectMemberController extends Controller
{

    /**
     * Invoice user to the project.
     * @param \App\Http\Requests\ProjectMemberInvoice $request
     * @return array|\Illuminate\Http\JsonResponse|ProjectMemberResource
     */
    public function invoice(\App\Http\Requests\ProjectMemberInvoice $request)
    {
        // Make ProjectMember entity.
        $membership = new ProjectMember();
        $membership->fill([
            'id' => $request->id,
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,
        ]);
        $membership->status = ProjectMember::STATUS_INVOICED;
        $membership->save();
        // Send an email.
        return new ProjectMemberResource($membership);
    }
}
