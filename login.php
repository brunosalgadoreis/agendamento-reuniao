<?php
session_start();
if (isset($_SESSION['id']) && empty($_SESSION['id']) == false) {
    header("Location: index.php");
}

require 'Database.php';
$db = new Database();
date_default_timezone_set('America/Sao_Paulo');
?>

<?php include("header.php") ?>

        <section class="reserva">
            <div class="center">
                <div class="row justify-content-center mt-login ">
                    <div class="col-5 border border-2 rounded">
                        <p class="h2">Login</p><hr>

                        <?php
                        $db->login();
                        ?>

                        <form name="form" method="post" action="" >
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control"  name="nome">
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" name="senha">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary mb-2 col-3">Entrar</button>
                        </form>
                    </div>
                </div>
                <hr>
            </div>
        </section>

    <?php include("agenda.php") ?>
        
    </body>
</html>