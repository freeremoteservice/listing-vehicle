<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Vehicle_model');
        $this->load->model('Order_model');
        $this->load->model('User_model');
    }

    public function index() {
        $data['title'] = "List Vehicles Page";

        $type = $this->input->get('type'); // Get the type from the query string
        $data['types'] = ['car', 'van', 'motorbike', 'caravan', 'tractor']; // Vehicle types

        if ($type && in_array($type, $data['types'])) {
            $data['vehicles'] = $this->Vehicle_model->get_vehicles_by_type($type); // Fetch filtered vehicles
        } else {
            $data['vehicles'] = $this->Vehicle_model->get_all_vehicles(); // Fetch all vehicles
        }

        $data['selected_type'] = $type; // Pass the selected type
        $this->render('vehicle/index', $data); // Load the view
    }

	public function details($id) {
        $data['title'] = "Vehicle Details Page";
        $data['page_level_js'] = [
            'public/js/pages/vehicle/details.js'
        ];
        $data['vehicle'] = $this->Vehicle_model->getById($id);

        $this->render('vehicle/details', $data);
    }

    public function validate_id_front() {
        // Check if a file is uploaded
        if (empty($_FILES['id_front']['name'])) {
            $this->form_validation->set_message('validate_id_front', 'The {field} field is required.');
            return FALSE;
        }
        return TRUE;
    }

    public function validate_id_back() {
        // Check if a file is uploaded
        if (empty($_FILES['id_back']['name'])) {
            $this->form_validation->set_message('validate_id_back', 'The {field} field is required.');
            return FALSE;
        }
        return TRUE;
    }

    public function upload_file($field_name, $upload_path) {
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|webp|pdf|doc|docx';
        $config['max_size'] = 5120; // 2MB
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
    
        if (!empty($_FILES[$field_name]['name'])) {
            if (!$this->upload->do_upload($field_name)) {
                $error = $this->upload->display_errors();
                log_message('error', 'Upload Error for ' . $field_name . ': ' . $error);
                $this->session->set_flashdata('error', $error);
                return false;
            } else {
                return $this->upload->data('file_name');
            }
        } else {
            log_message('error', 'No file selected for ' . $field_name);
        }
        return null; // No file uploaded
    }

    public function order_vehicle() {
        $status = 'failed';
        $message = '';
        $flagUploadingFiles = false;

        if ($this->session->userdata('role') == 'private') {
            $data = array();
            $id_front_img = $this->upload_file('id_front_img', './uploads/users/');
            $id_back_img = $this->upload_file('id_back_img', './uploads/users/');
            if ($id_front_img) {
                if ($id_back_img) {
                    $data['id_front_img'] = $id_front_img;
                    $data['id_back_img'] = $id_back_img;
                    $this->User_model->update_user($this->session->userdata('user_id'), $data);
                    $flagUploadingFiles = true;
                } else {
                    $message = "Failed to upload back image of your ID";
                }
            } else {
                $message = "Failed to upload front image of your ID";
            }
        }

        if ($this->session->userdata('role') == 'company') {
            $data = array();
            $user_photo = $this->upload_file('user_photo', './uploads/users/');
            $company_document = $this->upload_file('company_document', './uploads/users/');
            if ($user_photo) {
                if ($company_document) {
                    $data['photo_img'] = $user_photo;
                    $data['company_doc_file'] = $company_document;
                    $this->User_model->update_user($this->session->userdata('user_id'), $data);
                    $flagUploadingFiles = true;
                } else {
                    $message = "Failed to upload document file of your company";
                }
            } else {
                $message = "Failed to upload your photo";
            }
        }

        if ($flagUploadingFiles) {
            $order_data = array(
                'user_id' => $this->session->userdata('user_id'),
                'vehicle_id' => $_POST['vehicle_id'],
                'delivery_address' => $_POST['delivery_address'],
                'status' => 'pending'
            );
            $this->Order_model->insert_order($order_data);

            $status = "success";
            $message = "Thank you for booking! Admin will reply via email with an invoice after checking your order";
        }
        
        echo json_encode([
            'status' => $status,
            'message' => $message
        ]);
    }
}
