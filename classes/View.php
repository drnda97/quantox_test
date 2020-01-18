<?php

class View
{
  public static $data = array();
  //Load pages
  public static function load($folder,$file)
  {
    require_once('../view/includes/header.php');
    require_once('../view/'.$folder.'/'.$file.'.php');
    require_once('../view/includes/footer.php');
  }
}
