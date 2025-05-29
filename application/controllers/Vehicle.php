<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Vehicle_model');
    }

    public function index() {
        $data['title'] = "List Vehicles Page";

        $type = $this->input->get('type'); // Get the type from the query string
        $data['types'] = ['car', 'van', 'motorbike', 'caravan', 'tractor']; // Vehicle types

        if ($type && in_array($type, $data['types'])) {
            $data['vehicles'] = $this->Vehicle_model->get_vehicles_by_type($type); // Fetch filtered vehicles
        } else {
            $data['vehicles'] = $this->Vehicle_model->get_all_vehicles(); // Fetch all vehicles
        }

        $data['selected_type'] = $type; // Pass the selected type
        $this->render('vehicle/index', $data); // Load the view
    }

	public function details($id) {
        $data['vehicle'] = $this->Vehicle_model->getById($id);
        $this->render('vehicle/details', $data);
    }

    public function book($vehicle_id) {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login'); // Redirect to login if not logged in
        }
    
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('id_front', 'Front ID Image', 'callback_validate_id_front');
        $this->form_validation->set_rules('id_back', 'Back ID Image', 'callback_validate_id_back');

        // File upload configuration
        $config['upload_path'] = './uploads/ids/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if ($this->form_validation->run() == FALSE) {
            // Load the vehicle detail page with errors
            $data['vehicle'] = $this->Vehicle_model->getById($vehicle_id);
            $this->render('vehicle/details', $data);
        } else {
            // Upload Front ID
            $id_front = NULL;
            if (!empty($_FILES['id_front']['name'])) {
                if ($this->upload->do_upload('id_front')) {
                    $image_data = $this->upload->data();   
                    $id_front = $image_data['file_name']; // Save the file name
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('vehicle/' . $vehicle_id);
                }
            }
    
            // Upload Front ID
            $id_back = NULL;
            if (!empty($_FILES['id_back']['name'])) {
                if ($this->upload->do_upload('id_back')) {
                    $image_data = $this->upload->data();   
                    $id_back = $image_data['file_name']; // Save the file name
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('vehicle/' . $vehicle_id);
                }
            }
    
            // Save order to database
            $data = [
                'vehicle_id' => $vehicle_id,
                'user_id' => $this->session->userdata('user_id'),
                'id_front_image' => $id_front,
                'id_back_image' => $id_back,
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->insert('orders', $data);
    
            $this->session->set_flashdata('success', 'Booking successful. The admin will review your request.');
            redirect('vehicle/' . $vehicle_id);
        }
    }
    
    
    public function validate_id_front() {
        // Check if a file is uploaded
        if (empty($_FILES['id_front']['name'])) {
            $this->form_validation->set_message('validate_id_front', 'The {field} field is required.');
            return FALSE;
        }
        return TRUE;
    }

    public function validate_id_back() {
        // Check if a file is uploaded
        if (empty($_FILES['id_back']['name'])) {
            $this->form_validation->set_message('validate_id_back', 'The {field} field is required.');
            return FALSE;
        }
        return TRUE;
    }
    
    
}
