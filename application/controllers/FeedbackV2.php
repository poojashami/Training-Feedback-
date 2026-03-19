<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeedbackV2 extends CI_Controller {

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
        $data['title'] = 'Training Calendar — Link Generator';
        
        // Get recent calendar entries
        $this->db->order_by('id', 'DESC');
        $data['recent_links'] = $this->db->get('training_calendar')->result();

        $this->load->view('v2/templates/header', $data);
        $this->load->view('v2/training_calendar', $data);
        $this->load->view('v2/templates/footer');
    }

    public function dashboard() {
        $data['title'] = 'V2 Statistics Dashboard';
        
        // Get stats from DB
        $data['hostel_count'] = $this->db->count_all('hostel_feedback');
        $data['training_count'] = $this->db->count_all('training_evaluation');
        $data['total_count'] = $data['hostel_count'] + $data['training_count'];

        $this->load->view('v2/templates/header', $data);
        $this->load->view('v2/dashboard', $data);
        $this->load->view('v2/templates/footer');
    }

    public function submit_calendar() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('training_name', 'Training Name', 'required');
        $this->form_validation->set_rules('program_id', 'Program ID', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('feedbackv2');
        } else {
            $data = $this->input->post();
            // Convert 'create_gen_service' to 1 or 0
            $data['create_gen_service'] = ($data['create_gen_service'] == 'Yes') ? 1 : 0;
            
            if ($this->Feedback_model->insert_training_calendar($data)) {
                $this->session->set_flashdata('success', 'Training program initialized and links generated!');
            } else {
                $this->session->set_flashdata('error', 'Error creating calendar entry.');
            }
            redirect('feedbackv2');
        }
    }

    public function hostel($id = null) {
        $data['title'] = 'Hostel Feedback V2';
        if ($id) {
            $data['cal'] = $this->db->get_where('training_calendar', ['id' => $id])->row();
        }
        $this->load->view('v2/templates/header', $data);
        $this->load->view('v2/hostel_feedback', $data);
        $this->load->view('v2/templates/footer');
    }

    public function training($id = null) {
        $data['title'] = 'Training Evaluation V2';
        if ($id) {
            $data['cal'] = $this->db->get_where('training_calendar', ['id' => $id])->row();
        }
        $this->load->view('v2/templates/header', $data);
        $this->load->view('v2/training_evaluation', $data);
        $this->load->view('v2/templates/footer');
    }

    public function reports() {
        $data['title'] = 'Reports Summary V2';
        
        // Get recent feedback
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $data['recent_hostel'] = $this->db->get('hostel_feedback')->result();
        
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $data['recent_training'] = $this->db->get('training_evaluation')->result();

        $this->load->view('v2/templates/header', $data);
        $this->load->view('v2/reports', $data);
        $this->load->view('v2/templates/footer');
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
            redirect('feedbackv2/hostel');
        } else {
            $data = $this->input->post();
            if ($this->Feedback_model->insert_hostel_feedback($data)) {
                $this->session->set_flashdata('success', 'Feedback submitted successfully!');
            } else {
                $this->session->set_flashdata('error', 'Database error occurred.');
            }
            redirect('feedbackv2/hostel');
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
            redirect('feedbackv2/training');
        } else {
            $data = $this->input->post();
            if ($this->Feedback_model->insert_training_evaluation($data)) {
                $this->session->set_flashdata('success', 'Evaluation submitted successfully!');
            } else {
                $this->session->set_flashdata('error', 'Database error occurred.');
            }
            redirect('feedbackv2/training');
        }
    }
}
