<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class ModuloAparencia extends Controle {

    public $modulo_aparencia_id;
    public $modulo_aparencia_cor;
    public $modulo_aparencia_favicon;
    public $modulo_aparencia_logo;

    public function __construct() {
        parent::__construct();
    }

    public function atualizar() {
        $query = "modulo_aparencia_cor = '$this->modulo_aparencia_cor'";
        if (isset($_FILES['modulo_aparencia_logo']['name']) && !empty($_FILES['modulo_aparencia_logo']['name'])) {
            $query .= ", modulo_aparencia_logo = '$this->modulo_aparencia_logo'";
        }
        if (isset($_FILES['modulo_aparencia_favicon']['name']) && !empty($_FILES['modulo_aparencia_favicon']['name'])) {
            $query .= ", modulo_aparencia_favicon = '$this->modulo_aparencia_favicon'";
        }

        $this->update("modulo_aparencia", "$query", "modulo_aparencia_id = '$this->modulo_aparencia_id'");
    }

    public function removerLogo() {
        $this->deleteArquivo("modulo_aparencia", "modulo_aparencia_id = '$this->modulo_aparencia_id'", "modulo_aparencia_imagem", "../images/");
    }

    public function enviarLogo() {
        $this->upload("../images/", "modulo_aparencia_logo", "");
    }

    public function removerFavicon() {
        $this->deleteArquivo("modulo_aparencia", "modulo_aparencia_id = '$this->modulo_aparencia_id'", "modulo_aparencia_favicon", "./assets/img/ico/");
    }

    public function enviarFavicon() {
        $this->upload("./assets/img/ico/", "modulo_aparencia_favicon", "favicon.ico");
    }

    public function getModuloAparencia() {
        $query = "WHERE modulo_aparencia_id = 1";
        $this->select("modulo_aparencia", "", "*", "", "$query", "");
    }

}
