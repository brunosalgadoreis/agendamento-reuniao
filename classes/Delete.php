<?php

namespace classes;

class Delete extends Database
{
    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM tb_scheduled WHERE id = $id");
        $sql->execute();
    }
}
