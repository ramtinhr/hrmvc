<?php

class Users extends Controller {
  private Request $request;
  private $userModel;
	private $db;
	
  public function __construct() {
    $this->userModel = $this->model('User');
    $this->request = new Request();
    $this->db = new Database();
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
        'email' => 'required|unique:users',
        'password' => 'required|min:6',
        'confirm_password' => 'required|confirmed:password'
      ];
      $this->request->validate($data, $rules);
      if (count($this->request->errors) === 0) {
				// Hash password
				$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
				// Register User
				if($this->userModel->register($data)) {
					flash('register_success', 'You are now registered and can login');
					redirect('users/login');
				} else {
						die('Something went wrong');
				}
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
        'email' => 'required|found:users:No user found with this email',
        'password' => 'required|min:3',
      ];
      
      $this->request->validate($data, $rules);
      if (count($this->request->errors) === 0) {
        //check and set logged in User
				$loggedInUser = $this->userModel->login($data['email'], $data['password']);
				
				if ($loggedInUser) {
					// Create Session
					die('success');
				} else {
					$data['password_err'] = 'Password incorrect';
					$this->view('users/login', $data);
				}
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
