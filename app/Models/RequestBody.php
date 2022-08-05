<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\RequestBody(
 *     request="Project",
 *     description="Project Request Body",
 *     required=true,
 *     @OA\JsonContent(ref="#/components/schemas/Project"),
 *     @OA\MediaType(
 *         mediaType="multipart/form-data",
 *         @OA\Schema(ref="#/components/schemas/Project")
 *     )
 * ),
 * @OA\RequestBody(
 *     request="Category",
 *     description="Category Request Body",
 *     required=true,
 *     @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(ref="#/components/schemas/Category")
 *     ),
 *     @OA\JsonContent(ref="#/components/schemas/Category")
 * ),
 * @OA\RequestBody(
 *     request="UiBanner",
 *     description="Ui Banner Request Body",
 *     required=true,
 *     @OA\MediaType(
 *         mediaType="multipart/form-data",
 *         @OA\Schema(
 *              title="UiBanner",
 *              required={"image"},
 *              @OA\Property(property="image", ref="#/components/schemas/SiteUi/properties/banner"),
 *         )
 *     )
 * ),
 * @OA\RequestBody(
 *     request="UiLogo",
 *     description="Ui Banner Request Body",
 *     required=true,
 *     @OA\MediaType(
 *         mediaType="multipart/form-data",
 *         @OA\Schema(
 *              title="UiBanner",
 *              required={"image"},
 *              @OA\Property(property="image", ref="#/components/schemas/SiteUi/properties/logo"),
 *         )
 *     )
 * ),
 * @OA\RequestBody(
 *     request="adfooter",
 *     description="Footer Request Body",
 *     required=true,
 *     @OA\MediaType(
 *         mediaType="multipart/x-www-form-urlencoded",
 *         @OA\Schema(
 *         title="footerText",
 *         required={"footerText", "FcopyText"},
 *         @OA\Property(property="footerText", ref="#/components/schemas/SiteUi/properties/footerText"),
 *         @OA\Property(property="FcopyText", ref="#/components/schemas/SiteUi/properties/FcopyText"),
 *         @OA\Property(property="FSkype", ref="#/components/schemas/SiteUi/properties/FSkype"),
 *         @OA\Property(property="FGithub", ref="#/components/schemas/SiteUi/properties/FGithub"),
 *         @OA\Property(property="FWhatsapp", ref="#/components/schemas/SiteUi/properties/FWhatsapp"),
 *         @OA\Property(property="Flinkedin", ref="#/components/schemas/SiteUi/properties/Flinkedin")
 *         )
 *     ),
 *     @OA\JsonContent(
 *         @OA\Property(property="footerText", ref="#/components/schemas/SiteUi/properties/footerText"),
 *         @OA\Property(property="FcopyText", ref="#/components/schemas/SiteUi/properties/FcopyText"),
 *         @OA\Property(property="FSkype", ref="#/components/schemas/SiteUi/properties/FSkype"),
 *         @OA\Property(property="FGithub", ref="#/components/schemas/SiteUi/properties/FGithub"),
 *         @OA\Property(property="FWhatsapp", ref="#/components/schemas/SiteUi/properties/FWhatsapp"),
 *         @OA\Property(property="Flinkedin", ref="#/components/schemas/SiteUi/properties/Flinkedin")
 *     )
 * ),
 * @OA\RequestBody(
 *     request="Details",
 *     description="Details Request Body",
 *     required=true,
 *     @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(ref="#/components/schemas/Detail")
 *     ),
 *     @OA\JsonContent(ref="#/components/schemas/Detail")
 * ),
 * @OA\RequestBody(
 *     request="Languages",
 *     description="Languages Request Body",
 *     required=true,
 *     @OA\MediaType(
 *         mediaType="multipart/form-data",
 *         @OA\Schema(ref="#/components/schemas/Language")
 *     ),
 *     @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(ref="#/components/schemas/Language")
 *     )
 * ),
 */
class RequestBody extends Model
{
    use HasFactory;
}
