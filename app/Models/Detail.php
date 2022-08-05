<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Detail.
 *
 * @author  Alwis Madhusanka
 *
 * @OA\Schema(
 *     title="Detail",
 *     description="Detail model",
 *     required={"topic", "description", "name", "email", "phone", "whatsapp", "skype", "address", "experience", "language"},
 * )
 */
class Detail extends Model
{
    use HasFactory;

    /**
     * @OA\Property(
     *     format="string",
     *     title="topic",
     *     description="About details topic",
     *     default="Well experienced Software Engineer"
     * )
     *
     * @var string
     */
    private $topic;

    /**
     * @OA\Property(
     *     format="string",
     *     title="description",
     *     description="About details description",
     *     default="description"
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *     format="string",
     *     title="name",
     *     description="About details name",
     *     default="Alwis Madhusanka"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     format="string",
     *     title="email",
     *     description="About details email",
     *     default="email@example.com"
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *     format="string",
     *     title="phone",
     *     description="About details phone",
     *     default="+44 0123 45678"
     * )
     *
     * @var string
     */
    private $phone;

    /**
     * @OA\Property(
     *     format="string",
     *     title="whatsapp",
     *     description="About details whatsapp",
     *     default="+44 0123 45678"
     * )
     *
     * @var string
     */
    private $whatsapp;

    /**
     * @OA\Property(
     *     format="string",
     *     title="skype",
     *     description="About details skype",
     *     default="live::skypeid"
     * )
     *
     * @var string
     */
    private $skype;

    /**
     * @OA\Property(
     *     format="string",
     *     title="address",
     *     description="About details address",
     *     default="9 Somewhere, Earth"
     * )
     *
     * @var string
     */
    private $address;

    /**
     * @OA\Property(
     *     format="int",
     *     title="experience",
     *     description="About details experience",
     *     default="5"
     * )
     *
     * @var int
     */
    private $experience;

    /**
     * @OA\Property(
     *     format="string",
     *     title="language",
     *     description="About details language",
     *     default="English, Sinhala"
     * )
     *
     * @var string
     */
    private $language;
}
