<?php

namespace App\controllers;

use App\repositories\PeopleRepositories;
use App\services\ApiResponse;

class PeopleController
{

    public static function show()
    {
        $repository  = new PeopleRepositories;
        $peoples = $repository->load();

        if ($peoples) {
            return (new apiResponse)->successResponse('People list', $peoples);
        } else {
            return (new apiResponse)->errorResponse('Wrong error', []);
        }
    }

    public static function store($request)
    {
        $repository  = new PeopleRepositories;
        $peoples = $repository->store($request);

        if ($peoples) {
            return (new apiResponse)->successResponse('People created with success', (array) $peoples);
        } else {
            return (new apiResponse)->errorResponse('Wrong error', []);
        }
    }

    public static function update($request)
    {
       
        $uuid = $request['uuid'];
        
        $repository  = new PeopleRepositories;
        $peoples = $repository->update($uuid, $request);
        
        if ($peoples) {
            return (new apiResponse)->successResponse('People updated with success', (array) $peoples);
        } else {
            return (new apiResponse)->errorResponse('Wrong error', []);
        }
    }

    public static function delete($request)
    {
        $uuid = $request['uuid'];
        $repository  = new PeopleRepositories;
        $peoples = $repository->delete($uuid);

        if ($peoples) {
            return (new apiResponse)->successResponse('People has been deleted', (array) []);
        } else {
            return (new apiResponse)->errorResponse('Wrong error', []);
        }
    }
}
