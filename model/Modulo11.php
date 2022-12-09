<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Modulo11 extends Controle {

    public $db;
    public $modulo11_id;
    public $modulo11_nome;
    public $modulo11_button;
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
        $this->update("modulo11", "modulo11_nome  = '$this->modulo11_nome', modulo11_button = '$this->modulo11_button'", "modulo11_id = '$this->modulo11_id'");
    }

    public function getModulo11() {
        $this->select("modulo11", "", "*", "", "WHERE modulo11_id = 1", "");
    }

}
