<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	public function __construct() {
        parent::__construct();

        // Load the required model
        $this->load->model('User_model');

        if (is_admin()) {
            redirect('auth/login');
        }
    }
}
