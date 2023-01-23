<?php

if (empty($_SESSION['USER'])) {
  header('location:login.php');
} else {
  if ($_SESSION['USER']['tipe'] == "petugas") {
    header('location:petugas');
  } else {
    header('location:siswa');
  }
}