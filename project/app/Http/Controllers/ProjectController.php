<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

   /**
    * Create new project.
    * @param Request $request
    * @return array|\Illuminate\Http\JsonResponse|ProjectResource
    */
   public function create(Request $request)
   {
      $project = Project::create([
         'id' => $request->get('id'),
         'title' => $request->get('title'),
         'description' => $request->get('description') ?? null,
         'status' => $request->get('status') ?? null,
      ]);
      $project->user_id = $request->user()->id;
      $project->save();
      return new ProjectResource($project);
   }

   /**
    * Load multiple projects by request criteria.
    * @param Request $request
    * @return array|\Illuminate\Http\JsonResponse|ProjectCollection
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
      $query->orderByDesc('created_at');
      return new ProjectCollection($query->paginate($size, ['*'], 'page', $page));
   }

   /**
    * Load project by id with related user.
    * @param Request $request
    * @param string $id
    * @return array|\Illuminate\Http\JsonResponse|ProjectResource
    */
   public function load(Request $request, $id)
   {
      $project = Project::with(['user', 'mailstones'])->findOrFail($id);
      return new ProjectResource($project);
   }
}
