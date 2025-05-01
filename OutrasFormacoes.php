<?php
class OutrasFormacoes {
    private $id;
    private $idusuario;
    private $inicio;
    private $fim;
    private $descricao;

    // ID
    public function setID($id) {
        $this->id = $id;
    }

    public function getID() {
        return $this->id;
    }

    // ID do usuário
    public function setIdUsuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    public function getIdUsuario() {
        return $this->idusuario;
    }

    // Início
    public function setInicio($inicio) {
        $this->inicio = $inicio;
    }

    public function getInicio() {
        return $this->inicio;
    }

    // Fim
    public function setFim($fim) {
        $this->fim = $fim;
    }

    public function getFim() {
        return $this->fim;
    }

    // Descrição
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    // Inserir no Banco de Dados
    public function inserirBD() {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO outrasformacoes (idusuario, inicio, fim, descricao)
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

    // Excluir registro pelo ID
    public function excluirBD($id) {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM outrasformacoes WHERE idoutrasformacoes = '$id'";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    // Listar formações pelo ID do usuário
    public function listaFormacoes($idusuario) {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM outrasformacoes WHERE idusuario = '$idusuario'";
        $res = $conn->query($sql);
        $conn->close();
        return $res;
    }
}
?>
