<?php
class User {

  /*
   * register user
   */
  public function register($data) {
  	global $db;
    $db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
    $db->bind(':name', $data['name']);
    $db->bind(':email', $data['email']);
    $db->bind(':password', $data['password']);

    // Execute
    if($db->execute()) {
        return true;
    } else {
        return false;
		}
  }
	/*
	 * Login User
	 */
	public function login($email, $password) {
		global $db;
		$db->findBy('email', 'users', $email);
		$hashed_password = $db->row->password;
		if (password_verify($password, $hashed_password)) {
			return $db->row;
		} else {
			return false;
		}
	}
	
  /*
   * Find user By email
   */
  public function findUserByEmail($email){
		global $db;
		$db->findBy('email', 'users', $email);
    // Check row
    if($db->rowCount() > 0){
      return true;
    } else {
      return false;
    }
  }
  
  /*
   * Find user by id
   */
	public function findUserById($id) {
		global $db;
		return $db->findBy('id', 'users', $id);
	}
}
