<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Modulo2 extends Controle {

    public $bd;
    public $modulo2_id;
    public $modulo2_nome;
    public $modulo2_nome1;
    public $modulo2_nome2;
    public $modulo2_nome3;
    public $modulo2_nome4;
    public $modulo2_nome5;
    public $modulo2_nome6;
    public $modulo2_nome7;
    public $modulo2_nome8;
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
        $this->update("modulo2", "modulo2_nome = '$this->modulo2_nome', modulo2_nome1 = '$this->modulo2_nome1',"
                . " modulo2_nome2  = '$this->modulo2_nome2', modulo2_nome3 = '$this->modulo2_nome3',"
                . " modulo2_nome4 = '$this->modulo2_nome4', modulo2_nome5 = '$this->modulo2_nome5',"
                . " modulo2_nome6 = '$this->modulo2_nome6', modulo2_nome7 = '$this->modulo2_nome7',"
                . " modulo2_nome8 = '$this->modulo2_nome8',"
                . " modulo2_status = '$this->modulo2_status'","modulo2_id = '$this->modulo2_id'");
    }

    public function getModulo2() {
        $this->select("modulo2", "", "*", "", "WHERE modulo2_id = 1", "");
    }

}
