<?php
include_once 'konten.php';
include_once 'beranda.php';

// Dapatkan ID konten dari parameter URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $controller = new BerandaController();
    $controller->show($id);
}
?>
