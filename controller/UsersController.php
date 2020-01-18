<?php

class UsersController
{
  private $err = array();

  public function startpage()
  {
    View::load('user','startpage');
  }
  public function register()
	{
		View::load('user', 'register');
	}
  public function noscript()
	{
		View::load('user', 'noscript');
	}

	public function login()
	{
		View::load('user', 'login');
	}
	public function results()
	{
    if(!isset($_POST['search_submit'])){
      header('Location: /user/startpage');
    }

    global $db;
    $user = new User($db);
    View::$data['information'] = $user->getUsers($_POST['search']); 
    View::load('user', 'results');
	}
  public function insertinbase()
  {
    if (!isset($_POST['register'])) {
      header('Location: /user/register?err=Something went wrong');
    }
    global $db;
    $error = '';
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $re_password = trim($_POST['re_password']);

    //checking for empty fields
    if(empty($name)){
      $this->err[] = 'Name field can\'t be empty';
    }

    if(empty($email)){
      $this->err[] = 'Email field can\'t be empty';
    }

    if(empty($password)){
      $this->err[] = 'Password field can\'t be empty';
    }

    //checking if passwords match
    if($password != $re_password){
      $this->err[] = 'Passwords don\'t match';
    }
    if(count($this->err) > 0){
      foreach($this->err as $err){
        $error .= $err . ', '; 
      }
      $error = substr($error, 0, -2);
      header('Location: /user/register?err=' . $error);
      die;
    }
    $user = new User($db);
    if ($user->registerUser($email, $password, $name)) {
      header('Location: /user/startpage?succ=Successful registered');
    }else{
      header('Location: /user/register?err=Something went wrong');
    }
  }
  public function loginuser()
  {
    global $db;
    if (!isset($_POST['login'])) {
      header('Location: ' . $_SERVER['HTTP_REFERER'] . '?err=' . $this->err);
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new User($db);
    $get_user = $user->login($email, $password);
    if ($get_user) {
      if (md5($password) === $get_user['password']) {
        $_SESSION['user'] = $get_user;
        header('Location: /user/startpage?succ=Welcome ' . $_SESSION['user']['name']);
      }else{
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?err=Error logging you in.');
      }
    }else{
      header('Location: ' . $_SERVER['HTTP_REFERER'] . '?err=Error logging you in.');
    }
  }
  public function logout()
	{
    unset($_SESSION['user']);
    header('Location: /user/startpage');
	}
}
