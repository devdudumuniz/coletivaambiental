<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Smtpr extends Controle {

    public $db;
    public $smtp_id;
    public $smtp_port;
    public $smtp_host;
    public $smtp_username;
    public $smtp_password;
    public $smtp_fromname;
    public $smtp_bcc;

    public function __construct() {
        parent:: __construct();
    }

    public function atualizar() {
        if ($this->smtp_password != "") {
            $this->update("smtp", "smtp_port= '$this->smtp_port', smtp_host = '$this->smtp_host', smtp_username = '$this->smtp_username',"
                    . " smtp_password = '$this->smtp_password', smtp_fromname = '$this->smtp_fromname', smtp_bcc= '$this->smtp_bcc' ", "smtp_id = '$this->smtp_id'");
        } else {
            $this->update("smtp", "smtp_port= '$this->smtp_port', smtp_host = '$this->smtp_host', smtp_username = '$this->smtp_username',"
                    . "smtp_fromname = '$this->smtp_fromname', smtp_bcc= '$this->smtp_bcc' ", "smtp_id = '$this->smtp_id'");
        }
    }

    public function getSmtp() {
        $this->select("smtp");
    }

}
