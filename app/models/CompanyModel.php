<?php

namespace App\models;

use App\models\BaseModel;

class CompanyModel extends BaseModel
{

    const TABLENAME = 'company';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'max';

    public function __construct()
    {

        $search = [
            'name',
            'doc',
            'address'
        ];

        parent::__construct(self::TABLENAME, $search);
    }
}
