<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MSettings extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_by_id($id)
	{
		$data = array();
		$this->db->where('id', $id);
		$this->db->limit(1);
		$q = $this->db->get('settings');
		if ($q->num_rows() > 0)
		{
			foreach ($q->result_array() as $row)
			{
				$data = $row;
			}
		}

		$q->free_result();
		return $data;
	}

	public function get_accounts()
	{
		$data = array();
	
		$this->db->limit(1);
		$q = $this->db->get('settings');
		if ($q->num_rows() > 0)
		{
			foreach ($q->result_array() as $row)
			{
				$data = $row;
			}
		}

		$q->free_result();
		return $data;
	}

	public function get_all()
	{
		$data = array();
		if ($this->session->userdata('user_type') != 'Admin')
		{
			$this->db->where('company_id', $this->session->userdata('user_company'));
		}
		$q = $this->db->get('settings');
		if ($q->num_rows() > 0)
		{
			foreach ($q->result_array() as $row)
			{
				$data[] = $row;
			}
		}

		$q->free_result();
		return $data;
	}

	public function create($company_id, $ac_receivable, $ac_payable, $ac_cash, $ac_bank, $income, $expenses)
	{
		$data = array(
			'company_id' => $company_id,
			'ac_receivable' => $ac_receivable,
			'ac_payable' => $ac_payable,
			'ac_cash' => $ac_cash,
			'ac_bank' => $ac_bank,
			'income' => $income,
			'expenses' => $expenses,
			//'ac_inventory' => $ac_inventory,
			//'ac_cogs' => $ac_cogs,
			'created_at' => date('Y-m-d H:i:s', time()),
			'created_by' => $this->session->userdata('user_id')
			);
		$this->db->insert('settings', $data);

		return $this->db->insert_id();
	}

	public function update()
	{
		$data = array(
			'ac_receivable' => $this->input->post('ac_receivable'),
			'ac_payable' => $this->input->post('ac_payable'),
			'ac_cash' => $this->input->post('ac_cash'),
			'ac_bank' => $this->input->post('ac_bank'),
			'income' => $this->input->post('income'),
			'expenses' => $this->input->post('expenses'),
			//'ac_inventory' => $this->input->post('ac_inventory'),
			//'ac_cogs' => $this->input->post('ac_cogs'),
			//'vat' => $this->input->post('vat'),
			'modified_at' => date('Y-m-d H:i:s', time()),
			'modified_by' => $this->session->userdata('user_id')
			);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('settings', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('settings');
	}

	public function delete_by_cmp($cmp_id)
	{
		$this->db->where('company_id', $cmp_id);
		$this->db->delete('settings');
	}

}
