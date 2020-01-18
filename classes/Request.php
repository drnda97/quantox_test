<?php

class Request
{
  public $url_parts = array();

  public function __construct()
  {
    $this->extractGet();
    $this->extractPost();
  }
  private function extractGet()
  {
    if (isset($_GET['url'])) {
      return $this->url_parts = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }
  }
  private function extractPost()
  {
    foreach ($_POST as $name => $value) {
      $this->post[$name] = $value;
    }
  }
}
