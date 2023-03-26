<?php

namespace App\database;

use \PDO;
use \PDOException;

class Connection
{
    const HOST = 'people_list_db';
    const PORT = '3306';
    const USER = 'admin';
    const DATABASENAME = 'peoplelist';
    const PASS = 'password';
    const PREP = '1';

    private $transaction;
    private $table;


    public function __construct($table = null)
    {
        $this->table = $table;
        $this->transaction();
    }

    public function transaction()
    {
        try {
            $this->transaction = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::DATABASENAME, self::USER, self::PASS);
            $this->transaction->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->transaction->rollback();
            die('ERROR: ' . $e->getMessage());
        }
    }


    public function close()
    {
        try {
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }


    public function execute($sql, $param = [])
    {
        try {
            $object = $this->transaction->prepare($sql);
            $object->execute($param);
            return $object->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function onSave($attributes = [])
    {
        try {
            $keys  = array_keys($attributes);
            $values = array_pad([], count($keys), '?');
            $sql = 'INSERT INTO ' . $this->table . ' ( ' . implode(',', $keys) . ' ) VALUES ( ' . implode(',', $values) . ' ) ';
            $this->execute($sql, array_values($attributes));
            $id = $this->transaction->lastInsertId();

            return $this->onReload('id = "'.$id.'"');
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function onUpdate($uuid, $attributes)
    {
        try {
            $keys  = array_keys($attributes);
            $sql = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $keys) . '=? WHERE uuid = "' . $uuid .'"';
            $this->execute($sql, array_values($attributes));
           
            return $this->onReload('uuid = "'.$uuid.'"');
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }


    public function onReload($where = null, $order = null, $limit = null)
    {
        try {
            $where = strlen($where) ? ' WHERE ' . $where : '';
            $order = strlen($order) ? ' ORDER BY ' . $order : '';
            $limit = strlen($limit) ? ' LIMIT ' . $limit : '';
            $sql = 'SELECT * FROM ' . $this->table . $where . $order . $limit;
            return $this->execute($sql);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function onDelete($uuid)
    {
        try {
            $sql = 'DELETE FROM ' . $this->table . ' WHERE uuid = "' . $uuid .'"';
            return $this->execute($sql);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
}
