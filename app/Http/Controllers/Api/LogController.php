<?php

namespace \App\Http\Controllers\Api;

use Swagger\Annotations as SWG;

class LogController extends \App\Http\Controllers\Controller
{

    /**
     * @SWG\Post(
     *  path="/v1//logs/save",
     *  summary="ログを保存",
     *  @SWG\Parameter(
     *      name="tags",
     *      in="body",
     *      @SWG\Schema(
     *          type="array",
     *          @SWG\Items(
     *              type="string"
     *          )
     *      )
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="処理成功"
     *  )
     * )
     */
    public function save()
    {
    }

}