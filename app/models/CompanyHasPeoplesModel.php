<?php

namespace App\models;

use App\models\BaseModel;

class CompanyHasPeoplesModel extends BaseModel
{

    const TABLENAME = 'company';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'max';

    private $user_id;
    private $comapny_id;

    public function __construct()
    {
        parent::__construct(self::TABLENAME);
    }
}
