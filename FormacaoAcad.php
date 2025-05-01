<?php
//Classe
class FormacaoAcad {
    private $id;
    private $idusuario;
    private $inicio;
    private $fim;
    private $descricao;

    // Getters e setters aqui...

    public function inserirBD() {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "INSERT INTO formacaoAcademica (idusuario, inicio, fim, descricao)
                VALUES ('$this->idusuario', '$this->inicio', '$this->fim', '$this->descricao')";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
// Excluir
    public function excluirBD($id) {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "DELETE FROM formacaoAcademica WHERE idformacaoAcademica = '$id'";
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
//Listar Informações 
    public function listaFormacoes($idusuario) {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "SELECT * FROM formacaoAcademica WHERE idusuario = '$idusuario'";
        $res = $conn->query($sql);
        $conn->close();
        return $res;
    }
}
?>
