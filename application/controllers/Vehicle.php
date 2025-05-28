<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Vehicle_model');
    }

    public function index() {
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
    
}
