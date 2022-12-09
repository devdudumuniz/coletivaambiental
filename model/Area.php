<?php
/*
 * @author Dudu Muniz
 */
require_once 'Controle.php';
class Area extends Controle {

    public $db;
    public $area_id;
    public $area_nome;
    public $result;
    public $area_todos = array();

    public function __construct() {
        parent::__construct();
    }

    public function incluir() {
        $this->insert("area", "area_nome", "'$this->area_nome'");
    }

    public function atualizar() {
        $this->update("area", "area_nome = '$this->area_nome'", "area_id = $this->area_id");
    }

    public function deletar() {
        require_once '../loader.php';
        $p = new Pagina;
        $p->pagina_area = $this->area_id;
        $p->getBy();
        foreach ($p->db->data as $rem) {
            $rem->pagina_id;
            $p->removerArquivo();
            $p->remover();
        }
        $this->delete("area", "area_id = $this->area_id");
    }

    public function getAreas() {
        $this->select("area", "", "*", "", " order by area_pos ASC", "");
    }

    public function getArea() {
        $this->select("area", "", "*", "", "INNER JOIN pagina ON (pagina_area = area_id) WHERE pagina_area = $this->area_id", "");
    }

    /* MENU CATEGORIA */

    public function getMenu() {
        $this->select("area", "", "*", "", "ORDER BY area_id DESC LIMIT 0,6", "");
    }

    /* MENU CATEGORIA */

    public function getJason() {
        $this->getJSON("area", "area_id = '$this->area_id'");
    }

    public function updatePos() {
        $item = $_POST['item'];
        $this->Posicao($item, "area", "area_pos", "area_id");
    }

}
