<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('form');
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
    
    public function register() {
        $data['title'] = "Sign Up";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->load->library('form_validation');

            // Validation rules
            $this->form_validation->set_rules('company_name', 'Company Name', 'required');
            if ($this->input->post('invoice_email')) {
                $this->form_validation->set_rules('invoice_email', 'Invoice Email', 'valid_email|is_unique[users.invoice_email]', [
                    'valid_email' => 'Please enter a valid %s.',
                    'is_unique' => 'This %s is already registered.'
                ]);
            }
            $this->form_validation->set_rules('company_street', 'Street', 'required');
            $this->form_validation->set_rules('company_postal_code', 'Postal Code', 'required');
            $this->form_validation->set_rules('company_city', 'City', 'required');
            $this->form_validation->set_rules('company_country', 'Country', 'required');
            $this->form_validation->set_rules('company_phone', 'Phone', 'required');
            $this->form_validation->set_rules('company_mobile', 'Mobile', 'required');
            $this->form_validation->set_rules('user_name', 'Username', 'required|is_unique[users.username]');
            $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|is_unique[users.email]', [
                'required' => 'The %s field is required.',
                'valid_email' => 'Please enter a valid %s.',
                'is_unique' => 'This %s is already registered.'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('user_salutation', 'Salutation', 'required'); // Mr. Mrs. Ms. Dr. Prof.
            $this->form_validation->set_rules('user_first_name', 'First Name', 'required');
            $this->form_validation->set_rules('user_last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('user_street', 'Street', 'required');
            $this->form_validation->set_rules('user_postal_code', 'Postal Code', 'required');
            $this->form_validation->set_rules('user_city', 'City', 'required');
            $this->form_validation->set_rules('user_country', 'Country', 'required');
            $this->form_validation->set_rules('user_mobile', 'Mobile', 'required');
            $this->form_validation->set_rules('user_birthdate', 'Birthdate', 'required');

            if ($this->form_validation->run() === TRUE) {
                $data = [
                    'company_name' => $this->input->post('company_name'),
                    'invoice_email' => $this->input->post('invoice_email'),
                    'company_street' => $this->input->post('company_street'),
                    'company_address_suffix' => $this->input->post('company_address_suffix'),
                    'company_postal_code' => $this->input->post('company_postal_code'),
                    'company_city' => $this->input->post('company_city'),
                    'company_country' => $this->input->post('company_country'),
                    'company_phone' => $this->input->post('company_phone'),
                    'company_mobile' => $this->input->post('company_mobile'),
                    'company_website' => $this->input->post('company_website'),
                    'vat' => $this->input->post('vat'),
                    'username' => $this->input->post('user_name'),
                    'email'    => $this->input->post('user_email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'user_salutation' => $this->input->post('user_salutation'),
                    'user_title' => $this->input->post('user_title'),
                    'user_first_name' => $this->input->post('user_first_name'),
                    'user_last_name' => $this->input->post('user_last_name'),
                    'user_street' => $this->input->post('user_street'),
                    'user_postal_code' => $this->input->post('user_postal_code'),
                    'user_city' => $this->input->post('user_city'),
                    'user_country' => $this->input->post('user_country'),
                    'user_mobile' => $this->input->post('user_mobile'),
                    'user_birthdate' => $this->input->post('user_birthdate'),
                    'newsletter' => $this->input->post('newsletter_checkbox'),
                    'role' => 'user' // Default to 'user'
                ];


                if ($this->User_model->register($data)) {
                    $this->session->set_flashdata('success', 'Registration successful. Please log in.');
                    redirect('auth/login');
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong. Try again.');
                }
            } else {
                var_dump($this->form_validation->error_array());exit;
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
