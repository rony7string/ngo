<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MMembers extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_by_id($id)
    {
        $data = array();
        $this->db->limit(1);
        $this->db->where('id', $id);
        $q = $this->db->get('members');
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

    public function get_latest()
    {
        $data = array();
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $q = $this->db->get('members');
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

    public function get_by_code($code)
    {
        $data = array();
        $this->db->where('code', $code);
        $q = $this->db->get('members');
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

    public function get_by_name($name)
    {
        $data = array();
        $this->db->where('name', $name);
        $q = $this->db->get('members');
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

    public function get_all($status = NULL)
    {
        $data = array();
        if ($status)
        {
            $this->db->where('status', $status);
        }
         $this->db->order_by('code', 'ASC');
        $q = $this->db->get('members');
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

    public function get_all_dropdown($status = NULL)
    {
        if ($status)
        {
            $this->db->where('status', $status);
        }
        
        $q = $this->db->get('members');
        if ($q->num_rows() > 0)
        {
            foreach ($q->result_array() as $row)
            {
                $data[$row['id']] = $row['name'];
            }
        }

        $q->free_result();
        return $data;
    }

    public function create($code = NULL,$debit_ac_id = NULL,$credit_ac_id = NULL)
    {
        $data = array(
            'code' => $this->input->post('code'),
            'debit_ac_id' => $debit_ac_id,
            'credit_ac_id' => $credit_ac_id,
            'name' => $this->input->post('name'),
            'father_name' => $this->input->post('father_name'),
            'village' => $this->input->post('village'),
            'post_office' => $this->input->post('post_office'),
            'police_station' => $this->input->post('police_station'),
            'district' => $this->input->post('district'),
            'p_village' => $this->input->post('p_village'),
            'p_post_office' => $this->input->post('p_post_office'),
            'p_police_station' => $this->input->post('p_police_station'),
            'p_district' => $this->input->post('p_district'),
            'date' => date_to_db($this->input->post('date')),
            'share' => $this->input->post('share'),
            'fee' => $this->input->post('fee'),
            'mobile' => $this->input->post('mobile'),
            'nid_num' => $this->input->post('nid_num'),
            'nominee' => $this->input->post('nominee'),
            'nominee_address' => $this->input->post('nominee_address'),
            'nominee_mobile' => $this->input->post('nominee_mobile'),
            'nominee_nid_num' => $this->input->post('nominee_nid_num'),
            'status' => $this->input->post('status'),
            'created' => date('Y-m-d H:i:s', time()),
            'created_by' => $this->session->userdata('user_id')
        );
        $this->db->insert('members', $data);
    }

    public function update()
    {
        $data = array(
           'code' => $this->input->post('code'),
           'name' => $this->input->post('name'),
           'father_name' => $this->input->post('father_name'),
           'village' => $this->input->post('village'),
           'post_office' => $this->input->post('post_office'),
           'police_station' => $this->input->post('police_station'),
           'district' => $this->input->post('district'),
           'p_village' => $this->input->post('p_village'),
           'p_post_office' => $this->input->post('p_post_office'),
           'p_police_station' => $this->input->post('p_police_station'),
           'p_district' => $this->input->post('p_district'),
           'date' => date_to_db($this->input->post('date')),
           'share' => $this->input->post('share'),
           'fee' => $this->input->post('fee'),
           'mobile' => $this->input->post('mobile'),
           'nid_num' => $this->input->post('nid_num'),
           'nominee' => $this->input->post('nominee'),
           'nominee_address' => $this->input->post('nominee_address'),
           'nominee_mobile' => $this->input->post('nominee_mobile'),
           'nominee_nid_num' => $this->input->post('nominee_nid_num'),
           'status' => $this->input->post('status'),
           'modified' => date('Y-m-d H:i:s', time()),
           'modified_by' => $this->session->userdata('user_id')
       );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('members', $data);
    }

    public function update_debit_account($id,$debit_ac_id,$credit_ac_id)
    {
        $data = array(

            'debit_ac_id' => $debit_ac_id,
            'credit_ac_id' => $credit_ac_id,
            
        );
        $this->db->where('id', $id);
        $this->db->update('members', $data);

    }

    public function update_field($id, $field, $value)
    {
        $data = array(
            $field => $value,
            'modified' => date('Y-m-d H:i:s', time()),
            'modified_by' => $this->session->userdata('user_id')
        );
        $this->db->where('id', $id);
        $this->db->update('members', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('members');
    }

    public function delete_by_cmp($cmp_id)
    {
        $this->db->where('company_id', $cmp_id);
        $this->db->delete('members');
    }

}
