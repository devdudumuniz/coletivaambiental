<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Modulo3 extends Controle {

    public $db;
    public $modulo3_id;
    public $modulo3_nome;
    public $modulo3_descricao;
    public $modulo3_imagem;
    public $modulo3_status;

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
        $query = "modulo3_nome = '$this->modulo3_nome', modulo3_descricao  = '$this->modulo3_descricao',modulo3_status = '$this->modulo3_status'";
        if (isset($_FILES['modulo3_imagem']['name']) && !empty($_FILES['modulo3_imagem']['name'])) {
            $query .= ", modulo3_imagem = '$this->modulo3_imagem'";
        }
        $this->update("modulo3", "$query", "modulo3_id = '$this->modulo3_id'");
    }

    public function getModulo3() {
        $this->select("modulo3", "", "*", "", "WHERE modulo3_id = 1", "");
    }

    public function removerArquivo() {
        $this->deleteArquivo("modulo3", "modulo3_id = '$this->modulo3_id'", "modulo3_imagem", "../images/");
    }

    public function enviar() {
        $this->upload("../images/", "modulo3_imagem", "");
    }

}
