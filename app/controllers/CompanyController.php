<?php

namespace App\controllers;

use App\repositories\CompanyRepositories;
use App\services\ApiResponse;

class CompanyController
{

    public static function show()
    {
        $repository  = new CompanyRepositories;
        $company = $repository->load();

        if ($company) {
            return (new apiResponse)->successResponse('Company list', $company);
        } else {
            return (new apiResponse)->errorResponse('Wrong error', []);
        }
    }

    public static function store($request)
    {
        $repository  = new CompanyRepositories;
        $company = $repository->store($request);

        if ($company) {
            return (new apiResponse)->successResponse('Company created with success', (array) $company);
        } else {
            return (new apiResponse)->errorResponse('Wrong error', []);
        }
    }

    public static function update($request)
    {
        $uuid = $request['uuid'];
        $repository  = new CompanyRepositories;
        $company = $repository->update($uuid, $request);

        if ($company) {
            return (new apiResponse)->successResponse('Company updated with success', (array) $company);
        } else {
            return (new apiResponse)->errorResponse('Wrong error', []);
        }
    }

    public static function delete($request)
    {
        $uuid = $request['uuid'];
        $repository  = new CompanyRepositories;
        $company = $repository->delete($uuid);

        if ($company) {
            return (new apiResponse)->successResponse('Company has been deleted', (array) []);
        } else {
            return (new apiResponse)->errorResponse('Wrong error', []);
        }
    }
}
