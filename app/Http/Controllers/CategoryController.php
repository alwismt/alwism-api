<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoriesProject;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Get categories
     * @OA\Get (
     *     path="/api/admin/categories",
     *     tags={"categories"},
     *     security={{ "apiAuth": {} }},
     *     @OA\Response(response=200, ref="#/components/responses/200"),
     *     @OA\Response(response=401, ref="#/components/responses/401")
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Create a new category.
     * @OA\Post (
     *  path="/api/admin/category",
     *  tags={"categories"},
     *  security={{ "apiAuth": {} }},
     *  @OA\RequestBody(ref="#/components/requestBodies/Category"),
     *  @OA\Response(
     *      response=200,
     *      description="succes: client's action was received, understood, accepted and responded."
     *  ),
     *  @OA\Response(
     *      response=401,
     *      description="unauthorized: Server requires the client to authorize, use login and token"
     *  )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return response()->json([
            'success' => true
        ], 200);
    }

    /**
     * Get category by id
     * @OA\Get (
     *     path="/api/admin/category/{id}",
     *     tags={"categories"},
     *     security={{ "apiAuth": {} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the category that needs to be retrive",
     *         @OA\Schema(
     *             type="integer",
     *             format="int",
     *             minimum=1
     *         )
     *     ),
     *     @OA\Response(response=200, ref="#/components/responses/200"),
     *     @OA\Response(response=401, ref="#/components/responses/401")
     * )
     *
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$id) {
            return response()->json([
                'success' => false
            ], 200);
        }
        $category = Category::find($id);
        if(!$category) {
            return response()->json([
                'success' => false
            ], 200);
        }
        return response()->json([
            'success' => true,
            'id' => $id,
            'data' => $category
        ], 200);
    }



    /**
     * Update an existing category
     *
     *  @OA\Put (
     *     path="/api/admin/category/{id}",
     *     tags={"categories"},
     *     security={{ "apiAuth": {} }},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the category that needs to be update",
     *         @OA\Schema(
     *             type="integer",
     *             format="int",
     *             minimum=1
     *         )
     *     ),
     *     @OA\RequestBody(ref="#/components/requestBodies/Category"),
     *     @OA\Response(response=200, ref="#/components/responses/200")
     *  )
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $category = Category::find($request->id);
        if(!$category) {
            return response()->json([
                'success' => false
            ], 405);
        }
        $category->name = $request->name;
        $category->update();

        return response()->json([
            'success' => true
        ], 200);
    }

    /**
     * Deletes a category
     * @OA\Delete (
     *     path="/api/admin/category/{id}",
     *     tags={"categories"},
     *     security={{ "apiAuth": {} }},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, ref="#/components/responses/200"),
     *     @OA\Response(response=401, ref="#/components/responses/401")
     * )
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(!$request->id) {
            return response()->json([
                'success' => false
            ], 400);
        }
        $category = Category::find($request->id);
        if(!$category) {
            return response()->json([
                'success' => false
            ], 400);
        }
        $category->delete();
        return response()->json([
            'success' => true
        ], 200);
    }
    /**
     * Get Tags
     * @OA\Get (
     *  path="/api/tags",
     *  tags={"Non Auth"},
     *  @OA\Response(
     *      response=200,
     *      description="success",
     *      @OA\JsonContent(
     *          @OA\Property(property="success", type="boolean", example=true),
     *          @OA\Property(
     *              property="data",
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  @OA\Property(property="id", type="number", example=1),
     *                  @OA\Property(property="name", type="string", example="Nginx"),
     *                  @OA\Property(property="updated_at", type="string",example="2022-04-11T09:25:53Z"),
     *                  @OA\Property(property="created_at", type="string",example="2022-04-11T09:25:53Z"),
     *                  @OA\Property(
     *                      property="cats",
     *                      type="array",
     *                      @OA\Items(
     *                          type="object",
     *                          @OA\Property(property="project_id", type="number", example=1),
     *                          @OA\Property(property="category_id", type="number", example=1)
     *                      )
     *                  )
     *              )
     *          )
     *      )
     *   )
     * )
     *
     *
     */
    public function tags() {
        $tags = Category::get();
        // $tags = Category::find(1);
        $tags = Category::with('cats')->has('cats')->get();
        return response()->json([
            'success' => true,
            'data' => $tags
        ], 200);
    }
}
