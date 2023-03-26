<?php

namespace App\repositories;

use App\models\PeopleModel;

class PeopleRepositories {

    public function load() {
        $peoples = new PeopleModel();
        return $peoples->load();
    }

    public function store($data) {
        $peoples = new PeopleModel();
        return $peoples->store($data);
    }

    public function update($uuid, $data) {
        $peoples = new PeopleModel();
        return $peoples->update($uuid, $data);
    }

    public function delete($uuid) {
        $peoples = new PeopleModel();
        return $peoples->delete($uuid);
    }

}