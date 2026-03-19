<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_hostel_feedback($data) {
        return $this->db->insert('hostel_feedback', $data);
    }

    public function insert_training_evaluation($data) {
        return $this->db->insert('training_evaluation', $data);
    }

    public function insert_training_calendar($data) {
        return $this->db->insert('training_calendar', $data);
    }
}
