<?php

class Post {
	private $posts;
	/*
	 * get all posts from database
	 */
	public function getPosts() {
		global $db;
		$db->query('SELECT *,
										posts.id as postId,
									 	users.id as userId,
									 	posts.created_at as postCreated,
									 	users.created_at as userCreated
										FROM posts
									  INNER JOIN users
									  ON posts.user_id = users.id
									  ORDER BY posts.created_at DESC'
		);
		return $db->all();
	}
	
	/*
	 * add post
	 */
	public function addPost($data) {
		global $db;
		$db->query('INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)');
		$db->bind(':user_id', $data['user_id']);
		$db->bind(':title', $data['title']);
		$db->bind(':body', $data['body']);
		
		// Execute
		if($db->execute()) {
			return true;
		} else {
			return false;
		}
	}
	/*
 * add post
 */
	public function updatePost($data) {
		global $db;
		$db->query('UPDATE  posts SET title = :title, body = :body WHERE id = :id');
		$db->bind(':id', $data['id']);
		$db->bind(':title', $data['title']);
		$db->bind(':body', $data['body']);
		
		// Execute
		if($db->execute()) {
			return true;
		} else {
			return false;
		}
	}
	
	/*
	 * delete post with id
	 */
	public function deletePost($id) {
		global $db;
		$db->query('DELETE FROM posts WHERE id = :id');
		// Bind values
		$db->bind(':id', $id);
		
		// Execute
		if ($db->execute()) {
			return true;
		} else {
			return false;
		}
	}
	
	/*
	 * get posts by id
	 */
	public function findPostById($id) {
		global $db;
		return $db->findBy('id', 'posts', $id);
	}
	
}
