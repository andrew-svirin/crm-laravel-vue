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

   /**
    * Load multiple projects by request criteria.
    * @param Request $request
    * @return array
    */
   public function loadAll(Request $request)
   {
      $page = (int)$request->get('page');
      $size = (int)$request->get('size');
      $projects = Project::forPage($page, $size)->get();
      $result = [];
      foreach ($projects as $project)
      {
         $result[] = [
            'id' => $project->id,
            'title' => $project->title,
            'status' => $project->status,
            'members' => rand(0, 9),
         ];
      }
      return $result;
   }

}
