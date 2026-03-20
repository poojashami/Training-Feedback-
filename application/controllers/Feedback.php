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

    public function index()
    {
        $data['title'] = 'Dashboard';

        // Get basic stats
        $data['hostel_count'] = $this->db->count_all('hostel_feedback');
        $data['training_count'] = $this->db->count_all('training_evaluation');
        $data['total_count'] = $data['hostel_count'] + $data['training_count'];

        // Overall Hostel Average
        $hostels = $this->db->get('hostel_feedback')->result();
        $hostel_overall_avg = 0;
        if (!empty($hostels)) {
            $sum = 0;
            foreach ($hostels as $h) {
                $sum += ($h->q1 + $h->q2 + $h->q3 + $h->q4 + $h->q5 + $h->q6 + $h->q7 + $h->q8 + $h->q9 + $h->q10) / 10;
            }
            $hostel_overall_avg = $sum / count($hostels);
        }
        $data['hostel_avg'] = $hostel_overall_avg;

        // Overall Training Averages
        $trainings = $this->db->get('training_evaluation')->result();
        $train_total_avg = 0;
        $prog_avg = 0;
        $fac_avg = 0;
        if (!empty($trainings)) {
            $t_sum = 0;
            $p_sum = 0;
            $f_sum = 0;
            foreach ($trainings as $t) {
                $p = $t->t_q1 + $t->t_q2 + $t->t_q3 + $t->t_q4 + $t->t_q5;
                $f = $t->f_q1 + $t->f_q2 + $t->f_q3;
                $t_sum += ($p + $f);
                $p_sum += $p;
                $f_sum += $f;
            }
            $cnt = count($trainings);
            $train_total_avg = $t_sum / $cnt;
            $prog_avg = $p_sum / $cnt;
            $fac_avg = $f_sum / $cnt;
        }
        $data['train_total_avg'] = $train_total_avg;
        $data['prog_avg'] = $prog_avg;
        $data['fac_avg'] = $fac_avg;

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function reports()
    {
        $data['title'] = 'Reports Summary';

        // Get filter inputs
        $program_name = $this->input->get('program_name');
        $date_from = $this->input->get('date_from');
        $date_to = $this->input->get('date_to');
        $coordinator = $this->input->get('coordinator');

        // Fetch unique program names for dropdown
        $p1 = $this->db->select('training_name as name')->from('training_calendar')->get()->result_array();
        $p2 = $this->db->select('training_program as name')->from('hostel_feedback')->where('training_program is not null')->group_by('training_program')->get()->result_array();
        $p3 = $this->db->select('prog_name as name')->from('training_evaluation')->where('prog_name is not null')->group_by('prog_name')->get()->result_array();
        $all_names = array_unique(array_merge(array_column($p1, 'name'), array_column($p2, 'name'), array_column($p3, 'name')));
        sort($all_names);
        $data['available_programs'] = array_filter($all_names);

        // --- Hostel Feedback Query ---
        $this->db->select('*')->from('hostel_feedback');
        if (!empty($program_name)) $this->db->like('training_program', $program_name);
        if (!empty($date_from)) $this->db->where('date >=', $date_from);
        if (!empty($date_to)) $this->db->where('date <=', $date_to);
        $data['recent_hostel'] = $this->db->get()->result();

        // Calculate Hostel Avg
        $hostel_filtered_avg = 0;
        if (!empty($data['recent_hostel'])) {
            $sum = 0;
            foreach ($data['recent_hostel'] as $rh) {
                $sum += ($rh->q1 + $rh->q2 + $rh->q3 + $rh->q4 + $rh->q5 + $rh->q6 + $rh->q7 + $rh->q8 + $rh->q9 + $rh->q10) / 10;
            }
            $hostel_filtered_avg = $sum / count($data['recent_hostel']);
        }
        $data['hostel_overall_avg'] = $hostel_filtered_avg;

        // --- Training Evaluation Query ---
        $this->db->select('*')->from('training_evaluation');
        if (!empty($program_name)) $this->db->like('prog_name', $program_name);
        if (!empty($date_from)) $this->db->where('date_from >=', $date_from);
        if (!empty($date_to)) $this->db->where('date_to <=', $date_to);
        if (!empty($coordinator)) {
            $this->db->group_start();
            $this->db->like('conducted_by', $coordinator);
            $this->db->or_like('coordinator', $coordinator);
            $this->db->group_end();
        }
        $data['recent_training'] = $this->db->get()->result();

        // Calculate Training Avgs
        $training_filtered_avg = 0;
        $prog_sec_avg = 0;
        $fac_sec_avg = 0;
        if (!empty($data['recent_training'])) {
            $t_sum = 0; $p_sum = 0; $f_sum = 0;
            foreach ($data['recent_training'] as $rt) {
                $p = $rt->t_q1 + $rt->t_q2 + $rt->t_q3 + $rt->t_q4 + $rt->t_q5;
                $f = $rt->f_q1 + $rt->f_q2 + $rt->f_q3;
                $t_sum += ($p + $f); $p_sum += $p; $f_sum += $f;
            }
            $count = count($data['recent_training']);
            $training_filtered_avg = $t_sum / $count;
            $prog_sec_avg = $p_sum / $count;
            $fac_sec_avg = $f_sum / $count;
        }
        $data['training_overall_avg'] = $training_filtered_avg;
        $data['prog_section_avg'] = $prog_sec_avg;
        $data['faculty_section_avg'] = $fac_sec_avg;

        $data['filters'] = ['program_name' => $program_name, 'date_from' => $date_from, 'date_to' => $date_to, 'coordinator' => $coordinator];

        $this->load->view('templates/header', $data);
        $this->load->view('reports', $data);
        $this->load->view('templates/footer');
    }

    public function hostel($id = null)
    {
        $data['title'] = 'Hostel Feedback';
        if ($id) {
            $data['cal'] = $this->db->get_where('training_calendar', ['id' => $id])->row();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('hostel_feedback');
        $this->load->view('templates/footer');
    }

    public function training($id = null)
    {
        $data['title'] = 'Training Evaluation';
        if ($id) {
            $data['cal'] = $this->db->get_where('training_calendar', ['id' => $id])->row();
        }
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
