<?php

  /*
   * define database connection constants
   */
  define('DB_HOST', getenv('DB_HOST'));
  define('DB_USER', getenv('DB_USERNAME'));
  define('DB_PASS', getenv('DB_PASSWORD'));
  define('DB_NAME', getenv('DB_DATABASE'));
  define('DB_PORT', getenv('DB_PORT'));
  define('DB_CONNECTION', getenv('DB_CONNECTION'));
  /*
   * define important and usable app constants
   */
  define('APP_ROOT', dirname(__DIR__));
  define('APP_URL', 'http://localhost');
  define('APP_NAME', getenv('APP_NAME'));
