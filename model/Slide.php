<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Slide extends Controle {

    public $db;
    public $slide_id;
    public $slide_imagem;
    public $slide_nome;
    public $slide_subtitulo;
    public $slide_subtitulo1;
    public $result;

    public function __construct() {
        parent::__construct();
        $this->db = new DB;           
    }

    public function incluir() {
        $this->insert("slide", "slide_imagem, slide_nome, slide_subtitulo, slide_subtitulo1", "'$this->slide_imagem', '$this->slide_nome', '$this->slide_subtitulo', '$this->slide_subtitulo1'");
    }

    public function atualizar() {
        $query = "slide_nome ='$this->slide_nome', slide_subtitulo = '$this->slide_subtitulo', slide_subtitulo1 = '$this->slide_subtitulo1'";
        if (isset($_FILES['slide_imagem']['name']) && !empty($_FILES['slide_imagem']['name'])) {
            $query .= ", slide_imagem = '$this->slide_imagem'";
        }
        $this->update("slide", "$query", "slide_id = '$this->slide_id'");
    }

    public function remover() {
        $this->delete("slide", "slide_id = '$this->slide_id'");
    }

    public function removerArquivo() {
        $this->deleteArquivo("slide", "slide_id = '$this->slide_id'", "slide_imagem", "../images/");
    }

    public function getImagens() {
        $this->db->query('select * from slide order by slide_id desc')->fetchAll();
    }

    public function enviar() {
        $this->upload("../images/", "slide_imagem", "");
    }

    public function JSON() {
        $this->getJSON("slide", "slide_id = '$this->slide_id'");
    }
}
