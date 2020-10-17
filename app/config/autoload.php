<?php

  /*
  * Define vendor constant before requiring autoload
  *
  */
  define('DIR_VENDOR', dirname(dirname(__DIR__)) . '/vendor');

  /*
   * vendor autoloader and vendor path
   */
  if (file_exists(DIR_VENDOR . '/autoload.php')) {
    require_once(DIR_VENDOR . '/autoload.php');
  }
