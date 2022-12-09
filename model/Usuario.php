<?php
/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';

class Usuario extends Controle {

    public $db;
    public $usuario_id;
    public $usuario_nome;
    public $usuario_email;
    public $usuario_senha;
    public $usuario_login;
    public $usuario_imagem;

    public function __construct() {
        parent:: __construct();
        $this->data = date('d/m/Y');
    }

    public function gravar() {
        $colunas = "usuario_nome, usuario_email, usuario_senha, usuario_login, usuario_data, usuario_imagem";
        $valores = "'$this->usuario_nome','$this->usuario_email','$this->usuario_senha' ,'$this->usuario_login', '$this->data', '$this->usuario_imagem'";
        $this->insert("usuario", "$colunas", " $valores");
    }

    public function getPessoa() {
        $this->select("usuario", "usuario_id = $this->usuario_id");
    }
    
    public function getPessoas() {
        $query = "ORDER BY usuario_id DESC";
        $this->select("usuario", "", "*", "", "$query", "");
    }

    public function atualizar() {
        $query = "usuario_nome  = '$this->usuario_nome', usuario_email = '$this->usuario_email', usuario_login = '$this->usuario_login' ";
        if ($this->usuario_senha != "") {
            $query .= ", usuario_senha = '$this->usuario_senha' ";
        }
        if ($this->usuario_imagem != "") {
            $query .= ", usuario_imagem = '$this->usuario_imagem' ";
            @session_start();
            $_SESSION['USER']['IMAGEM'] = "$this->usuario_imagem";
        }
        $this->update("usuario", "$query", "usuario_id = '$this->usuario_id'");
    }

    public function enviar() {
        $this->upload("../images/usuario/", "usuario_imagem", "");
    }

    public function remover() {
        $this->delete("usuario", "usuario_id = '$this->usuario_id'");
    }

    public function removerArquivo() {
        $this->deleteArquivo("usuario", "usuario_id = '$this->usuario_id'", "usuario_imagem", "../images/usuario/");
    }

    public function getJason() {
        $this->getJSON("usuario", "usuario_id = '$this->usuario_id'");
    }

}
