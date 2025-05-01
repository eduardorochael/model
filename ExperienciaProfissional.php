<?php
// Classe aqui 
class ExperienciaProfissional {
    private $id;
    private $idusuario;
    private $inicio;
    private $fim;
    private $empresa;
    private $descricao;

    // Getters e setters aqui 

    public function inserirBD() {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "INSERT INTO experienciaProfissional (idusuario, inicio, fim, empresa, descricao)
                VALUES ('$this->idusuario', '$this->inicio', '$this->fim', '$this->empresa', '$this->descricao')";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
//Excluir
    public function excluirBD($id) {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "DELETE FROM experienciaProfissional WHERE idexperienciaprofissional = '$id'";
        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
// Lista Experiências 
    public function listaExperiencias($idusuario) {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "SELECT * FROM experienciaProfissional WHERE idusuario = '$idusuario'";
        $res = $conn->query($sql);
        $conn->close();
        return $res;
    }
}
?>
