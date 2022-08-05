<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Language.
 *
 * @author  Alwis Madhusanka
 *
 * @OA\Schema(
 *     title="Language",
 *     description="Language model",
 *     required={"name", "image", "weight"},
 * )
 */

class Language extends Model
{
    use HasFactory;

    /**
     * @OA\Property(
     *     type="string",
     *     title="name",
     *     description="Language name",
     *     default="Golang"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     type="string",
     *     title="image",
     *     format="binary",
     *     description="Language Image"
     * )
     *
     * @var string
     */
    private $image;

    /**
     * @OA\Property(
     *     type="int",
     *     title="weight",
     *     description="Language weight",
     *     default="1"
     * )
     *
     * @var int
     */
    private $weight;
}
