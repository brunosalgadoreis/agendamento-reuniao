<?php

namespace classes;

class Select extends Database
{
    public function selectSchedule()
    {
        $sql = $this->pdo->prepare("SELECT * FROM tb_scheduled ORDER BY timetable DESC LIMIT 9 ");
        $sql->execute();
        $sql = $sql->fetchAll();
        return $sql;
    }
}
