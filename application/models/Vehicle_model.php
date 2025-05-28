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

    public function get_vehicles_by_type($type) {
        // Fetch vehicles by type
        $this->db->where('type', $type);
        return $this->db->get('vehicles')->result_array();
    }

    public function getById($id) {
        $this->db->where('id', $id);
        return $this->db->get('vehicles')->row();
    }

    // Insert a vehicle into the database
    public function insert_vehicle($data) {
        return $this->db->insert('vehicles', $data);
    }

}
