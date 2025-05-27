<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('form');
    }

	public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User_model->get_user_by_email($email);
            if ($user && password_verify($password, $user->password)) {
                $this->session->set_userdata([
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'avatar' => $user->avatar ?? 'default-avatar.png', // Default avatar if none set
                    'role' => $user->role,
                    'logged_in' => TRUE
                ]);
                $this->session->set_flashdata('success', 'Login successful.');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password.');
            }
        }
        $this->render('auth/login');
    }
    
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->load->library('form_validation');

            // Validation rules
            // $this->form_validation->set_rules('username', 'Username', 'required]'); // |is_unique[users.username
            // $this->form_validation->set_rules('email', 'Email', 'required|valid_email]'); // |is_unique[users.email]
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

            if ($this->form_validation->run() === TRUE) {
                $data = [
                    'username' => $this->input->post('username'),
                    'email'    => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'role'     => 'user' // Default to 'user'
                ];

                if ($this->User_model->register($data)) {
                    $this->session->set_flashdata('success', 'Registration successful. Please log in.');
                    redirect('auth/login');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong. Try again.');
                }
            }
        }
        $this->render('auth/register');
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Logged out successfully.');
        redirect('auth/login');
    }
}
