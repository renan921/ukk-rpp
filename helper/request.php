<?php
include '../proses/Database.php';
include '../proses/ProsesData.php';

$database = new Database();
$dbConnect = $database->connect();
$prosesData = new ProsesData($dbConnect);

if(empty($_SESSION)){
  session_start();
}

if (!empty($_SESSION['USER'])) {
  $id = $_SESSION['USER']['id'];
  $tipe = $_SESSION['USER']['tipe'];
  $sesi = $prosesData->tampilUserId($tipe, $id);

  json_encode($sesi);
}