<?php
//Classe
class Usuario {
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $dataNascimento;
    private $senha;

    // Getters e Setters aqui 
    public function setID($id) { $this->id = $id; }
    public function getID() { return $this->id; }

   

    // MÉTODO: Inserir usuário no BD
    public function inserirBD() {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "INSERT INTO usuario (nome, cpf, email, senha)
                VALUES ('$this->nome', '$this->cpf', '$this->email', '$this->senha')";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    // MÉTODO: Buscar usuário pelo CPF
    public function carregarUsuario($cpf) {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "SELECT * FROM usuario WHERE cpf = '$cpf'";
        $res = $conn->query($sql);
        $row = $res->fetch_object();

        if ($row != null) {
            $this->id = $row->idusuario;
            $this->nome = $row->nome;
            $this->cpf = $row->cpf;
            $this->email = $row->email;
            $this->dataNascimento = $row->dataNascimento;
            $this->senha = $row->senha;
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    // MÉTODO: Atualizar dados do usuário
    public function atualizarBD() {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();

        $sql = "UPDATE usuario SET nome='$this->nome', cpf='$this->cpf',
                dataNascimento='$this->dataNascimento', email='$this->email'
                WHERE idusuario='$this->id'";

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }
}
?>
