<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function getAll() {

    }

    // Insert a vehicle into the database
    public function insert_vehicle($data) {
        return $this->db->insert('vehicles', $data);
    }

}
