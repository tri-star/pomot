<?php

namespace Pomot\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Swagger\Annotations as SWG;

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
