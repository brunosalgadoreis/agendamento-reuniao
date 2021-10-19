<?php
require 'classes/Filter.php';
require 'classes/Select.php';
require 'classes/Delete.php';

use classes\Filter;
use classes\Select;
use classes\Delete;

$filter = new Filter();
$select = new Select();
$delete = new Delete();
?>

<section class="schedules">
    <div class="center">

        <div class="filter">
            <form method="post" class="row g-3" autocomplete="off">
                <div class="col-auto">
                    <label class="col-sm-2 col-form-label col-form-label-lg">FILTRO</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="calendar2" name="calendarFilter" class="form-control col-auto" placeholder="Selecione a Data">
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary col-auto" name="filterButton" value="Buscar">
                </div>
            </form>
        </div>

        <h2>Agenda</h2>
        <hr>
        <?php
        if (isset($_POST['filterButton'])) {
            $info = $filter->filter();
        } else {
            $info = $select->selectSchedule();
        }
        $valueId;
        foreach ($info as $key => $value) {
        ?>
            <div class="box-single-timetable">
                <div class="box-single-wraper">
                    Nome: <?php echo $value['name'] ?><br />
                    Data e Horário: <?php
                                    echo date('d/m/Y', strtotime($value['timetable']));
                                    echo " - <strong>" . date('H:i', strtotime($value['timetable'])) . "</strong>";
                                    ?>
                    <br />
                    Fim: <?php
                            echo date('d/m/Y', strtotime($value['end']));
                            echo " - <strong>" . date('H:i', strtotime($value['end'])) . "</strong>";
                            ?>
                    <br />
                    Sala: <?php echo " <strong>" . $value['room'] . "</strong>"; ?>
                    <br />
                    <?php
                    $valueId = $value['id'];
                    ?>
                    <?php
                    if (isset($_SESSION['id']) && ($_SESSION['id'] >= 1)) {
                        echo '<form method="post">
                        <input type="submit" class="btn btn-danger col-auto" name="delete" value="Excluir">
                        </form>';
                    }
                    ?>
                </div>
            </div>
        <?php } ?>
        <div class="clear"></div>

        <?php
        if (isset($_POST['delete'])) {
            $delete->delete($valueId);
            echo '<div class="alert alert-danger" role="alert">O agendamento foi deletado com sucesso!</div>';

            header("refresh: 1; url=index.php");
            exit;
        }
        ?>
    </div>
</section>