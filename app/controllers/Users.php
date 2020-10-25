<?php

class Users extends Controller {
  private Request $request;

  public function __construct() {
    $this->request = new Request();
  }
  /**
   * Register method
   */
  public function register() {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password'])
      ];

      $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required|min:6',
        'confirm_password' => 'required|confirmed:password'
      ];

      $this->request->validate($data, $rules);
      if (count($this->request->errors) === 0) {
        die('success');
      } else {
        $data['errors'] = $this->request->errors;
        // Load view with errors
        $this->view('/users/register', $data);
      }

    } else {
      // Init data
      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => ''
      ];

      // Load view
      $this->view('users/register', $data);
    }
  }

  /*
   * Login method
   */
  public function login() {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password'])
      ];

      // rules for validating $requests
      $rules = [
        'email' => 'required',
        'password' => 'required|min:3',
      ];

      $this->request->validate($data, $rules);
      if (count($this->request->errors) === 0) {
        die('success');
      } else {
        $data['errors'] = $this->request->errors;
        $this->view('users/login', $data);
      }

    } else {
      // Init data
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];

      // Load view
      $this->view('users/login', $data);
    }
  }

}
