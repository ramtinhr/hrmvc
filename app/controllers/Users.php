<?php

class Users {
  public function __construct() {

  }

  /*
   * Register method
   */
  public function register() {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // process form
    } else {
      // Init data
      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Load view
      $this->view('users/register', $data);
    }
  }

}
