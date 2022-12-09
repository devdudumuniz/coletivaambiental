<?php

require_once '../loader.php';
$foto = new Foto();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $foto_url = md5(uniqid(time())) . '.jpg';
    if (move_uploaded_file($_FILES['file']['tmp_name'], "../images/portfolio/" . $foto_url)) {
        $foto_portfolio = $_REQUEST['portfolio_id'];
        $foto->foto_url = $foto_url;
        $foto->foto_portfolio = "$foto_portfolio";
        $foto_id = $foto->incluir();
        echo json_encode(array('foto_url' => $foto_url, 'foto_id' => $foto_id));
    }
    exit;
}

