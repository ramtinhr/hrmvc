<?php


class Posts extends Controller {
	
	private $postModel;
	private Request $request;
	private $userModel;
	
	public function __construct() {
		if (!isLoggedIn()) {
			redirect('users/login');
		}
		$this->postModel = $this->model('Post');
		$this->request = new Request();
		$this->userModel = $this->model('User');
	}
	
	public function index() {
		// Get posts
		$posts = $this->postModel->getPosts();
		$data = [
			'posts' => $posts
		];
		$this->view('posts/index', $data);
	}
	
	/*
	 * add post
	 */
	public function add() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Sanatize the post
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				'title' => trim($_POST['title']),
				'body' => trim($_POST['body']),
				'user_id' => trim($_SESSION['user_id']),
			];
			$rules = [
				'title' => 'required',
				'body' => 'required|min:8',
			];
			$this->request->validate($data, $rules);
			if (count($this->request->errors) === 0) {
				if ($this->postModel->addPost($data)) {
					flash('post_message', 'Posts Added successfully');
					redirect('posts');
				} else {
					die('something went wrong');
				}
			} else {
				$data['errors'] = $this->request->errors;
				$this->view('posts/add', $data);
			}
		} else {
			$data = [
				'title' => '',
				'body' => '',
			];
			$this->view('posts/add', $data);
		}
	}
	
	/*
 * show post
 */
	public function show($id) {
		$post = $this->postModel->findPostById($id);
		$user = $this->userModel->findUserById($post->user_id);
		$data = [
			'post' => $post,
			'user' => $user,
		];
		$this->view('posts/show',$data);
	}
	
	/*
	 * edit post
	 */
	public function edit($id) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Sanatize the post
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				'title' => trim($_POST['title']),
				'body' => trim($_POST['body']),
				'user_id' => trim($_SESSION['user_id']),
			];
			$rules = [
				'title' => 'required',
				'body' => 'required|min:8',
			];
			$this->request->validate($data, $rules);
			if (count($this->request->errors) === 0) {
				if ($this->postModel->updatePost($data)) {
					flash('post_message', 'Posts Updated successfully');
					redirect('posts');
				} else {
					die('something went wrong');
				}
			} else {
				$data['errors'] = $this->request->errors;
				$this->view('posts/edit', $data);
			}
		} else {
			// Get existing post from model
			$post = $this->postModel->findPostById($id);
			// Check for owner
			if ($post->user_id !== $_SESSION['user_id']) {
				redirect('posts');
			}
			$data = [
				'id' => $id,
				'title' => $post->title,
				'body' => $post->body,
			];
			$this->view('posts/edit', $data);
		}
	}
	
	/*
	 * delete post
	 */
	public function delete($id) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Get existing post from model
			$post = $this->postModel->findPostById($id);
			// Check for owner
			if ($post->user_id !== $_SESSION['user_id']) {
				redirect('posts');
			}
			if ($this->postModel->deletePost($id)) {
				flash('post_message', 'Post Removed Successfully');
				redirect('post');
			} else {
				die('something went wrong');
			}
		} else {
			redirect('posts');
		}
	}
}
