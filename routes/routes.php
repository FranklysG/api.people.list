<?php

// importe as classes necessárias

use App\controllers\CompanyController;
use App\controllers\PeopleController;

$routes = [
    'GET:/api/users' => [new PeopleController, 'show'],
    'POST:/api/users' => [new PeopleController, 'store'],
    'PUT:/api/users' => [new PeopleController, 'update'],
    'DELETE:/api/users' => [new PeopleController, 'delete'],
    'GET:/api/company' => [new CompanyController, 'show'],
    'POST:/api/company' => [new CompanyController, 'store'],
    'PUT:/api/company' => [new CompanyController, 'update'],
    'DELETE:/api/company' => [new CompanyController, 'delete'],
];
