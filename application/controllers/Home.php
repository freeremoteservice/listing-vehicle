<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function index() {
        // Check if the user is logged in
        if ($this->session->userdata('logged_in') && is_admin()) {
            redirect('admin/dashboard'); // Admin's root page
        }

        $data['title'] = "Homepage";
        // Default behavior for guests (not logged in)
        $this->render('home', $data);
    }

    public function contact_us() {
        $data['title'] = "Contact Us";
        $this->render('contact_us', $data);
    }

    public function terms_of_services() {
        $data['title'] = "Terms of Services";
        $this->render('terms_of_services', $data);
    }

    public function blog() {
        $data['title'] = "Blog";
        $this->render('blog', $data);
    }
}
