<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Modulo4 extends Controle {

    public $db;
    public $modulo4_id;
    public $modulo4_descricao;
    public $modulo4_imagem;
    public $modulo4_status;
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

    public function atualizar() {
        $query = "modulo4_descricao = '$this->modulo4_descricao', modulo4_status = '$this->modulo4_status'";
        if (isset($_FILES['modulo4_imagem']['name']) && !empty($_FILES['modulo4_imagem']['name'])) {
            $query .= ", modulo4_imagem  = '$this->modulo4_imagem'";
        }
        $this->update("modulo4", "$query", "modulo4_id = '$this->modulo4_id'");
    }

    public function removerArquivo() {
        $this->deleteArquivo("modulo4", "modulo4_id = '$this->modulo4_id'", "modulo4_imagem", "../images/");
    }

    public function enviar() {
        $this->upload("../images/", "modulo4_imagem", "parallax-3.jpg");
    }

    public function getModulo4() {
        $this->select("modulo4", "", "*", "", "WHERE modulo4_id = 1", "");
    }

}
