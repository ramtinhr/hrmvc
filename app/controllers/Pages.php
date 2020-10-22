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
      'title' => 'HRMVC',
      'description' => 'Codepowers Community First MVC Framework It Can Be More Powerful If You Help Us To Be Better'
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
