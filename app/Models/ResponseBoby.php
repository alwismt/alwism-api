<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 *
 *  @OA\Response(
 *      response=200,
 *      description="succes: client's action was received, understood, accepted and responded."
 *  ),
 *  @OA\Response(
 *      response=401,
 *      description="unauthorized: Server requires the client to authorize. Login with email and password to get the authentication token"
 *  ),
 *  @OA\Response(
 *      response="GetProjects",
 *      description="success",
 *      @OA\JsonContent(
 *          @OA\Property(property="current_page", type="number", example="1"),
 *          @OA\Property(
 *              type="array",
 *              property="data",
 *              @OA\Items(ref="#/components/schemas/Project")
 *          ),
 *          @OA\Property(property="first_page_url",type="string",example="url/api/projects?page=1"),
 *          @OA\Property(property="from", type="number", example="1"),
 *          @OA\Property(property="last_page", type="number", example="1"),
 *          @OA\Property(property="last_page_url",type="string", example="url/api/projects?page=3"),
 *          @OA\Property(
 *              property="links",
 *              type="array",
 *              @OA\Items(
 *                  type="object",
 *                  @OA\Property(property="url", type="string", example="url/api/projects?page=1"),
 *                  @OA\Property(property="label", type="string", example="&laquo; Previous"),
 *                  @OA\Property(property="active", type="boolean", example="false"),
 *               )
 *          ),
 *          @OA\Property(property="next_page_url", type="string",example="null"),
 *          @OA\Property(property="path", type="string",example="url/api/projects"),
 *          @OA\Property(property="per_page", type="number", example="15"),
 *          @OA\Property(property="prev_page_url", type="string",example="url/api/projects?page=1"),
 *          @OA\Property(property="to", type="number", example="2"),
 *          @OA\Property(property="total", type="number",example="2"),
 *      )
 *  ),
 *
 *
 *  @OA\Response(
 *      response="GetbySlug",
 *      description="success",
 *      @OA\JsonContent(
 *          @OA\Property(property="success", type="boolean", example="true"),
 *          @OA\Property(property="slug", type="string", example="abc-car-traders"),
 *          @OA\Property(
 *              property="data",
 *              type="object",
 *              @OA\Property(property="id", type="number", example="1"),
 *              @OA\Property(property="userId", type="number", example="1"),
 *              @OA\Property(property="title", type="string",example="Ebook LTD ASP.NET MVC 6"),
 *              @OA\Property(property="slug", type="string", example="abc-car-traders"),
 *              @OA\Property(property="image", type="string", example="path/image.png"),
 *              @OA\Property(property="description", type="text",example="Project Description"),
 *              @OA\Property(property="seoTitle", type="string",example="ABC Car Traders"),
 *              @OA\Property(property="seoDescription", type="string",example="SEO Description"),
 *              @OA\Property(property="status", type="string", example="publish"),
 *              @OA\Property(property="updated_at", type="string", format="date-time"),
 *              @OA\Property(property="created_at", type="string", format="date-time"),
 *              @OA\Property(
 *                  property="categories",
 *                  type="array",
 *                  @OA\Items(
 *                      type="object",
 *                      @OA\Property(property="id", type="number", example="1"),
 *                      @OA\Property(property="name", type="string", example="Go Lang"),
 *                      @OA\Property(property="updated_at", type="string",format="date-time"),
 *                      @OA\Property(property="created_at", type="string",format="date-time")
 *                  )
 *              )
 *          ),
 *          @OA\Property(
 *              property="categories",
 *              type="array",
 *              @OA\Items(
 *                  type="object",
 *                  @OA\Property(property="id", type="number", example="1"),
 *                  @OA\Property(property="name", type="string", example="Go Lang"),
 *                  @OA\Property(property="updated_at", type="string", format="date-time"),
 *                  @OA\Property(property="created_at", type="string",format="date-time")
 *              )
 *          )
 *      )
 *  )
 */
class ResponseBoby extends Model
{
    use HasFactory;
}
