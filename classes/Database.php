<?php

namespace classes;

use PDO;

class Database
{

    public $pdo;

    public function __construct()
    {

        $this->pdo = new PDO("mysql:host=localhost;dbname=calendar_system", 'root', '');
    }
}
