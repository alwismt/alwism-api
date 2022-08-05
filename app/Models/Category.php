<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Category.
 *
 * @author  Alwis Madhusanka
 *
 * @OA\Schema(
 *     title="Category",
 *     description="Category model",
 *     required={"name"}
 * )
 */
class Category extends Model
{
    use HasFactory;

    /**
     * @OA\Property(
     *     format="string",
     *     title="name",
     *     default="Nginx",
     *     description="Category Name",
     * )
     *
     * @var string
     */
    private $name;

    public function cats(){
        return $this->hasMany(CategoriesProject::class,'category_id','id');
    }
}
