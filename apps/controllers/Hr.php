<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hr extends CI_Controller {

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
		$data['menu'] = 'hr';
		$data['content'] = 'admin/hr/home';
		$data['privileges'] = $this->privileges;
		$this->load->view('admin/template', $data);
	}

	/* -------------- Employee Start ------------------ */

	function emp_list()
	{
		$data['title'] = 'Manob Sheba';
		$data['menu'] = 'hr';
		$data['content'] = 'admin/hr/emp/list';
		$data['emps'] = $this->MEmps->get_all();
		$data['privileges'] = $this->privileges;
		$this->load->view('admin/template', $data);
	}

	function emp_details($id)
	{
		$data['title'] = 'Manob Sheba';
		$data['menu'] = 'hr';
		$data['content'] = 'admin/hr/emp/details';
		$data['emp'] = $this->MEmps->get_by_id($id);
		$data['privileges'] = $this->privileges;
		$this->load->view('admin/template', $data);
	}

	function emp_save($id = NULL)
	{
		if ($this->input->post())
		{
			if ($this->input->post('id') == "")
			{
				$emp = $this->MEmps->get_latest();
				if (count($emp) > 0)
				{
					$code = (int) $emp['code'] + 1;
				}
				else
				{
					$code = 1001;
				}
				$this->MEmps->create($code);
			}
			else
			{
				$this->MEmps->update();
			}
			$this->session->set_flashdata('message', 'Employee saved successfully.');
			redirect('hr/emp_save', 'refresh');
		}
		else
		{
			$data['title'] = 'Manob Sheba';
			$data['menu'] = 'hr';
			$data['emp'] = $this->MEmps->get_by_id($id);
			$data['content'] = 'admin/hr/emp/save';
			$data['privileges'] = $this->privileges;
			$this->load->view('admin/template', $data);
		}
	}

	function emp_delete($id)
	{
		$this->MEmps->delete($id);
		redirect('hr/emp_list', 'refresh');
	}

	/* -------------- Employee End -------------------- */
}
