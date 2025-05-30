<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Vehicle_model');
        $this->load->model('Order_model');
        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation']); // Load form validation library
        $this->load->library('upload'); // Load upload library

        if (!is_admin()) {
            redirect('auth/login');
        }
    }

    public function dashboard() {
        $data['title'] = "Admin Panel - Dashboard";
        $this->render('admin/dashboard', $data);
    }

    public function orders() {
        $data['title'] = "Admin Panel - List Orders";
        $data['orders'] = $this->Order_model->get_all_orders();
        $data['page_level_css'] = [
            'assets/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css',
            'assets/plugins/DataTables/Responsive-2.2.2/css/responsive.dataTables.min.css'
        ];
        $data['page_level_js'] = [
            'assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js',
            'assets/plugins/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js'
        ];
        $this->render('admin/orders', $data);
    }

    public function approve_order($order_id) {
        if ($this->Order_model->update_order_status($order_id, 'approved')) {
            $this->session->set_flashdata('success', 'Order approved successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to approve the order.');
        }
        redirect('admin/orders');
    }

    public function reject_order($order_id) {
        if ($this->Order_model->update_order_status($order_id, 'rejected')) {
            $this->session->set_flashdata('success', 'Order rejected successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to reject the order.');
        }
        redirect('admin/orders');
    }

    public function vehicles() {
        $data['title'] = "Admin Panel - List Vehicles";
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
        $data['title'] = "Add Vehicle";

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
            $this->render('admin/add_vehicle', $data);
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
                    $this->render('admin/add_vehicle', $data);
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
                $this->render('admin/add_vehicle', $data);
            }
        }
    }

    public function edit_vehicle($vehicle_id) {
        $data['title'] = "Edit Vehicle";

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
            $data['vehicle'] = $this->Vehicle_model->getById($vehicle_id);
            $this->render('admin/edit_vehicle', $data);
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
                    $data['vehicle'] = $this->Vehicle_model->getById($vehicle_id);
                    $this->render('admin/edit_vehicle', $data);
                    return;
                }
            }

            // Prepare data for updating
            $data = [
                'type' => $this->input->post('type'),
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price')
            ];

            if ($image) {
                $data['image'] = $image;
            }

            // Update the vehicle
            if ($this->Vehicle_model->update_vehicle($vehicle_id, $data)) {
                $this->session->set_flashdata('success', 'Vehicle updated successfully!');
                redirect('admin/edit_vehicle/' . $vehicle_id);
            } else {
                $this->session->set_flashdata('error', 'Failed to update vehicle.');
                $data['vehicle'] = $this->Vehicle_model->getById($vehicle_id);
                $this->render('admin/edit_vehicle', $data);
            }
        }

    }

    public function remove_vehicle($vehicle_id) {
        if ($this->Vehicle_model->delete_vehicle($vehicle_id)) {
            $this->session->set_flashdata('success', 'Vehicle removed successfully.');
        } else {
            $this->session->set_flashdata('error', 'Cannot delete vehicle. It has related orders.');
        }
        redirect('admin/vehicles'); // Redirect back to the vehicle list page
    }

    public function users() {
        $data['title'] = "Admin Panel - List Users";
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

    public function remove_user($user_id) {
        if ($this->User_model->delete_user($user_id)) {
            $this->session->set_flashdata('success', 'User removed successfully.');
        } else {
            $this->session->set_flashdata('error', 'User cannot be removed because there are related orders.');
        }
        redirect('admin/users');
    }    

}
