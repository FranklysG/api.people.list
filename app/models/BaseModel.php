<?php

namespace App\models;

use App\database\Connection;
use App\traits\Uuid;

class BaseModel
{


    private $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    /**
     * funçaõ responsavel por mandar o pokemon para classe de conexão 
     * pra salvar na tabela
     * @return boolean
     */
    public function store($attributes = [])
    {
        $attributes['uuid'] = Uuid::v4();
        $object = new Connection($this->table);
        return $object->onSave($attributes);
    }

    /**
     * funçaõ responsavel por editar o pokemon cadastrado 
     * pra salvar na tabela
     * @return boolean
     */
    public function update($uuid, $attributes = [])
    {
        $object = new Connection($this->table);
        return $object->onUpdate($uuid, $attributes);
    }

    /**
     * funçaõ responsavel por editar o pokemon cadastrado 
     * pra salvar na tabela
     * @return boolean
     */
    public function delete($uuid)
    {
        $object = new Connection($this->table);
        $object->onDelete($uuid);

        return true;
    }

    /**
     * função resposavel por retornar os objetos do banco .
     * @param $where 
     * @param $order 
     * @param $limit 
     */
    public function load($where = null, $order = null, $limit = null)
    {
        $table = $this->table;
        $load = (new Connection($table))->onReload($where, $order, $limit);
        return $load;
    }
}
