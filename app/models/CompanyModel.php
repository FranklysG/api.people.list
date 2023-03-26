<?php

namespace App\models;

use App\models\BaseModel;

class CompanyModel extends BaseModel
{

    const TABLENAME = 'company';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'max';

    private $id;
    private $uuid;
    private $name;
    private $doc;
    private $adrress;

    public function __construct()
    {
        parent::__construct(self::TABLENAME);
    }
}
