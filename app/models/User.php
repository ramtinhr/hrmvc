<?php
class User {
  private $db;

  public function __construct(){
    $this->db = new Database;
  }

  /*
   * register user
   */
  public function register($data) {
    $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);

    // Execute
    if($this->db->execute()) {
        return true;
    } else {
        return false;
      }
  }
	/*
	 * Login User
	 */
	public function login($email, $password) {
		$this->db->findBy('email', 'users', $email);
		$hashed_password = $this->db->row->password;
		if (password_verify($password, $hashed_password)) {
			return $this->db->row;
		} else {
			return false;
		}
	}
	
  /*
   * Find user By email
   */
  public function findUserByEmail($email){
		$this->db->findBy('email', 'users', $email);
    // Check row
    if($this->db->rowCount() > 0){
      return true;
    } else {
      return false;
    }
  }
}
