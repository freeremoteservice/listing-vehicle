<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function get_all_vehicles() {
        return $this->db->get('vehicles')->result_array(); // Fetch all records as an array
    }

    // Insert a vehicle into the database
    public function insert_vehicle($data) {
        return $this->db->insert('vehicles', $data);
    }

}
