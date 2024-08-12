<?php

namespace App\TestFolder;

class Db
{
    private \PDO $dbh;

    public function __constract()
    {
        $this->dbh = new \PDO('pgsql:host=localhost;dbname=laravel', 'sail', 'password');
    }

    public function query(string $sql, array $params = [], $class = \stdClass::class): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }
}