<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function is_admin() {
    $ci =& get_instance();
    return $ci->session->userdata('role') === 'admin';
}

