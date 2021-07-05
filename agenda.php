
<section class="agendamentos">
    <div class="center">

        <div class="filtro">			
            <form method="post" class="row g-3" autocomplete="off">
                <div class="col-auto">
                    <label class="col-sm-2 col-form-label col-form-label-lg">FILTRO</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="calendar2" name="calendariofilter" class="form-control col-auto" placeholder="Selecione a Data">
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
            $info = $db->filtro();
        } else {
            $info = $db->selectAgenda();
        }

        /* if (isset($_GET['excluir'])) {
          $id = (int) $_GET['excluir'];
          $db->pdo->exec("DELETE FROM `tb_agendados` WHERE id = $id");
          echo '<div class="alert alert-danger" role="alert">O agendamento foi deletado com sucesso!</div>';
          header("refresh: 1; url=index.php");
          exit;
          } */

        $valueId;
        foreach ($info as $key => $value) {
            ?>
            <div class="box-single-horario">
                <div class="box-single-wraper">
                    Nome: <?php echo $value['nome'] ?><br />
                    Data e Horário: <?php
                    echo date('d/m/Y', strtotime($value['horario']));
                    echo " - <strong>" . date('H:i', strtotime($value['horario'])) . "</strong>";
                    ?>
                    <br />
                    Fim: <?php
                    echo date('d/m/Y', strtotime($value['fim']));
                    echo " - <strong>" . date('H:i', strtotime($value['fim'])) . "</strong>";
                    ?>
                    <br />
                    Sala: <?php echo " <strong>" . $value['sala'] . "</strong>"; ?>
                    <br />
                    <?php
                    $valueId = $value['id'];
                    ?>
                    <?php 
                    if(isset($_SESSION['id'])&&($_SESSION['id']== 1)){
                        echo '<form method="post">
                        <input type="submit" class="btn btn-danger col-auto" name="excluir" value="Excluir">
                        </form>';
                    }
                    ?>
                    
                    <!--<form method="post">
                        <input type="submit" class="btn btn-danger col-auto" name="excluir" value="Excluir">
                    </form>-->

                                        <!--<a href="?excluir=<?php //echo $value['id'];      ?>">Excluir</a>-->
                </div>
            </div>
        <?php } ?>
        <div class="clear"></div>

        <?php
        if (isset($_POST['excluir'])) {
            $db->delete($valueId);
            echo '<div class="alert alert-danger" role="alert">O agendamento foi deletado com sucesso!</div>';
            
            header("refresh: 1; url=index.php");
            exit;
        }
        ?>
    </div>

</section>
