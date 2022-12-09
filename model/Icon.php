<?php
/*
 * @author Dudu Muniz
 */
require_once 'Controle.php';

class Icon extends Controle {

    public $db;
    public $icones_id;
    public $icones_nome;
    public $result;

    public function __construct() {
        parent:: __construct();
    }
    public function getIcones() {
        $this->select("icones");
    }

}
