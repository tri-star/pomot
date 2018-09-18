<?php

namespace Pomot\Http\Controllers;

use Swagger\Annotations as SWG;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 *  @SWG\Info(
 *      version="1.0.0",
 *      title="Pomot API",
 *      description=""
 *  )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
