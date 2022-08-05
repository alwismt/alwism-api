<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Project.
 *
 * @author  Alwis Madhusanka
 *
 * @OA\Schema(
 *     title="Project",
 *     description="Project model",
 *     required={"title", "slug", "categories", "image", "description", "seoTitle", "seoDescription", "status", "categories"}
 * )
 */
class Project extends Model
{
    use HasFactory;

    // /**
    //  * @OA\Property(
    //  *     format="int",
    //  *     title="id",
    //  *     default=1,
    //  *     description="ID",
    //  * )
    //  *
    //  * @var int
    //  */
    // private $id;

    /**
     * @OA\Property(
     *     format="string",
     *     title="title",
     *     default="Abc Traders",
     *     description="Project title",
     * )
     *
     * @var string
     */
    private $title;

    /**
     * @OA\Property(
     *     format="string",
     *     title="slug",
     *     default="abc-traders",
     *     description="Project Slug",
     * )
     *
     * @var string
     */
    private $slug;

    /**
     * @OA\Property(
     *     format="string",
     *     title="categories",
     *     default="1,2,3",
     *     description="Project categories - (Multiple Select)",
     * )
     *
     * @var string
     */
    private $categories;

    /**
     * @OA\Property(
     *     type="string",
     *     title="image",
     *     description="Project image",
     *     format="binary"
     * )
     *
     * @var string
     */
    private $image;

    /**
     * @OA\Property(
     *     type="string",
     *     title="description",
     *     default="abc-traders",
     *     description="Project description"
     * )
     *
     * @var string
     */
    private $description;

    /**
     * @OA\Property(
     *     type="string",
     *     title="seoTitle",
     *     default="Abc Traders",
     *     description="Project seo title"
     * )
     *
     * @var string
     */
    private $seoTitle;

    /**
     * @OA\Property(
     *     type="string",
     *     title="seoDescription",
     *     default="Abc Traders",
     *     description="Project seo description"
     * )
     *
     * @var string
     */
    private $seoDescription;

    /**
     * @OA\Property(
     *     type="string",
     *     title="status",
     *     default="draft",
     *     description="Project status - It should be 'draft' or 'publish'"
     * )
     *
     * @var string
     */
    private $status;


    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'seoTitle',
        'seoDescription',
        'status'
    ];
    // public function categories()
    // {
    //     return $this->hasManyThrough(
    //         Category::class,
    //         CategoriesProject::class,
    //         'project_id', // Foreign key on the project_categories table...
    //         'id', // Foreign key on the category table...
    //         'id', // Local key on the projects table...
    //         'category_id' // Local key on the project_categories table...
    // );
    // }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_projects');
    }
}
