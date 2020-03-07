<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MLoaner extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_by_id($id)
	{
		$data = array();
		$this->db->where('id', $id);
		$q = $this->db->get('members');
		if ($q->num_rows() > 0)
		{
			foreach ($q->result_array() as $value)
			{
				$data= $value;
			}
		}

		$q->free_result();
		print_r(json_encode($data));
	}

	public function get_by_name($id)
	{
		
		$this->db->where('id', $id);
		$q = $this->db->get('loaner');
		if ($q->num_rows() > 0)
		{
			foreach ($q->result_array() as $row)
			{
				$data = $row['full_name'];
			}
		}

		$q->free_result();
		return $data;
	}

	public function get_latest()
	{
		$data = array();
		
		$this->db->order_by('code', 'DESC');
		$this->db->limit(1);
		$q = $this->db->get('loaner');
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
		
		$q = $this->db->get('loaner');
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

	public function create($loan_end_date=NULL)
	{
		$data = array(
			'code' => $this->input->post('code'),
			'member_code' => $this->input->post('member_code'),
			'name' => $this->input->post('name'),
			'father_name' => $this->input->post('father_name'),
			'village' => $this->input->post('village'),
			'post_office' => $this->input->post('post_office'),
			'police_station' => $this->input->post('police_station'),
			'district' => $this->input->post('district'),
			'mobile' => $this->input->post('mobile'),
			'date' => $this->input->post('date'),
			'nid_num' => $this->input->post('nid_num'),
			'loan_date' => date_to_db($this->input->post('loan_date')),
			'loan_end_date' => $loan_end_date,
			'fo_name' => $this->input->post('fo_name'),
			'fs_name' => $this->input->post('fs_name'),
			'loan_amount' => $this->input->post('loan_amount'),
			'service_charge' => $this->input->post('service_charge'),
			'installment' => $this->input->post('installment'),
			'guarantor' => $this->input->post('guarantor'),
			'created' => date('Y-m-d H:i:s', time()),
			'created_by' => $this->session->userdata('user_id')
		);
		$this->db->insert('loaner', $data);

		return $this->db->insert_id();
	}

	public function update($id)
	{
		$data = array(
			'code' => $$this->input->post('code'),
			'member_code' => $this->input->post('member_code'),
			'name' => $this->input->post('name'),
			'father_name' => $this->input->post('father_name'),
			'village' => $this->input->post('village'),
			'post_office' => $this->input->post('post_office'),
			'police_station' => $this->input->post('police_station'),
			'district' => $this->input->post('district'),
			'mobile' => $this->input->post('mobile'),
			'date' => $this->input->post('date'),
			'nid_num' => $this->input->post('nid_num'),
			'loan_date' => date_to_db($this->input->post('loan_date')),
		//	'loan_end_date' => date_to_db($this->input->post('loan_end_date')),
			'fo_name' => $this->input->post('fo_name'),
			'fs_name' => $this->input->post('fs_name'),
			'loan_amount' => $this->input->post('loan_amount'),
			'service_charge' => $this->input->post('service_charge'),
			'installment' => $this->input->post('installment'),
			'guarantor' => $this->input->post('guarantor'),
			'modified' => date('Y-m-d H:i:s', time()),
			'modified_by' => $this->session->userdata('user_id')
		);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('loaner', $data);
	}

//Insert installment 
	public function create_installment($loan_id = NULL,$installment_date = NULL,$principal_amount=NULL,$service_amount= NULL){
		$data = array(
			'loan_id' => $loan_id ,
			'date' => $installment_date ,
			'amount' => $principal_amount,
			'service_charge ' => $service_amount
		);
		$this->db->insert('installment', $data);

		return $this->db->insert_id();


	}



	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('loaner');
	}

	public function delete_by_cmp($cmp_id)
	{
		$this->db->where('company_id', $cmp_id);
		$this->db->delete('loaner');
	}

}
