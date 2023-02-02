<?php
include 'Database.php';

$database = new Database();
$dbConnect = $database->connect();

if(empty($_SESSION)){
  session_start();
}

if (!empty($_SESSION['USER'])) {
  $id = $_SESSION['USER']['id'];
  $tipe = $_SESSION['USER']['tipe'];

  if ($tipe == "siswa") {
    $user = $dbConnect->prepare("CALL getSiswaId($id)");
  } else {
    $user = $dbConnect->prepare("CALL getPetugasId($id)");
  }
  $user->execute();
  $sesi = $user->fetch();
  $user->nextRowset();

  json_encode($sesi);
}