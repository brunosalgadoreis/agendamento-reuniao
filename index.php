<?php
ob_start();
//error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION))
    session_start();

if (!isset($_SESSION['id'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

require 'Database.php';
$db = new Database();

date_default_timezone_set('America/Sao_Paulo');
?>
<?php include("header.php") ?>

<section class="reserva">
    <div class="center">
        <?php
        if (isset($_POST['acao'])) {
            if (isset($_POST['nome'], $_POST['sala'], $_POST['dataHora'], $_POST['dataFim'], $_POST['calendario'])) {

                $db->insert();

                header("refresh: 1; url=index.php");
                exit;
            } else {
                echo '<div class="alert alert-danger" role="alert">Preencha os campos.</div>';
            }
        }
        ?>
        <form method="post" class=" row g-3" autocomplete="off" >
            <div class="col-md-4">
                <input type="text" class="form-control" name="nome" placeholder="Nome da Agenda">
            </div>
            <div class="col-md-4">
                <select class="form-select" name="sala">
                    <option selected disabled value="">Escolha uma sala</option>
                    <option value="Sala 1">Sala 1</option>
                    <option value="Sala 2">Sala 2</option>
                    <option value="Planejamento">Planejamento</option>
                    <option value="Centro">Centro</option>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select" name="dataHora">
                    <option selected disabled value="">Hora inicio</option>
                    <?php
                    for ($i = 7; $i <= 18; $i++) {
                        $hora = $i;
                        if ($i < 10) {
                            $hora = '0' . $hora;
                        }
                        $hora .= ':00';

                        echo '<option value="' . $hora . '">' . $hora . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select" name="dataFim">
                    <option selected disabled value="">Hora fim</option>
                    <?php
                    for ($i = 7; $i <= 18; $i++) {
                        $hora = $i;
                        if ($i < 10) {
                            $hora = '0' . $hora;
                        }
                        $hora .= ':00';
                        echo '<option value="' . $hora . '">' . $hora . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" id="calendar" name="calendario" class="form-control" placeholder="Selecione a Data">
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-primary col-md-12" name="acao" value="Enviar">
            </div>
        </form>
        <hr>
    </div>
</section>

<?php include("agenda.php") ?>

</body>
</html>