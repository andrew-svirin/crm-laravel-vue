<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Response;

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

   /**
    * Load multiple projects by request criteria.
    * @param Request $request
    * @return \Illuminate\Http\JsonResponse
    */
   public function loadAll(Request $request)
   {
      $page = (int)$request->get('page');
      $size = (int)$request->get('size');
      $filter = (string)$request->get('filter');

      $query = Project::query();
      if ($filter)
      {
         $query->where('status', '=', $filter);
      }
      $count = $query->count();
      $result = [];
      foreach ($query->forPage($page, $size)->orderByDesc('created_at')->get() as $project)
      {
         $result[] = [
            'id' => $project->id,
            'title' => $project->title,
            'status' => $project->status,
            'members' => $project->id,
         ];
      }
      return Response::json($result)->header('X-Total-Count', $count);
   }

}
