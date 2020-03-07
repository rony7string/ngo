<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loaner extends CI_Controller {

  public function __construct()  {
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
    $data['menu'] = 'loan_installment';
    $data['content'] = 'admin/loaner/list';
    $data['privileges'] = $this->privileges;
    $this->load->view('admin/template', $data);
  }


  public function add_new_loaner($id=NULL) {

    if ($this->input->post())
    {
      if ($this->input->post('id') == "")
      {
        $loaner = $this->MLoaner->get_latest();
        if (count($loaner) > 0)
        {
          $code = (int) $loaner['code'] + 1;
        }
        else
        {
          $code = 10000001;
        }

        $member_id = $this->input->post('member_code');
        $member_acc = $this->MMembers->get_by_id($member_id);
      //  print_r($member_credit_acc);
        if($member_acc != NULL){

          $member_debit_acc = $this->MAc_charts->get_by_id($member_acc['debit_ac_id']);

          $journal_no = $this->MAc_journal_master->get_journal_number();

         // Loan Journal Master

          $journal_id = $this->MAc_journal_master->create($journal_no);

          if($journal_id != NULL){

            $accounts = $this->MSettings->get_accounts();

        // Loan Journal details
        // $amount = $this->input->post('loan_amount')+$this->input->post('service_charge');


            $this->MAc_journal_details->create_debit($journal_id,$member_debit_acc['code'],$this->input->post('loan_amount'));

            $this->MAc_journal_details->create_credit($journal_id,$accounts['ac_cash'],$this->input->post('loan_amount'));

            $today = date('Y-m-d');
            $loan_amount = $this->input->post('loan_amount');
            $service_charge = $this->input->post('service_charge');
            $installment_number = $this->input->post('installment');
            $principal_amount = $loan_amount/$installment_number;
            $service_amount = $service_charge / $installment_number;
            $loan_end_date = date('Y-m-d', strtotime("+".$installment_number."months", strtotime($today)));

            $loan_id = $this->MLoaner->create($loan_end_date);
          //Create Installment
            if($loan_id != NULL){
              for($i=1; $i <= $installment_number ; $i++){
                $installment_date = date('Y-m-d', strtotime("+".$i."months", strtotime($today)));
                $this->MLoaner->create_installment($loan_id,$installment_date,$principal_amount,$service_amount);
                $installment_date = NULL;
              }
            }
          //create installment
            $this->session->set_flashdata('success', 'New Loan saved successfully.');
            redirect('loaner/add_new_loaner','refresh');
          }
        } 
      }
      else
      {
        $this->MLoaner->update();
      }
     //$this->session->set_flashdata('success', 'New Loan saved successfully.');
      redirect('loaner/add_new_loaner');
    }
    else
    {
      $data['title'] = 'Manob Sheba';
      $data['menu'] = 'manage_loaner';
      $loaner = $this->MLoaner->get_latest();
      if (count($loaner) > 0)
      {
       $data['code'] = (int) $loaner['code'] + 1;
     }
     else
     {
       $data['code']= 10000001;
     }

     $today = date('Y-m-d');
     $effectiveDate = date('Y-m-d', strtotime("+10 months", strtotime($today)));
     $data['end_date'] = $effectiveDate;
     $data['members'] = $this->MMembers->get_all('active');
     $data['field_officers'] =  $this->MEmps->get_all();
     $data['loaner'] = $this->MLoaner->get_by_id($id);
     $data['content'] = 'admin/loaner/save';
     $data['privileges'] = $this->privileges;
     $this->load->view('admin/template', $data);
   }
 }

// Loan collection 

 public function loan_collection(){

  $data['title'] = 'Manob Sheba';
  $data['menu'] = 'loan_installment';
  $data['content'] = 'admin/loaner/collection';
  $data['loaners'] = $this->MLoaner->get_all();
  $data['privileges'] = $this->privileges;
  $this->load->view('admin/template', $data);
}


// Loan List 

public function loan_list(){

  $data['title'] = 'Manob Sheba';
  $data['menu'] = 'manage_member';
  $data['content'] = 'admin/loaner/list';
  $data['loaners'] = $this->MLoaner->get_all();
  $data['privileges'] = $this->privileges;
  $this->load->view('admin/template', $data);
}

//ajax call for auto fill 

public function member_details($id) {
  $msg = $this->MLoaner->get_by_id($id);
}



}
