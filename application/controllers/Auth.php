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
        $data['title'] = "Sign In";

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
        $this->render('auth/login', $data);
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
    
    public function register() {
        $data['title'] = "Sign Up";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', [
                'required' => 'The %s field is required.',
                'valid_email' => 'Please enter a valid %s.',
                'is_unique' => 'This %s is already registered.'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('street', 'Street', 'required');
            $this->form_validation->set_rules('postal_code', 'Postal Code', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('birthdate', 'Birthdate', 'required');
            $this->form_validation->set_rules('user_type', 'User Type', 'required');
            if ($this->input->post('user_type') == 'private') {
                $this->form_validation->set_rules('id_front_img', 'ID Front Image', 'callback_file_required[id_front_img]');
                $this->form_validation->set_rules('id_back_img', 'ID Back Image', 'callback_file_required[id_back_img]');

            }
            if ($this->input->post('user_type') == 'company') {
                $this->form_validation->set_rules('user_photo', 'User Photo', 'callback_file_required[user_photo]');
                $this->form_validation->set_rules('company_document', 'Company Document', 'callback_file_required[company_document]');
            }

            if ($this->form_validation->run() === TRUE) {
                $user_type = $this->input->post('user_type');

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
                    'role' => $user_type, // default to private user
                ];

                if ($user_type == 'private') {
                    $id_front_img = $this->upload_file('id_front_img', './uploads/users/');
                    $id_back_img = $this->upload_file('id_back_img', './uploads/users/');
                    if ($id_front_img && $id_back_img) {
                        $data['id_front_img'] = $id_front_img;
                        $data['id_back_img'] = $id_back_img;
                    } else {
                        $this->render('auth/register', $data);
                        return;
                    }
                }

                if ($user_type == 'company') {
                    $user_photo = $this->upload_file('user_photo', './uploads/users/');
                    $company_document = $this->upload_file('company_document', './uploads/users/');
                    if ($user_photo && $company_document) {
                        $data['photo_img'] = $user_photo;
                        $data['company_doc_file'] = $company_document;
                    } else {
                        $this->render('auth/register', $data);
                        return;
                    }
                }

                if ($this->User_model->register($data)) {
                    $this->session->set_flashdata('success', 'Registration successful. Please log in.');
                    redirect('auth/login');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong. Try again.');
                }
            }
        }

        $this->render('auth/register', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Logged out successfully.');
        redirect('auth/login');
    }
}
