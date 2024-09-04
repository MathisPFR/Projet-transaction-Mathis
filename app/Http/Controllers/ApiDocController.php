<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         title="API Documentation",
 *         version="1.0.0",
 *         description="This is the documentation of the API for the transaction system",
 *         @OA\Contact(
 *             email="support@example.com"
 *         )
 *     ),
 *     @OA\Server(
 *         url="http://127.0.0.1:8000",
 *         description="Localhost API Server"
 *     )
 * )
 */
class ApiDocController extends Controller
{
    //
}
