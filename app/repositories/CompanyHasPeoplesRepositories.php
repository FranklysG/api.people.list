<?php

namespace App\repositories;

use App\models\CompanyHasPeoplesModel;

class CompanyHasPeoplesRepositories {

    public function delete($uuid) {
        $companyHasPeoples = new CompanyHasPeoplesModel();
        return $companyHasPeoples->delete($uuid);
    }

}