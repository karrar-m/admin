<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: "1.0.0",
    title: "Admin API",
    description: "Interactive API documentation for Admin"
)]
abstract class Controller
{
    //
}
