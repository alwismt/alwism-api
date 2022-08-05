<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\SiteUi;

class SiteUiController extends Controller
{
    /**
     * Get Site Ui Data
     * @OA\Get (
     *  path="/api/siteui",
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
     *              @OA\Property(property="banner", type="string", example="path/banner.png"),
     *              @OA\Property(property="logo", type="string", example="path/logo.png"),
     *              @OA\Property(property="footerText", type="string", example="Footer Text"),
     *              @OA\Property(property="FcopyText",type="string",example="Powered & designed by"),
     *              @OA\Property(property="FSkype", type="string", example="live::id"),
     *              @OA\Property(property="FGithub", type="string", example="//github.com/alwismt"),
     *              @OA\Property(property="FWhatsapp", type="string", example="+44 1234 56789"),
     *              @OA\Property(property="Flinkedin", type="string", example="//lk.linkedin.com/"),
     *              @OA\Property(property="updated_at", type="string", format="date-time"),
     *              @OA\Property(property="created_at",type="string", format="date-time")
     *          )
     *      )
     *  )
     * )
     *
     */
    public function index()
    {
        $data = SiteUi::where('id', 1)->first();
        if(!$data) {
            $data = [];
        }
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }


    /**
     * Create or update the existing banner
     * @OA\Post (
     *  path="/api/admin/siteui/banner",
     *  tags={"siteUi"},
     *  security={{ "apiAuth": {} }},
     *  @OA\RequestBody(ref="#/components/requestBodies/UiBanner"),
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
    public function banner (Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $ui = SiteUi::where('id', 1)->first();
        if($ui) {
            if($ui->banner) {
                $oldImage = $ui->banner;
                Storage::delete($oldImage);
            }
        }
        else {
            $ui = new SiteUi;
        }

        $destinationPath = 'images/banner';
        $path = Storage::put($destinationPath, $request->file('image'));
        $ui->banner = $path;
        $ui->save();

        $data = SiteUi::where('id', 1)->first();

        return response()->json([
            'success' => true,
            'data' => $data,
        ], 200);
    }

    /**
     * Create or update the existing logo
     * @OA\Post (
     *  path="/api/admin/siteui/logo",
     *  tags={"siteUi"},
     *  security={{ "apiAuth": {} }},
     *  @OA\RequestBody(ref="#/components/requestBodies/UiLogo"),
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
    public function logo (Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $ui = SiteUi::where('id', 1)->first();
        if($ui) {
            if($ui->logo) {
                $oldImage = $ui->logo;
                Storage::delete($oldImage);
            }
        }
        else {
            $ui = new SiteUi;
        }

        $destinationPath = 'images/logo';
        $path = Storage::put($destinationPath, $request->file('image'));
        $ui->logo = $path;
        $ui->save();

        $data = SiteUi::where('id', 1)->first();

        return response()->json([
            'success' => true,
            'data' => $data,
        ], 200);
    }

    /**
     * Create or update the existing footer
     * @OA\Post (
     *  path="/api/admin/siteui/footer",
     *  tags={"siteUi"},
     *  security={{ "apiAuth": {} }},
     *  @OA\RequestBody(ref="#/components/requestBodies/adfooter"),
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
    public function store (Request $request)
    {
        $request->validate([
            'footerText' => 'required',
            'FcopyText' => 'required'
        ]);

        $ui = SiteUi::where('id', 1)->first();
        if(!$ui) {
            $ui = new SiteUi;
        }
        $ui->footerText = $request->footerText;
        $ui->FcopyText = $request->FcopyText;
        $ui->FSkype = $request->FSkype;
        $ui->FGithub = $request->FGithub;
        $ui->FWhatsapp = $request->FWhatsapp;
        $ui->Flinkedin = $request->Flinkedin;
        $ui->save();

        $data = SiteUi::where('id', 1)->first();

        return response()->json([
            'success' => true,
            'data' => $data,
        ], 200);
    }
}
