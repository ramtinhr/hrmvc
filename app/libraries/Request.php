<?php

class Request {
  public array $errors = [];
  public array $rules = [];
  /**
   * Validation function for empty data min and max length
   * @param $requests
   * @param $rules
   */
  public function validate($requests, $rules) {
    foreach ($rules as $key => $rule) {
      $this->errors[$key] = [];
      // Check if inputs are empty
      $this->checkEmptyData($requests[$key], $key);
      // Validation rules
      $this->rules[$key] = explode('|', $rule);
      for ($i = 0; $i <= 4; $i++) {
        // Check if inputs are lower than min length rule
        $rule = explode(':', $this->rules[$key][$i]);
        $this->checkMinLength($requests[$key], $rule[0], $key, $rule[1]);
        // Check if inputs characters more than max length rule
        $this->checkMaxLength($requests[$key], $rule[0], $key, $rule[1]);
        // check two inputs are equal
        $this->checkConfirmed($requests[$key], $requests[$rule[1]], $rule[1], $rule[0], $key);
        // check unique to table
        $this->checkUnique($requests[$key], $rule[1], $rule[0], $key);
      }
      // Check if there is any error
      if (count($this->errors[$key]) === 0) {
        unset($this->errors[$key]);
      }
    }
  }

  /**
   * check empty data
   * @param $input
   * @param $key
   */
  public function checkEmptyData($input, $key) {
    if ($input === '' || !$input) {
      array_push($this->errors[$key], 'Please Enter ' . str_replace('_', ' ', $key));
    }
  }

  /**
   * check for min length
   * @param $input
   * @param $rule
   * @param $key
   * @param $min
   */
  public function checkMinLength($input, $rule, $key, $min) {
    if ($rule === 'min' && strlen($input) < $min) {
      array_push($this->errors[$key],  str_replace('_', ' ', $key) . ' must be at least ' . $min . ' character');
    }
  }

  /**
   * check for min length
   * @param $input
   * @param $rule
   * @param $key
   * @param $max
   */
  public function checkMaxLength($input, $rule, $key, $max) {
    if ($rule === 'max' && strlen($input) < $max) {
      array_push($this->errors[$key],  str_replace('_', ' ', $key) . ' cannot be more than ' . $max . ' character');
    }
  }

  /*
   * confirm inputs and check if both of them are equal
   */
  public function checkConfirmed($input, $input2, $shouldConfirm, $rule, $key) {
    if ($rule === 'confirmed' && $input !== $input2) {
      array_push($this->errors[$key], $shouldConfirm . 's not match');
    }
  }

  /**
   * check for unique column of table
   * @param $input
   * @param $table
   * @param $rule
   * @param $key
   */
  public function checkUnique($input, $table, $rule, $key) {
    if ($rule === 'unique') {
      $db = new Database();
      $db->findBy($key, $table, $input);
      if ($db->rowCount() > 0) {
        array_push($this->errors[$key], str_replace('_', ' ', $key) . ' is already taken');
      }
    }
  }
}
