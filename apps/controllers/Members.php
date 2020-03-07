<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
		if ( ! $this->session->userdata('user_id'))
		{
			redirect('', 'refresh');
		}
		$this->privileges = $this->MUser_privileges->get_by_ref_user($this->session->userdata('user_id'));
	}

	function index()
	{
		$data['title'] = 'Manob Sheba';
		$data['menu'] = 'manage_member';
		$data['content'] = 'admin/manage_member/home';
		$data['privileges'] = $this->privileges;
		$this->load->view('admin/template', $data);
	}

	/* -------------- Members Start ------------------ */

	function member_list()
	{
		$data['title'] = 'Manob Sheba';
		$data['menu'] = 'manage_member';
		$data['content'] = 'admin/members/list';
		$data['members'] = $this->MMembers->get_all();
		$data['privileges'] = $this->privileges;
		$this->load->view('admin/template', $data);
	}

	function member_details($id)
	{
		$data['title'] = 'Manob Sheba';
		$data['menu'] = 'manage_member';
		$data['content'] = 'admin/member/details';
		$data['emp'] = $this->MMembers->get_by_id($id);
		$data['privileges'] = $this->privileges;
		$this->load->view('admin/template', $data);
	}

	function member_save($id = NULL)
	{
		if ($this->input->post())
		{
			if ($this->input->post('id') == "")
			{
				$mem = $this->MMembers->get_latest();

				if (count($mem) > 0)
				{
					$code = (int) $mem['code'] + 1;
				}
				else
				{
					$code = 1001;
				}
				// Create member debit account head

				$ac_head = $this->MSettings->get_accounts();
				$chart_receivable = $this->MAc_charts->get_by_id($ac_head['ac_receivable']);
				$siblings_receivable = $this->MAc_charts->get_by_parent_id($ac_head['ac_receivable']);
				if (count($siblings_receivable) > 0)
				{
					$ac_code_temp = explode('.', $siblings_receivable['code']);
					$ac_last = count($ac_code_temp) - 1;
					$ac_new = (int) $ac_code_temp[$ac_last] + 1;
					$ac_code = $chart_receivable['code'] . '.' . $ac_new;
				}
				else
				{
					$ac_code = $chart_receivable['code'] . '.1';
				}

				$mem_acc_name = $this->input->post('code').'-'.$this->input->post('name');
				$debit_ac_id = $this->MAc_charts->account_create($ac_head['ac_receivable'], $ac_code,$mem_acc_name);

				$ac_code = NULL;
				// Create member credit account head
				
				$chart = $this->MAc_charts->get_by_id($ac_head['ac_payable']);
				$siblings = $this->MAc_charts->get_by_parent_id($ac_head['ac_payable']);
				if (count($siblings) > 0)
				{
					$ac_code_temp = explode('.', $siblings['code']);
					$ac_last = count($ac_code_temp) - 1;
					$ac_new = (int) $ac_code_temp[$ac_last] + 1;
					$ac_code = $chart['code'] . '.' . $ac_new;
				}
				else
				{
					$ac_code = $chart['code'] . '.1';
				}

				$mem_acc_name = $this->input->post('code').'-'.$this->input->post('name');
				$credit_ac_id = $this->MAc_charts->account_create($ac_head['ac_payable'], $ac_code,$mem_acc_name);

                // end member account head

                //Journal start
				if($debit_ac_id != NULL && $credit_ac_id != NULL ){

					$journal_no = $this->MAc_journal_master->get_journal_number();

					$journal_id = $this->MAc_journal_master->create_by_member($journal_no);

					if($journal_id != NULL){
						$accounts = $this->MSettings->get_accounts();
						// Admisson Fee
						$this->MAc_journal_details->create_debit($journal_id,$accounts['ac_cash'],$this->input->post('fee'));
						$this->MAc_journal_details->create_credit($journal_id,$accounts['income'],$this->input->post('fee'));
						// Share 
						$this->MAc_journal_details->create_debit($journal_id,$accounts['ac_cash'],$this->input->post('share'));
						$this->MAc_journal_details->create_credit($journal_id,$ac_code,$this->input->post('share'));

					}

					$this->MMembers->create($code,$debit_ac_id,$credit_ac_id);

					$this->session->set_flashdata('success', 'Member saved successfully.');

					redirect('members/member_save','refresh');
				}

				
			}
			else
			{
				$this->MMembers->update();

				$this->session->set_flashdata('update', 'Member update successfully.');

				redirect('members/member_save');
			}
			
		}
		else
		{
			$data['title'] = 'Manob Sheba';
			$data['menu'] = 'manage_member';
			$member = $this->MMembers->get_latest();
			if (count($member) > 0)
			{
				$data['code'] = (int)$member['code'] + 1;
			}
			else
			{
				$data['code'] = 1001;
			} 
			$data['member'] = $this->MMembers->get_by_id($id);
			$data['content'] = 'admin/members/save';
			$data['privileges'] = $this->privileges;
			$this->load->view('admin/template', $data);
		}
	}

	function member_delete($id)
	{
		$this->MMembers->delete($id);
		redirect('members/member_list', 'refresh');
	}

	/* -------------- Members End -------------------- 

	function member_account_create(){

		$members = $this->MMembers->get_all();

		$ac_head = $this->MSettings->get_accounts();

		foreach ($members as $key => $value) {

			$chart_receivable = $this->MAc_charts->get_by_id($ac_head['ac_receivable']);
			$siblings_receivable = $this->MAc_charts->get_by_parent_id($ac_head['ac_receivable']);

			if (count($siblings_receivable) > 0)
			{
				$ac_code_temp = explode('.', $siblings_receivable['code']);
				$ac_last = count($ac_code_temp) - 1;
				$ac_new = (int) $ac_code_temp[$ac_last] + 1;
				$ac_code = $chart_receivable['code'] . '.' . $ac_new;
			}
			else
			{
				$ac_code = $chart_receivable['code'] . '.1';
			}

			$mem_acc_name = $value['code'].'-'.$value['name'];
			$debit_ac_id = $this->MAc_charts->account_create($ac_head['ac_receivable'], $ac_code,$mem_acc_name);

			$chart = $this->MAc_charts->get_by_id($ac_head['ac_payable']);
			$siblings = $this->MAc_charts->get_by_parent_id($ac_head['ac_payable']);

			if (count($siblings) > 0)
			{
				$ac_code_temp = explode('.', $siblings['code']);
				$ac_last = count($ac_code_temp) - 1;
				$ac_new = (int) $ac_code_temp[$ac_last] + 1;
				$ac_code = $chart['code'] . '.' . $ac_new;
			}
			else
			{
				$ac_code = $chart['code'] . '.1';
			}

			$acc_name = $value['code'].'-'.$value['name'];
			$credit_ac_id = $this->MAc_charts->account_create($ac_head['ac_payable'], $ac_code,$acc_name);

			$this->MMembers->update_debit_account($value['id'],$debit_ac_id,$credit_ac_id);

			if($debit_ac_id != NULL && $credit_ac_id != NULL ){

				$journal_no = $this->MAc_journal_master->get_journal_number();

				$journal_id = $this->MAc_journal_master->create_by_member($journal_no);

				if($journal_id != NULL){
					$accounts = $this->MSettings->get_accounts();
						// Admisson Fee
					$this->MAc_journal_details->create_debit($journal_id,$accounts['ac_cash'],$value['fee']);
					$this->MAc_journal_details->create_credit($journal_id,$accounts['income'],$value['fee']);
						// Share 
					$this->MAc_journal_details->create_debit($journal_id,$accounts['ac_cash'],$value['share']);
					$this->MAc_journal_details->create_credit($journal_id,$ac_code,$value['share']);
					
				}
			}
		}
	}*/

}
