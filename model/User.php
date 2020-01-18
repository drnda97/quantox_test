<?php

class User
{
  private $conn;
  // constructor with db
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // insert user into utable users
  public function registerUser(string $email, string $password, string $name)
  {
    // hash the password
    $enc_password = md5($password);
    $query = "insert into users (email, password, name) values (:email, :password, :name)";
    // prepare statment
    $stmt = $this->conn->prepare($query);
    // bind params
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $enc_password);
    $stmt->bindParam(':name', $name);
    // execute
    if ($stmt->execute()) {
      return true;
    }
    return false;
  }
  // fetching user from database with entered email so we can compare entered password with the one in table
  public function login(string $email, string $password)
  {
    $query = 'select * from users where email = ?';
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // bind params
    $stmt->bindParam(1, $email);
    // Execute query
    $stmt->execute();
    // return assoc array
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function getUsers(string $searched)
  {
    $search = "%$searched%";
    $query = "select email, name from users where email like ? or name like ?";
    //prepare statement
    $stmt = $this->conn->prepare($query);
    // bind params
    $stmt->bindParam(1, $search);
    $stmt->bindParam(2, $search);
    // Execute query
    $stmt->execute();
    //return assoc array
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
