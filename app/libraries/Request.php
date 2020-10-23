<?php

class Request {
  public array $errors = [];
  /**
   * Validation function for empty data min and max length
   * @param $requests
   * @param $rules
   * @return bool
   */
  public function validate($requests, $rules) {
    foreach ($rules as $key => $rule) {
      if ($requests[$key] === '' || !$requests[$key]) {
       $error[$key] = 'Please Enter ' . $key;
        array_push($this->errors, $error);
        return false;
      } else {
        return true;
      }
    }
  }
}
