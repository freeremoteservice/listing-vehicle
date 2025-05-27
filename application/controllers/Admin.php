<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
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
