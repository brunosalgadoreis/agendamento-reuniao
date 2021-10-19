<?php

include("header.php");

session_start();
if (isset($_SESSION['id']) && empty($_SESSION['id']) == false) {
    header("Location: index.php");
}

require 'classes/Login.php';

use classes\Login;

$login = new Login();

?>

<section class="reserve">
    <div class="center">
        <div class="row justify-content-center mt-login ">
            <div class="col-5 border border-2 rounded">
                <p class="h2">Login</p>
                <hr>

                <?php
                $login->login();
                ?>

                <form name="form" method="post" action="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mb-2 col-3">Entrar</button>
                </form>
            </div>
        </div>
        <hr>
    </div>
</section>

<?php include("schedule.php") ?>

</body>

</html>