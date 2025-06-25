<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('form');
        $this->load->library('upload');
    }

    public function login() {
        $data['title'] = "Anmelden";
        $data['page_level_js'] = [
            'public/js/pages/auth/login.js'
        ];

        $this->render('auth/login', $data);
    }

    public function do_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->User_model->get_user_by_email($email);

        $status = 'failed';
        $message = '';
        
        if ($user) {
            if (password_verify($password, $user->password)) {
                $this->session->set_userdata([
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'avatar' => $user->avatar ?? 'default-avatar.png', // Default avatar if none set
                    'role' => $user->role,
                    'logged_in' => TRUE
                ]);

                $status = "success";
                $message = "Congratulation! You've successfully logged in.";
            } else {
                $message = "Your password is wrong";
            }
        } else {
            $message = "You're not registered yet!";
        }

        echo json_encode([
            'status' => $status,
            'message' => $message
        ]);
    }

    public function register() {
        $data['title'] = "Sign Up";
        $data['page_level_js'] = [
            'public/js/pages/auth/register.js'
        ];

        $this->render('auth/register', $data);
    }

    public function do_register() {
        $data = [
            'username' => $this->input->post('username'),
            'email'    => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'street' => $this->input->post('street'),
            'postal_code' => $this->input->post('postal_code'),
            'city' => $this->input->post('city'),
            'country' => $this->input->post('country'),
            'phone' => $this->input->post('phone'),
            'birthdate' => $this->input->post('birthdate'),
            'role' => $this->input->post('user_type')
        ];

        $status = 'failed';
        $message = '';

        if ($this->User_model->register($data)) {
            $status = "success";
            $message = "Registration successful. Please log in.";
        } else {
            $message = "Something went wrong. Try again.";
        }

        echo json_encode([
            'status' => $status,
            'message' => $message
        ]);
    }

    public function upload_file($field_name, $upload_path) {
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);
    
        if (!empty($_FILES[$field_name]['name'])) {
            if (!$this->upload->do_upload($field_name)) {
                $error = $this->upload->display_errors();
                log_message('error', 'Upload Error for ' . $field_name . ': ' . $error);
                $this->session->set_flashdata('error', $error);
                return false;
            } else {
                return $this->upload->data('file_name');
            }
        } else {
            log_message('error', 'No file selected for ' . $field_name);
        }
        return null; // No file uploaded
    }

    public function file_required($dummy, $field_name) {
        if (isset($_FILES[$field_name]) && $_FILES[$field_name]['error'] === 0) {
            return true;
        }

        $this->form_validation->set_message('file_required', 'The {field} field is required.');
        return false;
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Logged out successfully.');
        redirect('auth/login');
    }
}
