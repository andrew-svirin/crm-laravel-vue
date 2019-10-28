<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectMemberResource;
use App\ProjectMember;
use Illuminate\Http\Request;

class ProjectMemberController extends Controller
{

   /**
    * Invoice user to the project.
    * @param Request $request
    * @return array|\Illuminate\Http\JsonResponse|ProjectMemberResource
    */
   public function invoice(Request $request)
   {
      // Make ProjectMember entity.
      $membership = ProjectMember::create([
         'id' => $request->get('id'),
         'user_id' => $request->get('user_id'),
         'project_id' => $request->get('project_id'),
      ]);
      $membership->status = 'Invoiced';
      $membership->save();
      // Send an email.
      return new ProjectMemberResource($membership);
   }
}
