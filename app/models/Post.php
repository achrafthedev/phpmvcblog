<?php
class Post {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all public posts (includes author details)
    public function findAllPosts() {
        $this->db->query('SELECT posts.*, users.username, users.email 
                          FROM posts 
                          INNER JOIN users ON posts.user_id = users.id 
                          ORDER BY posts.created_at DESC');

        return $this->db->resultSet();
    }

    // Add a new post
    public function addPost($data) {
        $this->db->query('INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Find a single post by ID
    public function findPostById($id) {
        $this->db->query('SELECT posts.*, users.username, users.email 
                          FROM posts 
                          INNER JOIN users ON posts.user_id = users.id 
                          WHERE posts.id = :id');

        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Find all posts belonging to a specific user
    public function findPostsByUserId($user_id) {
        $this->db->query('SELECT * FROM posts WHERE user_id = :user_id ORDER BY created_at DESC');
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }

    // Update an existing post
    public function updatePost($data) {
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete a post
    public function deletePost($id) {
        $this->db->query('DELETE FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
