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

    public function update_vehicle($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('vehicles', $data);
    }

    public function delete_vehicle($vehicle_id) {
        // Check if there are related orders
        $this->db->where('vehicle_id', $vehicle_id);
        $query = $this->db->get('orders');
        
        if ($query->num_rows() > 0) {
            return false; // Cannot delete the vehicle
        }

        // No related orders, proceed with deletion
        $this->db->where('id', $vehicle_id);
        return $this->db->delete('vehicles');
    }

    public function get_recent_items() {
        $this->db->order_by('created_at desc');
        $this->db->limit(3, 0);
        return $this->db->get('vehicles')->result_array();
    }

}
