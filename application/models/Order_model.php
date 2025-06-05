<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function get_all_orders() {
        $this->db->select('orders.*, users.username as user_name, vehicles.name as vehicle_name');
        $this->db->from('orders');
        $this->db->join('users', 'users.id = orders.user_id', 'left');
        $this->db->join('vehicles', 'vehicles.id = orders.vehicle_id', 'left');
        $query = $this->db->get();
        return $query->result(); // Returns an array of objects
    }

    public function get_order_by_id($order_id) {
        $this->db->select('orders.*, users.username as user_name, users.email as user_email, vehicles.name as vehicle_name');
        $this->db->from('orders');
        $this->db->join('users', 'users.id = orders.user_id', 'left');
        $this->db->join('vehicles', 'vehicles.id = orders.vehicle_id', 'left');
        $this->db->where('orders.id', $order_id);
        return $this->db->get()->row();
    }

    public function update_order_status($order_id, $status) {
        $this->db->where('id', $order_id);
        return $this->db->update('orders', ['status' => $status]);
    }

}
