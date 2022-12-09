<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';

class Cliente extends Controle {

    public $bd;
    public $cliente_id;
    public $cliente_nome;
    public $cliente_subtitulo;
    public $cliente_descricao;
    public $cliente_imagem;
    public $result;

    public function __construct() {
        parent::__construct();
    }

    public function incluir() {
        $this->insert("cliente", "cliente_nome, cliente_subtitulo, cliente_descricao,  cliente_imagem", "'$this->cliente_nome','$this->cliente_subtitulo', '$this->cliente_descricao', '$this->cliente_imagem'");
    }

    public function atualizar() {
        if ($this->cliente_imagem != "") {
            $this->update("cliente", "cliente_nome = '$this->cliente_nome', cliente_subtitulo = '$this->cliente_subtitulo',cliente_descricao = '$this->cliente_descricao'"
                    . ",cliente_imagem = '$this->cliente_imagem'", "cliente_id = '$this->cliente_id'");
        } else {
            $this->update("cliente", "cliente_nome = '$this->cliente_nome', cliente_subtitulo = '$this->cliente_subtitulo', cliente_descricao = '$this->cliente_descricao'", "cliente_id = '$this->cliente_id'");
        }
    }

    public function remover() {
        $this->delete("cliente", "cliente_id = '$this->cliente_id'");
    }

    public function removerArquivo() {
        $this->deleteArquivo("cliente", "cliente_id = '$this->cliente_id'", "cliente_imagem", "../images/team/");
    }

    public function enviar() {
        $this->upload("../images/team/", "cliente_imagem", "");
    }

    public function getCliente() {
        $this->select("cliente", "", "*", "", "WHERE cliente_id = $this->cliente_id", "");
    }

    public function getClientes() {
        $this->select("cliente");
    }

    public function JSON() {
        $this->getJSON("cliente", "cliente_id = '$this->cliente_id'");
    }

}
