<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MAc_journal_master extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_by_id($id)
	{
		$data = array();
		$this->db->where('id', $id);
	//	// $this->db->where('company_id', $this->session->userdata('user_company'));
		$q = $this->db->get('ac_journal_master');
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

	public function get_by_doc( $doc_type, $doc_no )
	{
		$data = array();
		// $this->db->where('company_id', $this->session->userdata('user_company'));
		$this->db->where('doc_type', $doc_type);
		$this->db->where('doc_no', $doc_no);
		$q = $this->db->get('ac_journal_master');
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

	public function get_by_journal_no($journal_no)
	{
		$data = array();
		$this->db->where('journal_no', $journal_no);
		$q = $this->db->get('ac_journal_master');
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

	public function get_journal_number()
	{
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$q = $this->db->get('ac_journal_master');
		if ($q->num_rows() > 0)
		{
			foreach ($q->result_array() as $row)
			{
				$data = $row;
			}
			$number = (int) $data['journal_no'] + 1;
		}
		else
		{
			$number = 1001;
		}

		$q->free_result();
		return $number;
	}

	public function get_all($type = NULL)
	{
		$data = array();
		if ($type)
		{
			$this->db->where('type', $type);
		}
	//	// $this->db->where('company_id', $this->session->userdata('user_company'));
		$q = $this->db->get('ac_journal_master');
		if ($q->num_rows() > 0)
		{
			foreach ($q->result_array() as $row)
			{
				$details = $this->MAc_journal_details->get_by_journal_no($row['journal_no']);
				$row['debit_ac'] = "";
				$row['credit_ac'] = "";
				$row['debit_amount'] = 0;
				$row['credit_amount'] = 0;
				foreach ($details as $key => $value)
				{
					if ($value['debit'] > 0)
					{
						$row['debit_ac'] .= $value['chart_name'] . ', ';
						$row['debit_amount'] += $value['debit'];
					}
					else
					{
						$row['credit_ac'] .= $value['chart_name'] . ', ';
						$row['credit_amount'] += $value['credit'];
					}
				}
				$data[] = $row;
			}
		}

		$q->free_result();
		return $data;
	}

	public function get_journal($chart, $sdate, $edate)
	{
		$data = array();
		$edate = 'journal_date BETWEEN "' . $sdate . '" AND "' . $edate . '"';
		$this->db->where($edate, NULL, FALSE);
		// $this->db->where('company_id', $this->session->userdata('user_company'));
		$q = $this->db->get('ac_journal_master');
		if ($q->num_rows() > 0)
		{
			foreach ($q->result_array() as $row)
			{
				$chart_acc = $this->MAc_charts->get_by_id($row['ac_chart_id']);
				$row['name_acc'] = $chart_acc['name'];
				$data[] = $row;
			}
		}

		$q->free_result();
		return $data;
	}


	public function create_by_member($jounal_no)
	{
		$data = array(
			
			'journal_no' => $jounal_no,
			'journal_date' => date('Y-m-d H:i:s', time()),
			'memo' => 'Admistion Fee',
			'doc_type' => 'Receive',
			'doc_no' => '',
			'created' => date('Y-m-d H:i:s', time()),
			'created_by' => $this->session->userdata('user_id')
		);
		$this->db->insert('ac_journal_master', $data);

		return $this->db->insert_id();
	}

	public function create($journal_no= NULL)
	{
		$data = array(
			'journal_no' => $journal_no,
			'journal_date' => date('Y-m-d H:i:s', time()),
			'memo' => 'Loan',
			'created' => date('Y-m-d H:i:s', time()),
			'created_by' => $this->session->userdata('user_id')
		);
		$this->db->insert('ac_journal_master', $data);

		return $this->db->insert_id();
	}

	public function create_by_doc($jounal_no, $journal_date, $memo, $doc_type, $doc_no)
	{
		$data = array(
			'company_id' => $this->session->userdata('user_company'),
			'journal_no' => $jounal_no,
			'journal_date' => $journal_date,
			'memo' => $memo,
			'doc_type' => $doc_type,
			'doc_no' => $doc_no,
			'created' => date('Y-m-d H:i:s', time()),
			'created_by' => $this->session->userdata('user_id')
		);
		$this->db->insert('ac_journal_master', $data);

		return $this->db->insert_id();
	}


	//



	public function create_by_payment($jounal_no, $payment_no)
	{
		$data = array(
			'journal_no' => $jounal_no,
			'journal_date' => date_to_db($this->input->post('payment_date')),
			'memo' => 'Payment Receipt',
			'doc_type' => 'Payment',
			'doc_no' => $payment_no,
			'created' => date('Y-m-d H:i:s', time()),
			'created_by' => $this->session->userdata('user_id')
		);
		$this->db->insert('ac_journal_master', $data);

		return $this->db->insert_id();
	}

	


	public function update($id)
	{
		$data = array(
			'journal_no' => $this->input->post('journal_no'),
			'journal_date' => date_to_db($this->input->post('journal_date')),
			'memo' => $this->input->post('journal_memo'),
			'modified' => date('Y-m-d H:i:s', time()),
			'modified_by' => $this->session->userdata('user_id')
		);
		$this->db->where('id', $id);
		$this->db->update('ac_journal_master', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('ac_journal_master');
	}

	public function delete_by_journal_no($journal_no)
	{
		$this->db->where('journal_no', $journal_no);
		$this->db->delete('ac_journal_master');
	}

	public function delete_by_cmp($cmp_id)
	{
		$this->db->where('company_id', $cmp_id);
		$this->db->delete('ac_journal_master');
	}

}
