<?php

namespace App\models;

use App\models\BaseModel;

class PeopleModel extends BaseModel
{

    const TABLENAME = 'users';
    const PRIMARYKEY = 'id';
    const IDPOLICY = 'max';

    public function __construct()
    {
        $search = [
            'name',
            'email',
            'phone',
            'date_born',
            'city_born'
        ];

        parent::__construct(self::TABLENAME, $search);
    }
}
