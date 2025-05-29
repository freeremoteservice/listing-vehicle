<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function get_all_orders() {
        return $this->db->get('orders')->result_array(); // Fetch all records as an array
    }

}
