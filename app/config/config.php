<?php
  use Symfony\Component\Dotenv\Dotenv;

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
  $dotenv = new Dotenv(true);
  $dotenv->load('./../.env');

  /*
   * define database connection constants
   */
  define('DB_HOST', getenv('DB_HOST'));
  define('DB_USER', getenv('DB_USERNAME'));

  /*
   * define important and usable app constants
   */
  define('APP_ROOT', dirname(__DIR__));
  define('APP_URL', 'http://localhost');
  define('APP_NAME', getenv('APP_NAME'));
