<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Vehicle_model');
        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation']); // Load form validation library
        $this->load->library('upload'); // Load upload library

        if (!is_admin()) {
            redirect('auth/login');
        }
    }

    public function dashboard() {
        $data['vehicles'] = $this->Vehicle_model->get_all_vehicles();
        $data['page_level_css'] = [
            'assets/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css',
            'assets/plugins/DataTables/Responsive-2.2.2/css/responsive.dataTables.min.css'
        ];
        $data['page_level_js'] = [
            'assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js',
            'assets/plugins/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js'
        ];
        $this->render('admin/dashboard', $data);
    }

    public function vehicles() {
        $data['vehicles'] = $this->Vehicle_model->get_all_vehicles();
        $data['page_level_css'] = [
            'assets/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css',
            'assets/plugins/DataTables/Responsive-2.2.2/css/responsive.dataTables.min.css'
        ];
        $data['page_level_js'] = [
            'assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js',
            'assets/plugins/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js'
        ];
        $this->render('admin/vehicles', $data);
    }

    public function add_vehicle() {
        // Set form validation rules
        $this->form_validation->set_rules('type', 'Vehicle Type', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');

        // File upload configuration
        $config['upload_path'] = './uploads/vehicles/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if ($this->form_validation->run() == FALSE) {
            // Load the add vehicle view with validation errors
            $this->render('admin/add_vehicle');
        } else {
            // Handle image upload
            $image = NULL;

            // Attempt to upload the image
            if (!empty($_FILES['image']['name'])) {
                if ($this->upload->do_upload('image')) {
                    $image_data = $this->upload->data();
                    $image = $image_data['file_name']; // Save the file name
                } else {
                    // Set an error message for image upload
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    $this->load->view('admin/add_vehicle');
                    return;
                }
            }

            // Prepare data for insertion
            $data = [
                'type' => $this->input->post('type'),
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'image' => $image
            ];

            // Insert the vehicle
            if ($this->Vehicle_model->insert_vehicle($data)) {
                $this->session->set_flashdata('success', 'Vehicle added successfully!');
                redirect('admin/add_vehicle');
            } else {
                $this->session->set_flashdata('error', 'Failed to add vehicle.');
                $this->render('admin/add_vehicle');
            }
        }
    }

    public function orders() {
        $this->load->model('Order_model');
        $data['orders'] = $this->Order_model->getAll();
        $this->load->view('admin/orders', $data);
    }

    public function approve($id) {
        $this->Order_model->updateStatus($id, 'approved');
        redirect('admin/orders');
    }

    public function reject($id) {
        $this->Order_model->updateStatus($id, 'rejected');
        redirect('admin/orders');
    }

    public function users() {
        $data['users'] = $this->User_model->get_users_by_role('user');
        $data['page_level_css'] = [
            'assets/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css',
            'assets/plugins/DataTables/Responsive-2.2.2/css/responsive.dataTables.min.css'
        ];
        $data['page_level_js'] = [
            'assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js',
            'assets/plugins/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js'
        ];
        $this->render('admin/users', $data);
    }

}
