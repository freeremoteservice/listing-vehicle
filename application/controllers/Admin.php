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
            'assets/plugins/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js',
            'public/js/custom.dataTables.js'
        ];
        $this->render('admin/orders', $data);
    }

    public function approve_order($order_id) {
        // Get order details
        $order = $this->Order_model->get_order_by_id($order_id);

        if ($order) {
            if ($this->Order_model->update_order_status($order_id, 'approved')) {
                $this->session->set_flashdata('success', 'Order approved successfully.');
    
                // // Send email notification
                // $this->send_order_approval_email($order);
    
                // // Redirect with success message
                // $this->session->set_flashdata('success', 'Order approved and email sent.');
            } else {
                $this->session->set_flashdata('error', 'Failed to approve the order.');
            }
        } else {
            $this->session->set_flashdata('error', 'Order not found.');
        }

        redirect('admin/orders');
    }

    private function send_order_approval_email($order) {
        // Load email library if not already loaded
        $this->load->library('email');
    
        // Set email parameters
        $this->email->from('contact@rr-insolvenz.de', 'Your Site Name');
        $this->email->to($order->user_email); // Replace with customer's email
        $this->email->subject('Order Approved');
        $this->email->message("
            <p>Dear {$order->user_name},</p>
            <p>Your order with ID <strong>#{$order->id}</strong> has been approved!</p>
            <p>Thank you for shopping with us.</p>
        ");
    
        // Send the email
        if (!$this->email->send()) {
            var_dump($this->email->print_debugger());exit;
            log_message('error', $this->email->print_debugger());
        }
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
            'assets/plugins/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js',
            'public/js/custom.dataTables.js'
        ];
        $this->render('admin/vehicles', $data);
    }

    public function add_vehicle() {
        $data['title'] = "Add Vehicle";

        // Set form validation rules
        $this->form_validation->set_rules('type', 'Vehicle Type', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('manufacturer_brand', 'Manufacturer Brand', 'required');
        $this->form_validation->set_rules('manufacturer_type', 'Manufacturer Type', 'required');
        $this->form_validation->set_rules('license_plate', 'License Plate', 'required');
        $this->form_validation->set_rules('vehicle_id_number', 'Vehicle Identification Number', 'required');
        $this->form_validation->set_rules('total_weight', 'Total Weight', 'required|numeric');
        $this->form_validation->set_rules('equipment', 'Equipment', 'required');

        // File upload configuration
        $config['upload_path'] = './uploads/vehicles/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE;

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/add_vehicle', $data);
        } else {
            $uploaded_images = [];

            // Handle multiple image uploads
            if (!empty($_FILES['image']['name'][0])) {
                $files = $_FILES;
                $file_count = count($_FILES['image']['name']);

                for ($i = 0; $i < $file_count; $i++) {
                    $_FILES['image']['name'] = $files['image']['name'][$i];
                    $_FILES['image']['type'] = $files['image']['type'][$i];
                    $_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
                    $_FILES['image']['error'] = $files['image']['error'][$i];
                    $_FILES['image']['size'] = $files['image']['size'][$i];

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('image')) {
                        $image_data = $this->upload->data();
                        $uploaded_images[] = $image_data['file_name'];
                    } else {
                        // If any file fails to upload, show error and return
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        $this->render('admin/add_vehicle', $data);
                        return;
                    }
                }
            }

            // Prepare data for insertion
            $vehicle_data = [
                'type' => $this->input->post('type'),
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'damages' => $this->input->post('damages'),
                'price' => $this->input->post('price'),
                'manufacturer_brand' => $this->input->post('manufacturer_brand'),
                'manufacturer_type' => $this->input->post('manufacturer_type'),
                'license_plate' => $this->input->post('license_plate'),
                'vehicle_id_number' => $this->input->post('vehicle_id_number'),
                'total_weight' => $this->input->post('total_weight'),
                'equipment' => $this->input->post('equipment'),
                'image' => implode(',', $uploaded_images) // save multiple images as CSV (or move this to separate table later)
            ];

            // Insert vehicle record
            if ($this->Vehicle_model->insert_vehicle($vehicle_data)) {
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

        // Validation Rules
        $this->form_validation->set_rules('type', 'Vehicle Type', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('manufacturer_brand', 'Manufacturer Brand', 'required');
        $this->form_validation->set_rules('manufacturer_type', 'Manufacturer Type', 'required');
        $this->form_validation->set_rules('license_plate', 'License Plate', 'required');
        $this->form_validation->set_rules('vehicle_id_number', 'Vehicle Identification Number', 'required');
        $this->form_validation->set_rules('total_weight', 'Total Weight', 'required|numeric');
        $this->form_validation->set_rules('equipment', 'Equipment', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Load form with errors
            $data['vehicle'] = $this->Vehicle_model->getById($vehicle_id);
            $this->render('admin/edit_vehicle', $data);
            return;
        }

        // Handle Multiple Image Uploads
        $uploadedImages = []; 

        if (!empty($_FILES['image']['name']) && is_array($_FILES['image']['name'])) {
            $filesCount = count($_FILES['image']['name']);

            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['file']['name']     = $_FILES['image']['name'][$i];
                $_FILES['file']['type']     = $_FILES['image']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
                $_FILES['file']['error']    = $_FILES['image']['error'][$i];
                $_FILES['file']['size']     = $_FILES['image']['size'][$i];

                $config['upload_path']   = './uploads/vehicles/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = 5120;
                $config['encrypt_name']  = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('file')) {
                    $dataUpload = $this->upload->data();
                    $uploadedImages[] = $dataUpload['file_name'];
                } else {//print_r($_FILES['image']['name']);die;
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    $data['vehicle'] = $this->Vehicle_model->getById($vehicle_id);
                    $this->render('admin/edit_vehicle', $data);
                    return;
                }
            }
        }

        // Prepare vehicle data
        $updateData = [
            'type'                => $this->input->post('type'),
            'name'                => $this->input->post('name'),
            'description'         => $this->input->post('description'),
            'damages'             => $this->input->post('damages'),
            'price'               => $this->input->post('price'),
            'manufacturer_brand'  => $this->input->post('manufacturer_brand'),
            'manufacturer_type'   => $this->input->post('manufacturer_type'),
            'license_plate'       => $this->input->post('license_plate'),
            'vehicle_id_number'   => $this->input->post('vehicle_id_number'),
            'total_weight'        => $this->input->post('total_weight'),
            'equipment'           => $this->input->post('equipment')
        ];

        // Save image filenames as comma-separated string
        if (!empty($uploadedImages)) {
            $updateData['image'] = implode(',', $uploadedImages);
        }

        // Update DB
        if ($this->Vehicle_model->update_vehicle($vehicle_id, $updateData)) {
            $this->session->set_flashdata('success', 'Vehicle updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to update vehicle.');
        }

        redirect('admin/edit_vehicle/' . $vehicle_id);
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
            'assets/plugins/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js',
            'public/js/custom.dataTables.js'
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
