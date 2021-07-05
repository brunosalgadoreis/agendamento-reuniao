<?php

class Database {

    public $pdo;

    public function __construct() {

        $this->pdo = new PDO("mysql:host=localhost;dbname=sistema", 'root', '');
    }

    public function selectAgenda() {
        $sql = $this->pdo->prepare("SELECT * FROM tb_agendados ORDER BY horario DESC LIMIT 9 ");
        $sql->execute();
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function filtro() {
        $datefilter = $_POST['calendariofilter'];
        $sql = $this->pdo->prepare("SELECT * FROM tb_agendados WHERE horario LIKE '%$datefilter%' ");

        $sql->execute();
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function delete($id) {
        $sql = $this->pdo->prepare("DELETE FROM tb_agendados WHERE id = $id");
        $sql->execute();

    }

    public function insert() {
        $nome = $_POST['nome'];
        $data = $_POST['calendario'];
        $horario = $_POST['dataHora'];
        $fim = $_POST['dataFim'];
        $sala = $_POST['sala'];
        $date = date_create($data . $horario);
        $dataHora = date_format($date, 'Y-m-d H:i:s');
        $datefim = date_create($data . $fim);
        $dataFim = date_format($datefim, 'Y-m-d H:i:s');

        if ($horario < $fim && $data >= date('d/m/y')) {
            $sql = $this->pdo->prepare("SELECT horario, fim, sala FROM tb_agendados WHERE sala = '$sala' AND horario >= '$dataHora' OR fim =< '$dataHora'");
            $sql->execute();

            if ($sql->rowCount() > 0) {

                echo '<div class="alert alert-danger" role="alert">Não pode agendar esse horário</div>';
            } else {
                $sql = $this->pdo->prepare("INSERT INTO `tb_agendados` VALUES (null,?,?,?,?)");

                $sql->execute(array($nome, $dataHora, $dataFim, $sala));
                echo '<div class="alert alert-success" role="alert">Seu horário foi agendado com sucesso!</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Selecione o período corretamente</div>';
        }
    }

    public function login() {

        if (isset($_POST['nome']) && empty($_POST['nome']) == false) {

            $nome = addslashes($_POST['nome']);
            $senha = md5(addslashes($_POST['senha']));

            $sql = $this->pdo->query("SELECT * FROM tb_usuarios WHERE nome = '$nome' AND senha = '$senha'");

            if ($sql->rowCount() > 0) {
                $dado = $sql->fetch();

                $_SESSION['id'] = $dado['id'];

                header("Location: index.php");
                exit;
            }
        }
    }

}
