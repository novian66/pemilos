<?php

namespace App\Services\Api;

use App\Base\ServiceBase;
use App\Models\Admin\School;
use App\Responses\ServiceResponse;

class ApiService extends ServiceBase
{

    /**
     * main method of this service
     *
     * @return ServiceResponse
     */
    public function call(): ServiceResponse
    {
        $data = School::with('user')->all();
        return self::success($data, "Create success");
    }
}
