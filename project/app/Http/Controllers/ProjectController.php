<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectController extends Controller
{

    /**
     * Create new project.
     * @param \App\Http\Requests\ProjectCreate $request
     * @return array|\Illuminate\Http\JsonResponse|ProjectResource
     */
    public function create(\App\Http\Requests\ProjectCreate $request)
    {
        $project = new Project();
        $project->fill([
            'id' => $request->id,
            'title' => $request->title,
            'description' => $request->description ?? null,
            'status' => $request->status ?? null,
        ]);
        $project->user_id = $request->user()->id;
        $project->save();
        return new ProjectResource($project);
    }

    /**
     * Load multiple projects by request criteria.
     * @param \App\Http\Requests\Paginated $request
     * @return array|\Illuminate\Http\JsonResponse|ProjectCollection
     */
    public function loadAll(\App\Http\Requests\Paginated $request)
    {
        $query = Project::query();
        if ($request->filter) {
            $query->where('status', '=', $request->filter);
        }
        $query->orderByDesc('created_at');
        return new ProjectCollection($query->paginate($request->size, ['*'], 'page', $request->page));
    }

    /**
     * Load project by id with related user.
     * @param string $id
     * @return array|\Illuminate\Http\JsonResponse|ProjectResource
     */
    public function load($id)
    {
        $project = Project::with(['user', 'mailstones'])->findOrFail($id);
        return new ProjectResource($project);
    }
}
