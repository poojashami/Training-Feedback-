<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Feedback_model');
        
        // Set language from session or default to english
        $lang = $this->session->userdata('site_lang');
        if (!$lang) {
            $lang = 'english';
            $this->session->set_userdata('site_lang', 'english');
        }
        $this->lang->load('feedback', $lang);
    }

    public function index() {
        $data['title'] = 'Dashboard';
        
        // Get some basic stats from DB
        $data['hostel_count'] = $this->db->count_all('hostel_feedback');
        $data['training_count'] = $this->db->count_all('training_evaluation');
        $data['total_count'] = $data['hostel_count'] + $data['training_count'];

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function reports() {
        $data['title'] = 'Reports Summary';
        
        // Get recent feedback
        $this->db->order_by('id', 'DESC');
        $this->db->limit(5);
        $data['recent_hostel'] = $this->db->get('hostel_feedback')->result();
        
        $this->db->order_by('id', 'DESC');
        $this->db->limit(5);
        $data['recent_training'] = $this->db->get('training_evaluation')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('reports', $data);
        $this->load->view('templates/footer');
    }

    public function hostel() {
        $data['title'] = 'Hostel Feedback';
        $this->load->view('templates/header', $data);
        $this->load->view('hostel_feedback');
        $this->load->view('templates/footer');
    }

    public function training() {
        $data['title'] = 'Training Evaluation';
        $this->load->view('templates/header', $data);
        $this->load->view('training_evaluation');
        $this->load->view('templates/footer');
    }

    public function switch_lang($language = "") {
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function submit_hostel() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('designation', 'Designation', 'required|trim');
        for($i=1; $i<=10; $i++) {
            $this->form_validation->set_rules('q'.$i, 'Question '.$i, 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('feedback/hostel');
        } else {
            $data = $this->input->post();
            if ($this->Feedback_model->insert_hostel_feedback($data)) {
                $this->session->set_flashdata('success', 'Feedback submitted successfully!');
            } else {
                $this->session->set_flashdata('error', 'Database error occurred.');
            }
            redirect('feedback/hostel');
        }
    }

    public function submit_training() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('participant_name', 'Participant Name', 'required|trim');
        $this->form_validation->set_rules('cpf_no', 'CPF No', 'required|trim');
        
        $t_max = [20, 20, 15, 10, 5];
        for($i=1; $i<=5; $i++) {
            $this->form_validation->set_rules('t_q'.$i, 'Program Question '.$i, 'required|integer|greater_than_equal_to[0]|less_than_equal_to['.$t_max[$i-1].']');
        }
        for($i=1; $i<=3; $i++) {
            $this->form_validation->set_rules('f_q'.$i, 'Faculty Question '.$i, 'required|integer|greater_than_equal_to[0]|less_than_equal_to[10]');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('feedback/training');
        } else {
            $data = $this->input->post();
            if ($this->Feedback_model->insert_training_evaluation($data)) {
                $this->session->set_flashdata('success', 'Evaluation submitted successfully!');
            } else {
                $this->session->set_flashdata('error', 'Database error occurred.');
            }
            redirect('feedback/training');
        }
    }
}
