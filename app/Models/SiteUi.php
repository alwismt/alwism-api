<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class SiteUi.
 *
 * @author  Alwis Madhusanka
 *
 * @OA\Schema(
 *     title="SiteUi",
 *     description="SiteUi model",
 *     required={"banner", "logo", "footerText", "FcopyText"},
 * )
 */
class SiteUi extends Model
{
    use HasFactory;


    /**
     * @OA\Property(
     *     format="string",
     *     title="banner",
     *     description="Ui banner",
     *     format="binary"
     * )
     *
     * @var string
     */
    private $banner;

    /**
     * @OA\Property(
     *     format="string",
     *     title="logo",
     *     description="Logo",
     *     format="binary"
     * )
     *
     * @var string
     */
    private $logo;

    /**
     * @OA\Property(
     *     format="string",
     *     title="footerText",
     *     description="Footer Text",
     *     default="I'm currently focused on expanding my experience designing and developing"
     * )
     *
     * @var string
     */
    private $footerText;

    /**
     * @OA\Property(
     *     format="string",
     *     title="FcopyText",
     *     description="Footer copy Text",
     *     default="Powered and designed by Alwis Madhusanka"
     * )
     *
     * @var string
     */
    private $FcopyText;

    /**
     * @OA\Property(
     *     format="string",
     *     title="FSkype",
     *     description="Footer Skype"
     * )
     *
     * @var string
     */
    private $FSkype;

    /**
     * @OA\Property(
     *     format="string",
     *     title="FGithub",
     *     description="Footer Github"
     * )
     *
     * @var string
     */
    private $FGithub;

    /**
     * @OA\Property(
     *     format="string",
     *     title="FWhatsapp",
     *     description="Footer Whatsapp"
     * )
     *
     * @var string
     */
    private $FWhatsapp;

    /**
     * @OA\Property(
     *     format="string",
     *     title="Flinkedin",
     *     description="Footer linkedin"
     * )
     *
     * @var string
     */
    private $Flinkedin;
}
