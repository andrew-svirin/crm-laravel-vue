<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

   /**
    * Create new project.
    * @param Request $request
    * @return array|\Illuminate\Http\JsonResponse
    */
   public function create(Request $request)
   {
      $project = Project::create([
         'title' => $request->get('title'),
         'description' => $request->get('description') ?? null,
         'status' => $request->get('status') ?? null,
      ]);
      $project->user_id = $request->user()->id;
      $project->save();

      return ['id' => $project->id];
   }

}
