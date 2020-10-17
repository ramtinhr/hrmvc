<?php
  /*
   * Instantiate from whoops class to and register it
   */
  $whoops = new \Whoops\Run;
  $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
  $whoops->register();
