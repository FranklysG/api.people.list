<?php

namespace App\repositories;

use App\models\PeopleModel;

class PeopleRepositories
{

    public function load($params = '')
    {
        $peoples = new PeopleModel();
        $data = $peoples->search($params);
        $sanitize = [];
        foreach ($data as $item) {
            $sanitize[] = $this->sanitizeUserData((array)$item);
        }
        return $sanitize;
    }

    public function store($data)
    {
        $peoples = new PeopleModel();
        return $peoples->store($data);
    }

    public function update($uuid, $data)
    {
        $peoples = new PeopleModel();
        return $peoples->update($uuid, $data);
    }

    public function delete($uuid)
    {
        $peoples = new PeopleModel();
        return $peoples->delete($uuid);
    }

    function sanitizeUserData($data)
    {
        $data["email"] = substr_replace($data["email"], str_repeat("*", 8), 3, strpos($data["email"], "@") - 3);
        $data["phone"] = substr_replace($data["phone"], str_repeat("*", 7), 0, strlen($data["phone"]) - 4);

        return $data;
    }
}
