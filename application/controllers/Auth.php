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
            // if ($this->input->post('invoice_email')) {
            //     $this->form_validation->set_rules('invoice_email', 'Invoice Email', 'valid_email|is_unique[users.invoice_email]', [
            //         'valid_email' => 'Please enter a valid %s.',
            //         'is_unique' => 'This %s is already registered.'
            //     ]);
            // }
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
                $this->form_validation->set_rules('id_front_img', 'ID Front Image', 'required');
                $this->form_validation->set_rules('id_back_img', 'ID Back Image', 'required');
            }
            if ($this->input->post('user_type') == 'company') {
                $this->form_validation->set_rules('user_photo', 'User Photo', 'required');
                $this->form_validation->set_rules('company_document', 'Company Document', 'required');
            }

            // File upload configuration
            $config['upload_path'] = './uploads/users/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE;

            $this->upload->initialize($config);

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
                    // Handle image upload
                    $id_front_img = NULL;

                    // Attempt to upload the image
                    if (!empty($_FILES['id_front_img']['name'])) {
                        if ($this->upload->do_upload('id_front_img')) {
                            $image_data = $this->upload->data();
                            $id_front_img = $image_data['file_name']; // Save the file name
                        } else {
                            // Set an error message for image upload
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            $this->render('auth/register', $data);
                            return;
                        }
                    }

                    // Handle image upload
                    $id_back_img = NULL;

                    // Attempt to upload the image
                    if (!empty($_FILES['id_back_img']['name'])) {
                        if ($this->upload->do_upload('id_back_img')) {
                            $image_data = $this->upload->data();
                            $id_back_img = $image_data['file_name']; // Save the file name
                        } else {
                            // Set an error message for image upload
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            $this->render('auth/register', $data);
                            return;
                        }
                    }

                    $data['id_front_img'] = $id_front_img;
                    $data['id_back_img'] = $id_back_img;

                    var_dump('test 1');
                    var_dump($_FILES);
                    var_dump($id_back_img);exit;
                }

                if ($user_type == 'company') {
                    // Handle image upload
                    $user_photo = NULL;

                    // Attempt to upload the image
                    if (!empty($_FILES['user_photo']['name'])) {
                        if ($this->upload->do_upload('user_photo')) {
                            $image_data = $this->upload->data();
                            $user_photo = $image_data['file_name']; // Save the file name
                        } else {
                            // Set an error message for image upload
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            $this->render('auth/register', $data);
                            return;
                        }
                    }

                    // Handle image upload
                    $company_document = NULL;

                    // Attempt to upload the image
                    if (!empty($_FILES['company_document']['name'])) {
                        if ($this->upload->do_upload('company_document')) {
                            $image_data = $this->upload->data();
                            $company_document = $image_data['file_name']; // Save the file name
                        } else {
                            // Set an error message for image upload
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            $this->render('auth/register', $data);
                            return;
                        }
                    }

                    $data['photo_img'] = $user_photo;
                    $data['company_doc_file'] = $company_document;
                    var_dump('test 2');
                    var_dump($user_photo);
                    var_dump($company_document);exit;
                }

                var_dump($data);exit;

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
