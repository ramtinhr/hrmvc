<?php

class Pages extends Controller {
  /**
   * @var mixed
   */
  private $postModel;

  public function __construct() {
    // place to load model
  }

  public function index() {
    $data = [
      'title' => 'HRMVC'
    ];
    $this->view('pages/index', $data);
  }

  public function about() {
    $data = [
      'title' => 'About Us'
    ];
    $this->view('pages/about', $data);
  }
}
