<?php

namespace App\Http\Controllers;
use App\Models\SiteMechanism;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SiteMechanismController extends Controller
{
        /**
     * Get site mechanism
     * @OA\Get (
     *  path="/api/sitemechanism",
     *  tags={"Non Auth"},
     *  @OA\Response(
     *      response=200,
     *      description="success",
     *      @OA\JsonContent(
     *          @OA\Property(property="id", type="number", example=1),
     *          @OA\Property(property="title", type="string", example="Site Mechanism"),
     *          @OA\Property(property="image", type="string", example="path/image.png"),
     *          @OA\Property(property="description", type="text", example="Site description"),
     *          @OA\Property(property="seoTitle", type="text", example="seo Title"),
     *          @OA\Property(property="seoDescription", type="text", example="Site Description"),
     *          @OA\Property(property="updated_at", type="string",example="2022-04-11T09:25:53Z"),
     *          @OA\Property(property="created_at", type="string",example="2022-04-11T09:25:53Z")
     *      )
     *  )
     * )
     *
     */
    public function index()
    {
        $site = SiteMechanism::where('id', 1)->first();
        return $site;
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'seoTitle' => 'required',
            'seoDescription' => 'required',
        ]);
        // if its not first time it must have the id
        if ($request->id) {
            $site = SiteMechanism::find($request->id);
            if($request->image) {
                $request->validate([
                    'image' => 'required|image|max:2048'
                ]);
                $oldImage = $site->image;
                $destinationPath = 'images/sitemechanism';
                $path = Storage::put($destinationPath, $request->file('image'));
                Storage::delete($oldImage);
                $site->image = $path;
            }
        }
        else {
            $site = new SiteMechanism;

            $request->validate([
                'image' => 'required|image|max:2048'
            ]);
            $destinationPath = 'images/sitemechanism';
            $path = Storage::put($destinationPath, $request->file('image'));
            $site->image = $path;
        }
        $site->title = $request->title;
        $site->description = $request->description;
        $site->seoTitle = $request->seoTitle;
        $site->seoDescription = $request->seoDescription;
        $site->save();

        return response()->json([
            'success' => true,
            'data' => $site
        ], 200);
    }
}
