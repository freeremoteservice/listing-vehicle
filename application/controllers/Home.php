<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function index() {
        // Check if the user is logged in
        if ($this->session->userdata('logged_in') && is_admin()) {
            redirect('admin/dashboard'); // Admin's root page
        }

        // Default behavior for guests (not logged in)
        $this->render('home');
    }
}
