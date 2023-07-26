<?php

namespace App;
use PDO;

class Database {
    protected $conn;
    protected $stmt;

    public function __construct($host = 'localhost', $user = 'root', $password = '', $dbname = 'ecomm2'){
        $dsn = "mysql:host=$host;dbname=$dbname;user=$user";
        $this->conn = new PDO($dsn);
        $this->conn->exec("set names utf8");
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function query($query, $params = []) {
        $this->stmt = $this->conn->prepare($query);
        $this->stmt->execute($params);
        return $this;
    }

    public function get() {
        $result = $this->stmt->fetchAll();
        return $result;
    }

    public function find() {
        return $this->stmt->fetch();
    }

    public function findOrFail() {
        $result = $this->find();
        if(!$result) {
            abort();
        } else {
            return $result;
        }
    }

    public function lastID() {
        return $this->conn->lastInsertId();
    }
}