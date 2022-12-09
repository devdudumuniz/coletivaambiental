<?php

/*
 * @author Dudu Muniz
 */

require_once 'Controle.php';
class Pagina extends Controle {

    public $db;
    public $pagina_id;
    public $pagina_nome;
    public $pagina_descricao;
    public $pagina_imagem;
    public $pagina_area;
    public $pagina_data;
    public $pagina_description;
    public $pagina_keywords;
    public $pagina_autor;
    public $result;

    public function __construct() {
        parent::__construct();
    }

    public function incluir() {
        $this->insert("pagina", "pagina_nome, pagina_descricao,  pagina_imagem,  pagina_area, pagina_data, pagina_autor, pagina_description, pagina_keywords", "'$this->pagina_nome','$this->pagina_descricao',"
                . " '$this->pagina_imagem', '$this->pagina_area', '$this->pagina_data','$this->pagina_autor','$this->pagina_description', '$this->pagina_keywords'");
    }

    public function atualizar() {
        $query = "pagina_nome ='$this->pagina_nome', pagina_descricao  = '$this->pagina_descricao', pagina_area = '$this->pagina_area', pagina_data = '$this->pagina_data',"
                . " pagina_autor = '$this->pagina_autor',pagina_description = '$this->pagina_description', pagina_keywords = '$this->pagina_keywords'";
        if (isset($_FILES['pagina_imagem']['name']) && !empty($_FILES['pagina_imagem']['name'])) {
            $query .= ", pagina_imagem = '$this->pagina_imagem'";
        }
        $this->update("pagina", "$query", "pagina_id = '$this->pagina_id'");
    }

    public function remover() {
        $this->delete("pagina", "pagina_id = '$this->pagina_id'");
    }

    public function removerArquivo() {
        $this->deleteArquivo("pagina", "pagina_id = '$this->pagina_id'", "pagina_imagem", "../images/blog/");
    }

    public function enviar() {
        $this->upload("../images/blog/", "pagina_imagem", "");
    }

    public function getPagina() {
        $this->select("pagina", "", "*", "", "INNER JOIN area ON (pagina_area = area_id) WHERE pagina_id = $this->pagina_id", "");
    }

    public function getPaginas() {
        $this->select("pagina", "", "*", "", "INNER JOIN area ON (pagina_area = area_id) ORDER BY pagina_id DESC", "");
    }

    
    public function getPosts() {
        $this->select("pagina", "", "*", "", "INNER JOIN area ON (pagina_area = area_id)LEFT JOIN comentario ON(comentario_pagina = pagina_id) GROUP BY pagina_id DESC", "");
    }
    /* USADO NA HOME */
    public function getNews() {
        $this->select("pagina", "", "*", "", "ORDER BY pagina_id DESC LIMIT 0,6", "");
    }

    public function getCategoria() {
        $this->select("pagina", "", "*", "", "INNER JOIN area ON (pagina_area = area_id) WHERE pagina_area = $this->pagina_id", "");
    }
    
    /* USADO NA HOME */
    public function getBlog() {
        $this->select("pagina", "", "*", "pagina_id DESC LIMIT 0,6", "INNER JOIN area ON (pagina_area = area_id)", "");
    }

    public function getBy() {
        $this->select("area", "", "*", "pagina_nome DESC", "INNER JOIN pagina ON (pagina_area = area_id) WHERE area_id = $this->pagina_area", "");
    }

    public function JSON() {
        $this->getJSON("pagina", "pagina_id = '$this->pagina_id'");
    }

    public function getSearch() {
        $busca = $_POST['busca'];
        $this->db->query("SELECT * FROM pagina INNER JOIN area ON (pagina_area = area_id)WHERE pagina_nome like '%$busca%' or pagina_descricao LIKE '%$busca%'")->fetchAll(); //OR 
        $this->db->data;
    }

    public function CountComentario($pagina_id) {
        $this->db->query("SELECT * FROM comentario WHERE comentario_pagina  = $pagina_id AND comentario_status = 1")->fetchAll(); //OR 
        if (isset($this->db->data[0])) {
            return count($this->db->data);
        } else {
            return 0;
        }
    }

}
