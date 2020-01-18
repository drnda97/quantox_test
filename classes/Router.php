<?php

class Router
{
  private $request;
  public $controller;
  public $method;
  public $params;
  private $alowed_routes = array(
    'startpage',
    'register',
    'login',
    'insertinbase',
    'loginuser',
    'results',
    'logout'
  );

  public function __construct($request)
  {
    $this->request = $request;
    $this->getController();
    $this->getMethod();
    $this->getParams();
    call_user_func_array([$this->controller, $this->method], $this->params);
  }
  private function getController()
  {
    $controller_slug = (isset($this->request->url_parts[0])) ? $this->request->url_parts[0] : 'users';

    if ($controller_slug != 'admin') {
      $controller_slug = 'users';
    }
    unset($this->request->url_parts[0]);
    return $this->controller = $this->instantiateController($controller_slug);
  }
  private function instantiateController($controller_slug)
  {
    $controller_name = ucfirst($controller_slug) .'Controller';
    require_once('../controller/' . $controller_name .'.php');
    return new $controller_name($this->request);
  }
  private function getMethod()
  {
    if (isset($this->request->url_parts[1])) {
      $method = $this->request->url_parts[1];
      if (!method_exists($this->controller, $method)) {
        $this->show404();
      }else if (!in_array($method, $this->alowed_routes)) {
        $this->show404();
      }else{
        unset($this->request->url_parts[1]);
        return $this->method = $method;
      }
    }else{
      $this->method = 'startpage';
    }
  }
  private function getParams()
  {
    return $this->params = (isset($this->request->url_parts)) ? $this->request->url_parts : array();
  }
  private function show404()
  {
    View::load('user','404');
  }
}
