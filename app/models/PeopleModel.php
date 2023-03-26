<?php

namespace App\models;

use App\models\BaseModel;

class PeopleModel extends BaseModel
{

    const TABLENAME = 'users';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'max';

    private $uuid;
    private $name;
    private $email;
    private $phone;
    private $date_born;
    private $city_born;

    public function __construct()
    {
        parent::__construct(self::TABLENAME);
    }
}
