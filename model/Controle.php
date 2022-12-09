<?php

/*
 * @author Dudu Muniz
 */
class Controle {

    public $db;

    public function __construct() {
        if (file_exists('../database/DB.php')) {
            require_once '../database/DB.php';
        } elseif (file_exists('database/DB.php')) {
            require_once 'database/DB.php';
        } else {
            echo 'arquivo nao encontrado';
        }
        //$this->db = new DB();
        require_once 'Registry.php';
        $registry = Registry::getInstance();
        if( $registry->get('db') == false ) {
            $registry->set('db', new DB);
        }
        $this->db = $registry->get('db');   
    }

    public function map($arr = array()) {
        try {
            if (!is_array($arr) && empty($arr)) {
                throw new Exception('ArrayMapNull');
            } else {
                foreach ($arr as $k => $v) {
                    if (!isset($this->$k)) {
                        $this->$k = "";
                    }
                    $this->$k = $v;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        return $this;
    }

    public function insert($table, $campos, $values) {
        $sql = "INSERT INTO $table ($campos) VALUES ($values);";
        $this->db->query($sql);
    }

    public function select($table, $where = '', $fields = '*', $order = '', $parametro = null, $limit = null) {
        $this->db->query('SELECT ' . $fields . ' FROM ' . $table
                . (($where) ? ' WHERE ' . $where : '')
                . (($parametro) ? '  ' . $parametro : '')
                . (($order) ? ' ORDER BY ' . $order : '')
                . (($limit) ? ' LIMIT ' . $limit : ''))->fetchAll();
        if (isset($this->db->data[0])) {
            $this->map($this->db->data[0]);
        }
        $this->db->data;
    }

    function update($table, $data, $campo_id) {
        $sql = "UPDATE $table  SET $data WHERE $campo_id";
        $this->db->query($sql);
    }

    public function delete($tabela, $campo_id) {
        $sql = "DELETE FROM $tabela WHERE $campo_id";
        $this->db->query($sql);
    }

    public function deleteArquivo($tabela, $id, $campo, $pasta) {
        $this->db->query("SELECT * FROM $tabela WHERE $id")->fetchall();
        if ($this->db->data) {
            foreach ($this->db->data as $row) {
                if (file_exists($pasta . $row->$campo)) {
                    @unlink($pasta . $row->$campo);
                }
            }
        }
    }

    public function Moderar($tabela, $campo_status, $campo_id, $id, $status) {
        $sql = "UPDATE $tabela SET ";
        $sql .= " $campo_status  = $status";
        $sql .= " WHERE $campo_id = $id";
        $this->result = $this->db->query($sql);
    }

    public function Posicao($item, $tabela, $campo_posicao, $campo_id) {
        foreach ($item as $pos => $id) {
            $id = preg_replace('/li_/', '', $id);
            $sql = "UPDATE $tabela SET ";
            $sql .= "$campo_posicao = $pos ";
            $sql .= " WHERE $campo_id = $id";
            $this->result = $this->db->query($sql);
            print_r($this->result);
        }
    }

    public function upload($pasta, $campo, $nome = '') {
        $_UP['pasta'] = "$pasta";
        $_UP['tamanho'] = (1024 * 1024) * 5000;
        $_UP['extensoes'] = array('jpg', 'png', 'gif', 'jpeg','.ico');
        $_UP['renomeia'] = true;
        $_UP['erros'][0] = 'Não houve erro';
        $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
        $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
        $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
        $_UP['erros'][4] = 'Não foi feito o upload do arquivo';
        if ($_FILES["$campo"]['error'] != 0) {
            $this->erro = "Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES["$campo"]['error']];
        }
        $extensao = strtolower(end(explode('.', $_FILES["$campo"]['name'])));
        if (array_search($extensao, $_UP['extensoes']) === false) {
            $this->erro = "Por favor, envie arquivos com as seguintes extensões: pdf";
        } else if ($_UP['tamanho'] < $_FILES["$campo"]['size']) {
            $this->erro = "O arquivo enviado é muito grande, envie arquivos de até 10Mb.";
        } else {
            if (empty($nome)) {
                $nome_final = time() . ".$extensao";
            } else {
                $nome_final = $nome;
            }
            if (move_uploaded_file($_FILES["$campo"]['tmp_name'], $_UP['pasta'] . $nome_final)) {
                $this->$campo = $nome_final;
            } else {
                $this->erro = "Não foi possível enviar o arquivo, tente novamente";
            }
        }
    }

    public function getJSON($tabela, $campo_id) {
        $this->db->query("SELECT * FROM $tabela WHERE $campo_id")->fetchAll();
        $json = "";
        if ($this->db->data[0]) {
            foreach ($this->db->data as $retorna) {
                $json = $retorna;
            }
            echo json_encode($json);
        }
    }

    public function getSoma($campo, $tabela) {
        $query = mysql_query("select SUM($campo) as soma FROM $tabela ");
        $cont = mysql_fetch_array($query);
        $total = $cont["soma"];
        if ($total) {
            return number_format($total, 2, ",", ".");
        } else {
            return 0;
        }
    }

    function count_download($post_id) {
        $current_count = get_post_meta($post_id, 'download_count', 1);
        if ($current_count != null) {
            $current_count += 1;
            update_post_meta($post_id, 'download_count', $current_count);
        }
    }

    public function getCount($tabela, $parametro = NULL) {
        $this->db->query("SELECT * FROM $tabela $parametro")->fetchAll();
        if ($this->db->numRows()) {
            echo $this->db->numRows();
        } else {
            return NULL;
        }
    }
}
