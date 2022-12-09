<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';

class Contato extends Controle {

    public $db;
    public $contato_id;
    public $contato_email;
    public $contato_telefone1;
    public $contato_telefone2;
    public $contato_telefone3;
    public $contato_telefone4;
    public $contato_telefone5;
    public $contato_telefone6;
    public $contato_endereco;
    public $contato_long_lat;
    public $result;

    public function __construct() {
        parent:: __construct();
    }

    public function atualizar() {
        $this->update("contato", "contato_email = '$this->contato_email', contato_telefone1 = '$this->contato_telefone1', contato_telefone2 = '$this->contato_telefone2',"
                . "contato_telefone3 = '$this->contato_telefone3', contato_telefone4 = '$this->contato_telefone4',"
                . "contato_telefone5 = '$this->contato_telefone5', contato_telefone6 = '$this->contato_telefone6',"
                . "contato_endereco = '$this->contato_endereco', contato_long_lat = '$this->contato_long_lat'", "contato_id = $this->contato_id");
    }

    public function getContato() {
        $this->select("contato");
    }

}
