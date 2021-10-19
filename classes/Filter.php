<?php

namespace classes;

class Filter extends Database
{
    public function filter()
    {
        $datefilter = $_POST['calendarFilter'];
        $sql = $this->pdo->prepare("SELECT * FROM tb_scheduled WHERE timetable LIKE '%$datefilter%' ");

        $sql->execute();
        $sql = $sql->fetchAll();
        return $sql;
    }
}
