<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
        if ( ! $this->session->userdata('user_id'))
        {
            redirect('', 'refresh');
        }
        $this->privileges = $this->MUser_privileges->get_by_ref_user($this->session->userdata('user_id'));
    }

    public function index()
    {
        $data['title'] = 'Manob Sheba';
        $data['menu'] = 'loan';
        $data['content'] = 'admin/loan/list';
        $data['privileges'] = $this->privileges;
        $data['loans'] = $this->MLoans->get_all();
        $this->load->view('admin/template', $data);
    }

   function loan_save($id = NULL)
    {
        if ($this->input->post())
        {
            if ($this->input->post('id') == "")
            {
                
                $this->MLoans->create();
            }
            else
            {
                $this->MLoans->update();
            }
            $this->session->set_flashdata('message', 'Loan saved successfully.');
            redirect('loan', 'refresh');
        }
        else
        {
            $data['title'] = 'Manob Sheba';
            $data['menu'] = 'loan';
            $data['loan'] = $this->MLoans->get_by_id($id);
            $data['content'] = 'admin/loan/save';
            $data['privileges'] = $this->privileges;
            $this->load->view('admin/template', $data);
        }
    }
  
  

}
