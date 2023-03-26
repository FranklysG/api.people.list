<?php

namespace App\repositories;

use App\models\PeopleModel;

class PeopleRepositories
{

    public function load()
    {
        $peoples = new PeopleModel();
        $data = $peoples->load();
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
        $data["name"] = substr_replace($data["name"], str_repeat("*", 13), 2, strlen($data["name"]) - 4);
        $data["email"] = substr_replace($data["email"], str_repeat("*", 8), 3, strpos($data["email"], "@") - 3);
        $data["phone"] = substr_replace($data["phone"], str_repeat("*", 7), 0, strlen($data["phone"]) - 4);
        $data["date_born"] = substr_replace($data["date_born"], str_repeat("*", 4), 0, strlen($data["date_born"]) - 4);
        $data["city_born"] = substr_replace($data["city_born"], str_repeat("*", 28), 4, strlen($data["city_born"]) - 11);

        return $data;
    }
}
