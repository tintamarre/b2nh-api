<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     *
     * @OA\Info(
     *  title=" API of B2NH",
     *  description="This is the documentation of Api of B2NH",
     *  version="1.0.0",
     *    @OA\License(
     *     name="GNU General Public License v3",
     *     url="https://www.gnu.org/licenses/gpl-3.0.en.html"
     *   ),
     *   @OA\Contact(
     *    email="martin@erpicum.net",
     *    name="Team of B2NH",
     *    )
     *   )
     *  )
     * @OA\Tag(
     *     name="main",
     *     description="Everything about",
     * ),
       * @OA\Response(
     *     response=200,
     *     description="Success",
     * ),
     * @OA\Response(
     *     response=403,
     *     description="Forbidden"
     * ),
     * @OA\Response(
     *     response=404,
     *     description="Resource Not Found"
     * ),
     * @OA\SecurityScheme(
     *     securityScheme="bearer",
     *     type="http",
     *     scheme="bearer",
     * ),
     * @OA\Server(url="https://b2nh-api.tintamarre.be/api/v1/")
     */
}
