<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends MY_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('Vehicle_model');
    }

    public function index() {
        $data['vehicles'] = $this->Vehicle_model->getAll();
        $this->render('vehicle/index', $data);
    }

	public function detail($id) {
        $data['vehicle'] = $this->Vehicle_model->getById($id);
        $this->render('vehicle/detail', $data);
    }
    
}
