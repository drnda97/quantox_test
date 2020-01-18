<?php

//
// $conn->query("SET NAMES utf8");
// $conn->query("SET CHARACTER SET utf8");
// $conn->query("SET COLLATION_CONNECTION='utf8_general_ci'");
//

class Database
{
  // DB Params
  protected $host = 'localhost';
  protected $db_name = 'quantox';
  protected $username = 'root';
  protected $password = '';
  protected $conn;

  public function connect()
  {
    $this->conn = null;
    try {
      $this->conn = new PDO('mysql:host=' . $this->host .';dbname=' . $this->db_name, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'Connection Error: ' . $e->getMessage();
    }
    return $this->conn;
  }
}
