<?php

namespace classes;

class Insert extends Database
{

    public function insert()
    {
        $name = $_POST['name'];
        $date = $_POST['calendar'];
        $timetable = $_POST['dateHour'];
        $end = $_POST['dateEnd'];
        $room = $_POST['room'];
        $date_full = date_create($date . $timetable);
        $date_hour_full = date_format($date_full, 'Y-m-d H:i:s');
        $date_end = date_create($date . $end);
        $date_end_full = date_format($date_end, 'Y-m-d H:i:s');

        if ($timetable < $end && $date >= date('d/m/y')) {
            $sql = $this->pdo->prepare("SELECT room, timetable, end FROM tb_scheduled WHERE room = '$room' AND timetable >= '$date_hour_full' OR end =< '$date_hour_full'");
            $sql->execute();

            if ($sql->rowCount() > 0) {

                echo '<div class="alert alert-danger" role="alert">Não pode agendar esse horário</div>';
            } else {
                $sql = $this->pdo->prepare("INSERT INTO `tb_scheduled` VALUES (null,?,?,?,?)");

                $sql->execute(array($name, $room, $date_hour_full, $date_end_full));
                echo '<div class="alert alert-success" role="alert">Seu horário foi agendado com sucesso!</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Selecione o período corretamente</div>';
        }
    }
}
