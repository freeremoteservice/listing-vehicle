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

    public function about_us() {
        $data['title'] = "About Us";
        $this->render('about_us', $data);
    }

    public function contact_us() {
        $data['title'] = "Contact Us";
        $this->render('contact_us', $data);
    }

    public function privacy() {
        $data['title'] = "Privacy Policy";
        $this->render('privacy', $data);
    }

    public function terms_and_conditions() {
        $data['title'] = "Terms and Conditions";
        $this->render('terms_and_conditions', $data);
    }

    public function online_terms_and_conditions() {
        $data['title'] = "Online Terms and Conditions";
        $this->render('online_terms_and_conditions', $data);
    }

    public function faq() {
        $data['title'] = "How it Works";
        $this->render('faq', $data);
    }
}
