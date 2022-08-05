<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     * Get Langusages
     * @OA\Get (
     *  path="/api/languages",
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
     *                  @OA\Property(property="name", type="string", example="Go Lang"),
     *                  @OA\Property(property="image", type="string", example="path/image.png"),
     *                  @OA\Property(property="weight", type="number", example="1"),
     *                  @OA\Property(property="updated_at", type="string",example="2022-04-11T09:25:53Z"),
     *                  @OA\Property(property="created_at", type="string",example="2022-04-11T09:25:53Z")
     *              )
     *          )
     *      )
     *  )
     * )
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Language::orderBy('weight', 'asc')->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }


    /**
     * Create a new language
     * @OA\Post (
     *  path="/api/admin/language",
     *  tags={"languages"},
     *  security={{ "apiAuth": {} }},
     *  @OA\RequestBody(ref="#/components/requestBodies/Languages"),
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'weight' => 'required',
        ]);
        if($request->id){
            $lang = Language::where('id', $request->id)->first();
            if($request->image)
            {
                $request->validate([
                    'image' => 'required|image|max:2048',
                ]);
                $destinationPath = 'images/languages';
                $path = Storage::put($destinationPath, $request->file('image'));

                $oldImage = $lang->image;
                Storage::delete($oldImage);
            }
            else {
                $path = $lang->image;
            }
        }
        else {
            $request->validate([
                'image' => 'required|image|max:2048',
            ]);
            $lang = new Language;
            $destinationPath = 'images/languages';
            $path = Storage::put($destinationPath, $request->file('image'));

        }
        $lang->name = $request->name;
        $lang->weight = $request->weight;
        $lang->image = $path;
        $lang->save();

        $langs = Language::orderBy('weight', 'asc')->get();
        return response()->json([
            'success' => true,
            'data' => $langs
        ], 200);
    }

    /**
     * Get language by ID
     * @OA\Get (
     *     path="/api/admin/language/{id}",
     *     tags={"languages"},
     *     security={{ "apiAuth": {} }},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *  @OA\Response(
     *      response=200,
     *      description="succes: client's action was received, understood, accepted and responded."
     *  ),
     *  @OA\Response(
     *      response=401,
     *      description="unauthorized: Server requires the client to authorize, use login and token"
     *  )
     * )
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     *
     * @param  \App\Models\language  $language
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lang = Language::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'data' => $lang
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(language $language)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, language $language)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(language $language)
    {
        //
    }
}
