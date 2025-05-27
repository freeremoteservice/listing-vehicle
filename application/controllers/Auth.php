<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function login() {
        // Load view for login
        $this->load->view('auth/login');
    }
    public function register() {
        // Load view for registration
        $this->load->view('auth/register');
    }
    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('auth/login');
    }
}
