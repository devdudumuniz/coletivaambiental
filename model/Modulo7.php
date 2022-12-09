<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Modulo7 extends Controle {

    public $db;
    public $modulo7_id;
    public $modulo7_nome;
    public $modulo7_descricao;
    public $modulo7_status;
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
        $this->update("modulo7", "modulo7_nome  = '$this->modulo7_nome',"
                . "modulo7_descricao = '$this->modulo7_descricao', modulo7_status = '$this->modulo7_status'", "modulo7_id = '$this->modulo7_id'");
    }
    public function getModulo7() {
        $this->select("modulo7", "", "*", "", "WHERE modulo7_id = 1", "");
    }

}
