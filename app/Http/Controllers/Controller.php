<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/**
 * @OA\Info(
 *      version="1.0.3",
 *      title="alwism.com - API Documentation",
 *     description="This is the API Gateway for [www.alwism.com](https://www.alwism.com).  You can find out more about alwism at [https://www.alwism.com/sitemechanism](https://www.alwism.com/sitemechanism) or visit to github repository [github](https://github.com/alwismt/alwism-api).",
 *
 *     @OA\Contact(
 *         name="Contact the Developer",
 *         url="https://www.alwism.com/contactme",
 *     )
 * ),
 *
 * @OA\Server(
 *     url="https://api.alwism.com"
 * ),
 *
 * @OA\ExternalDocumentation(
 *     description="Visit to [www.alwism.com]",
 *     url="https://www.alwism.com"
 * ),
 * @OA\Schemes(format="http"),
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Login with email and password to get the authentication token",
 *     name="Token based Based",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="apiAuth",
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
