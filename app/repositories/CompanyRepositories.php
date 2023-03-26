<?php

namespace App\repositories;

use App\models\CompanyModel;

class CompanyRepositories {

    public function load($params) {
        $company = new CompanyModel();
        return $company->search($params);
    }

    public function store($data) {
        $company = new CompanyModel();
        return $company->store($data);
    }

    public function update($uuid, $data) {
        $company = new CompanyModel();
        return $company->update($uuid, $data);
    }

    public function delete($uuid) {
        $company = new CompanyModel();
        return $company->delete($uuid);
    }

}