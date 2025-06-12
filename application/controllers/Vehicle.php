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
        $data['title'] = "Vehicle Details Page";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if the user is logged in
            if (!$this->session->userdata('user_id')) {
                redirect('auth/login'); // Redirect to login if not logged in
            }
        
            $this->load->library('form_validation');
        
            // Save order to database
            $data = [
                'vehicle_id' => $id,
                'user_id' => $this->session->userdata('user_id'),
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->insert('orders', $data);
    
            $this->session->set_flashdata('success', 'Booking successful. The admin will review your request.');
            redirect('vehicle/' . $id);
        } else {
            $data['vehicle'] = $this->Vehicle_model->getById($id);
            $this->render('vehicle/details', $data);
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
