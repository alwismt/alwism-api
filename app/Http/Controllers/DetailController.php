<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
/**
 * Class Detail
 *
 * @author  Alwis Madhusanka <mail@alwism.com>
 */
class DetailController extends Controller
{
    /**
     * Get Details
     * @OA\Get (
     *  path="/api/details",
     *  tags={"Non Auth"},
     *  @OA\Response(
     *      response=200,
     *      description="success",
     *      @OA\JsonContent(
     *          @OA\Property(property="success", type="boolean", example=true),
     *          @OA\Property(
     *              property="data",
     *              type="object",
     *              @OA\Property(property="id", type="number", example=1),
     *              @OA\Property(property="topic", type="string", example="Topic"),
     *              @OA\Property(property="description", type="string", example="description"),
     *              @OA\Property(property="name", type="string", example="Alwis Madhusanka"),
     *              @OA\Property(property="phone", type="string", example="[protected]"),
     *              @OA\Property(property="email", type="string", example="mail@example.com"),
     *              @OA\Property(property="skype", type="string", example="live:id"),
     *              @OA\Property(property="address", type="string", example="Sri Lanka"),
     *              @OA\Property(property="experience", type="number", example=4),
     *              @OA\Property(property="whatsapp", type="string", example="+44 1234 45625"),
     *              @OA\Property(property="language", type="string", example="English"),
     *              @OA\Property(property="image", type="string", example="path/image.png"),
     *              @OA\Property(property="updated_at", type="string",example="2022-04-11T09:25:53Z"),
     *              @OA\Property(property="created_at", type="string",example="2022-04-11T09:25:53Z")
     *          )
     *      )
     *  )
     * )
     *
     */
    public function index()
    {
        $data = Detail::where('id', 1)->first();
        if(!$data) {
            $data = [];
        }
        return response()->json([
            'success' => true,
            'data' => $data,
        ], 200);
    }

    /**
     * Create or update the existing details
     * @OA\Post (
     *  path="/api/admin/siteui/details",
     *  tags={"siteUi"},
     *  security={{ "apiAuth": {} }},
     *  @OA\RequestBody(ref="#/components/requestBodies/Details"),
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
     */
    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required',
            'description' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'whatsapp' => 'required',
            'skype' => 'required',
            'address' => 'required',
            'experience' => 'required',
            'language' => 'required',
        ]);
        if($request->id)
        {
            $detail = Detail::where('id', 1)->first();
            if($request->image)
            {
                $request->validate([
                    'image' => 'required|image|max:2048'
                ]);

                $oldImage = $detail->image;

                $destinationPath = 'images/detail';
                $path = Storage::put($destinationPath, $request->file('image'));

                Storage::delete($oldImage);
            }
            else {
                $path =$detail->image;
            }
        }
        else {
            $detail = new Detail;
            $request->validate([
                'image' => 'required|image|max:2048'
            ]);
            $destinationPath = 'images/detail';
            $path = Storage::put($destinationPath, $request->file('image'));
        }

        $detail->topic = $request->topic;
        $detail->description = $request->description;
        $detail->name = $request->name;
        $detail->email = $request->email;
        $detail->phone = $request->phone;
        $detail->whatsapp = $request->whatsapp;
        $detail->skype = $request->skype;
        $detail->address = $request->address;
        $detail->experience = $request->experience;
        $detail->language = $request->language;
        $detail->image = $path;
        $detail->save();

        return response()->json([
            'success' => true,
            'data' => $detail,
        ], 200);

    }
}
