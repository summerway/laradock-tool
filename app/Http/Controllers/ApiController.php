<?php
/**
 * Created by PhpStorm.
 * User: Maple.xia
 * Date: 22/08/2017
 * Time: 4:32 PM
 */

namespace App\Http\Controllers;

class ApiController{

    public function virtualHost(){

        return responseSuccess(['list' => $receive_lists,'max_page' => $max_page]);
    }
}
