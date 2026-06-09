<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Register User
    public function register($data) {
        $this->db->query('INSERT INTO users (username, email, password) VALUES(:username, :email, :password)');

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login User (supports username or email)
    public function login($usernameOrEmail, $password) {
        $this->db->query('SELECT * FROM users WHERE username = :login OR email = :login');
        $this->db->bind(':login', $usernameOrEmail);

        $row = $this->db->single();

        if ($row && password_verify($password, $row->password)) {
            return $row;
        } else {
            return false;
        }
    }

    // Find user by email (returns boolean for checking existence)
    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Get user record by Email
    public function getUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    // Get user record by ID
    public function getUserById($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Update User Profile
    public function update($data) {
        $this->db->query('UPDATE users SET username = :username, password = :password WHERE id = :id');
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':id', $data['id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
