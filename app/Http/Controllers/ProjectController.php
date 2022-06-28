<?php

namespace App\Http\Controllers;

use App\Models\CategoriesProject;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
/**
 *
 *
 */
class ProjectController extends Controller
{
    /**
     * Get published projects
     * @OA\Get (
     *     path="/api/projects",
     *     tags={"Non Auth"},
     *     @OA\Response(response=200, ref="#/components/responses/GetProjects")
     * )
     */
    public function index()
    {
        $page = request()->get('page', 1);
        $limit = request()->get('limit', 15);
        // Cache::flush('projects' . $page);

        $projects = Cache::remember('projects' . $page, 3600, function() use ($limit){
            return Project::where('status', 'publish')->paginate($limit);
        });

        if($projects) {
            return $projects;
        }
    }

    /**
     * Get All Projects
     * @OA\Get (
     *     path="/api/admin/projects",
     *     tags={"Projects"},
     *     security={{ "apiAuth": {} }},
     *     @OA\Response(response=200, ref="#/components/responses/GetProjects")
     * )
     */
    public function projects()
    {
        $page = request()->get('page', 1);
        $limit = request()->get('limit', 15);
        // Cache::flush('projects' . $page);

        $projects = Cache::remember('projects' . $page, 3600, function() use ($limit){
            return Project::paginate($limit);
        });

        if($projects) {
            return $projects;
        }
    }

    /**
     *
     * Get Project by slug
     * @OA\Get (
     *     path="/api/project/{slug}",
     *     tags={"Non Auth"},
     *     @OA\Parameter(
     *         in="path",
     *         name="slug",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, ref="#/components/responses/GetbySlug")
     * )
     */
    public function slug($slug)
    {
        if(!$slug) {
            return response()->json([
                'success' => false
            ], 200);
        }
        // Cache::flush('project_' . $slug);
        $project = Cache::remember('project_' . $slug, 3600, function() use ($slug) {
            return Project::where('slug', $slug)->first();
        });
        if(!$project) {
            return response()->json([
                'success' => false
            ], 200);
        }
        return response()->json([
            'success' => true,
            'slug' => $slug,
            'data' => $project,
            'categories' => $project->categories
        ], 200);
    }

    /**
     * Store a newly created project
     * @OA\Post (
     *  path="/api/admin/project/store",
     *  tags={"Projects"},
     *  security={{ "apiAuth": {} }},
     *  @OA\RequestBody(ref="#/components/requestBodies/Project"),
     *  @OA\Response(
     *      response=200,
     *      description="succes: client's action was received, understood, accepted and responded."
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="bad request: Some/all required fields are empty or Duplicate Slug Url"
     *  ),
     *  @OA\Response(
     *      response=406,
     *      description="Not Acceptable: Do not change user Id. for the demonstration please use 3"
     *  ),
     *  @OA\Response(
     *      response=401,
     *      description="unauthorized: Server requires the client to authorize, use login and token"
     *  )
     * )
     *
     */
    public function store(Request $request)
    {
        try {
            // Validating the post request
            $request->validate([
                'title' => 'required',
                'slug' => 'required|unique:projects,slug',
                'categories' => 'required',
                'userId' => 'required',
                'image' => 'required|image|max:2048',
                'description' => 'required',
                'seoTitle' => 'required',
                'seoDescription' => 'required',
                'status' => 'required',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        // //After Validation upload and save the image to server
        $destinationPath = 'images/projects';
        $path = Storage::put($destinationPath, $request->file('image'));

        // Check is it valid status if not save as draft
        if($request->status == 'draft') { $status = 'draft'; }
        elseif($request->status == 'publish') { $status = 'publish'; }
        else { $status = 'draft'; }
        try {
            // creating new data model and saving to DB throgh model
            $project = new Project;
            $project->title = $request->title;
            $project->slug = $request->slug;
            $project->image = $path;
            $project->description = $request->description;
            $project->seoTitle = $request->seoTitle;
            $project->seoDescription = $request->seoDescription;
            $project->userId = $request->userId;
            $project->status = $status;
            $project->save();
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 406);
        }
        // getting last input id
        $last_id = $project->id;
        $cats = explode(",", $request->categories);

        // save project categories in categoryproject table
        foreach($cats as $cat) {
            CategoriesProject::catSave($last_id, $cat);
        }

        // Return json response with success data
        return response()->json([
            'success' => true,
            'data' => $project
        ], 200);
    }

    /**
     * Get Project by ID
     * @OA\Get (
     *     path="/api/admin/project/{id}",
     *     tags={"Projects"},
     *     security={{ "apiAuth": {} }},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, ref="#/components/responses/GetbySlug")
     * )
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     *
     */
    public function show($id)
    {
        if(!$id) {
            return response()->json([
                'success' => 'false'
            ], 200);
        }
        $project = Project::find($id);
        if(!$project) {
            return response()->json([
                'message' => 'No project found'
            ], 405);
        }
        return response()->json([
            'success' => true,
            'id' => $id,
            'data' => $project,
            'categories' => $project->categories
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified project in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     *
     * @OA\Put (
     *  path="/api/admin/project/{id}",
     *  tags={"Projects"},
     *  security={{ "apiAuth": {} }},
     *  @OA\RequestBody(ref="#/components/requestBodies/Project"),
     *  @OA\Response(
     *      response=200,
     *      description="succes: client's action was received, understood, accepted and responded."
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="bad request: Some/all required fields are empty or Duplicate Slug Url"
     *  ),
     *  @OA\Response(
     *      response=406,
     *      description="Not Acceptable: Do not change user Id, for the demonstration please use 3,"
     *  ),
     *  @OA\Response(
     *      response=401,
     *      description="unauthorized: Server requires the client to authorize, use login and token"
     *  )
     * )
     *
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'categories' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'seoTitle' => 'required',
            'seoDescription' => 'required',
            'status' => 'required',
        ]);
        $project = Project::find($request->id);
        if(!$project) {
            return response()->json([
                'success' => false,
                'message' => 'No project founded!'
            ], 200);
        }
        if($project->slug !== $request->slug) {
            $slugcheck = Project::where('slug', $request->slug)->first();
            if($slugcheck) {
                return response()->json([
                    'success' => false,
                    'message' => 'The slug already in use!'
                ], 200);
            }
            $project->slug = $request->slug;
        }
        if($request->image !== 'null') {
            $request->validate([
                'image' => 'required|image|max:2048'
            ]);
            $oldImage = $project->image;
            $destinationPath = 'images/projects';
            $path = Storage::put($destinationPath, $request->file('image'));
            Storage::delete($oldImage);
            $project->image = $path;
        }
        $project->title = $request->title;
        $project->description = $request->description;
        $project->seoTitle = $request->seoTitle;
        $project->seoDescription = $request->seoDescription;
        $project->status = $request->status;
        $project->update();

        $id = $request->id;

        // Delete old categories before add changed categories
        $oldcats = CategoriesProject::where('project_id', $id)->get();
        foreach ($oldcats as $cat) {
            CategoriesProject::oldCatDelete($id, $cat->category_id);
        }

        $cats = explode(",", $request->categories);
        // save project categories in categoryproject table
        foreach($cats as $cat) {
            CategoriesProject::catSave($id, $cat);
        }

        return response()->json([
            'success' => true,
            'data' => $project
        ], 200);

    }
    /**
     * Remove the specified project from server.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     *
     * @OA\Delete (
     *     path="/api/admin/project/delete/{id}",
     *     tags={"Projects"},
     *     security={{ "apiAuth": {} }},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true)
     *         )
     *     )
     * )
     */
    public function destroy(Request $request)
    {
        if(!$request->id) {
            return response()->json([
                'message' => 'Delete ID required!'
            ], 406);
        }
        try {
            $id = $request->id;
            $project = Project::find($id);

            if(!$project) {
                return response()->json(['message' => 'The Project ID not found'], 404);
            }

            // Delete old categories before add changed categories
            $oldcats = CategoriesProject::where('project_id', $id)->get();
            foreach ($oldcats as $cat) {
                CategoriesProject::oldCatDelete($id, $cat->category_id);
            }

            $project->delete();
        } catch (\Exception $e) {
            return response()->json([$e->getMessage()], 400);
        }
        return response()->json([
            'success' => true
        ], 200);
    }

    /**
     * Check Project Slug Url
     * @OA\Post (
     *     path="/api/admin/urlcheck",
     *     tags={"Projects"},
     *     security={{ "apiAuth": {} }},
     *     @OA\RequestBody(
     *       @OA\MediaType(
     *          mediaType="multipart/form-data",
     *          @OA\Schema(
     *              @OA\Property(
     *                  description="Test Url",
     *                  property="url",
     *                  type="string",
     *                  example="abc-traders"
     *              )
     *          )
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(property="msg", type="string", example="delete todo success")
     *         )
     *     )
     * )
     */
    public function urlcheck (Request $request) {
        $request->validate([
            'url' => 'required'
        ]);
        if($request->id) {
            $url = Project::where('slug', $request->url)->first();
            if($url) {
                if($url->id == $request->id) {
                    return response()->json([
                        'success' => true,
                        'message' => 'The URL available'
                    ], 200);
                }
                return response()->json([
                    'success' => false,
                    'message' => 'The URL already in use'
                ], 200);
            }
            return response()->json([
                'success' => true,
                'message' => 'The URL available'
            ], 200);
        }
        else {
            $url = Project::where('slug', $request->url)->first();
            if($url) {
                return response()->json([
                    'success' => false,
                    'message' => 'The URL already in use'
                ], 200);
            }
            else {
                return response()->json([
                    'success' => true,
                    'message' => 'The URL available'
                ], 200);
            }
        }
    }
}
