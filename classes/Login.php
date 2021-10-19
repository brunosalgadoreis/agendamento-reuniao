<?php

namespace classes;

class login extends Database
{
    public function login()
    {

        if (isset($_POST['name']) && empty($_POST['name']) == false) {

            $name = addslashes($_POST['name']);
            $password = md5(addslashes($_POST['password']));

            $sql = $this->pdo->query("SELECT * FROM tb_users WHERE name = '$name' AND password = '$password'");

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch();

                $_SESSION['id'] = $data['id'];

                header("Location: index.php");
                exit;
            }
        }
    }
}
