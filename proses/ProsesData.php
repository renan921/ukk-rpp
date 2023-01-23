<?php

class ProsesData {
  protected $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  public function prosesLogin($tipe, $username, $password)
  {
    $password = md5($password);
    if ($tipe == "petugas") {
      $data = $this->db->prepare("SELECT * FROM petugas WHERE username = ? AND password = ?");
    } else {
      $data = $this->db->prepare("SELECT * FROM siswa WHERE nisn = ? AND password = ?");
    }
    $data->execute(array($username, $password));
    $count = $data->rowCount();

    if ($count > 0) {
      return $data->fetch();
    } else {
      return "gagal";
    }
  }

  public function tampilData($table)
  {
    $data = $this->db->prepare("SELECT * FROM $table");
    $data->execute();
    return $data->fetchAll();
  }

  public function tampilUserId($tipe, $id)
  {
    if ($tipe == "petugas") {
      $data = $this->db->prepare("SELECT * FROM petugas WHERE id_petugas = ?");
    } else {
      $data = $this->db->prepare("SELECT * FROM siswa WHERE nisn = ?");
    }
    $data->execute(array($id));
    return $data->fetch();
  }

  function tampilDataId($tabel, $where, $id)
  {
    $data = $this->db->prepare("SELECT * FROM $tabel WHERE $where = ?");
    $data->execute(array($id));
    return $data->fetch();
  }

  function tampilDataIdAll($tabel, $where, $id)
  {
    $data = $this->db->prepare("SELECT * FROM $tabel WHERE $where = ?");
    $data->execute(array($id));
    return $data->fetchAll();
  }

  public function tambahData($tabel, $data)
  {
    $rowKey = implode(",", array_keys($data));
    $rowData = "'".implode("','", $data) . "'";

    $data = $this->db->prepare("INSERT INTO $tabel ($rowKey) VALUES ($rowData)");
    return $data->execute();
  }

  public function hapusData($tabel, $where, $id)
  {
    $data = $this->db->prepare("DELETE FROM $tabel WHERE $where = ?");
    return $data->execute(array($id));
  }

  public function ubahData($tabel, $data, $where, $id)
  {
    $valueSet = array();
    foreach($data as $key => $value) {
      $valueSet[] = $key . " = '" . $value . "'";
    }
    $dataValue = join(",",$valueSet);

    $data = $this->db->prepare("UPDATE $tabel SET $dataValue WHERE $where = ?");
    return $data->execute(array($id));
  }

}