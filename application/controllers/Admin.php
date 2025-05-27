<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct();

        // Load the required model
        $this->load->model('Vehicle_model');

        if (!is_admin()) {
            redirect('auth/login');
        }
    }

    public function dashboard() {
        $data['vehicles'] = $this->Vehicle_model->getAll();
        $this->render('admin/dashboard', $data);
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

}
