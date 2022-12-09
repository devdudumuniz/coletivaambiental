<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Servico extends Controle {

    public $db;
    public $servico_id;
    public $servico_nome;
    public $servico_icon;
    public $servico_descricao;
    public $result;

    public function __construct() {
        parent::__construct();
        require_once 'Registry.php';
        $registry = Registry::getInstance();
        if( $registry->get('db') == false ) {
            $registry->set('db', new DB);
        }
        $this->db = $registry->get('db');           
    }

    public function gravar() {
        $this->insert("servico", " servico_nome, servico_icon, servico_descricao", " '$this->servico_nome','$this->servico_icon','$this->servico_descricao'");
    }

    public function atualizar() {
        $this->update("servico", "servico_nome  = '$this->servico_nome', servico_icon = '$this->servico_icon',"
                . " servico_descricao = '$this->servico_descricao'", "servico_id = '$this->servico_id'");
    }

    public function remover() {
        $this->delete("servico", "servico_id = '$this->servico_id'");
    }

    public function getServico() {
        $this->select("servico", "", "*", "", "WHERE servico_id = $this->servico_id", "");
    }

    public function getServicos() {
        $this->select("servico");
    }

    public function getJason() {
        $this->getJSON("servico", "servico_id = '$this->servico_id'");
    }

}
