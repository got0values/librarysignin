<?php

class DB {
    function __construct () {
        try {
            $this->pdo = new PDO('sqlite:./model/signin.db');
        } catch (PDOException $ex) { 
            exit($ex->getMessage()); 
        }
    }

    function select ($sql, $data) {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($data);
        return $this->stmt->fetchAll();
    }

    function __destruct(){
        if ($this->stmt !== null) { $this->stmt = null; }
        if ($this->pdo !== null) { $this->pdo = null; }
    }
}

?>