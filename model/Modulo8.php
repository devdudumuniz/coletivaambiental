<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Modulo8 extends Controle {

    public $db;
    public $modulo8_id;
    public $modulo8_nome;
    public $modulo8_descricao;
    public $modulo8_status;
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
        $this->update("modulo8", "modulo8_nome  = '$this->modulo8_nome', modulo8_descricao = '$this->modulo8_descricao',"
                . " modulo8_status = '$this->modulo8_status'", "modulo8_id = '$this->modulo8_id'");
    }

    public function getModulo8() {
        $this->select("modulo8", "", "*", "", "WHERE modulo8_id = 1", "");
    }

}
