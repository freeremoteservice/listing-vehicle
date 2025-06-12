<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function register($data) {
        return $this->db->insert('users', $data);
    }

    public function get_users_by_role($role) {
        // Fetch users by role
        // $this->db->where('role', $role);
        $this->db->where('role <> \'admin\'');
        return $this->db->get('users')->result_array();
    }

    public function get_user_by_email($email) {
        $this->db->where('email', $email);
        return $this->db->get('users')->row();
    }

    public function get_user_by_username($username) {
        $this->db->where('username', $username);
        return $this->db->get('users')->row();
    }

    public function delete_user($user_id) {
        // Check if the user has related orders
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('orders');
        
        if ($query->num_rows() > 0) {
            return false; // User cannot be deleted
        }
    
        // Delete the user if no related orders
        $this->db->where('id', $user_id);
        return $this->db->delete('users');
    }
    
}
