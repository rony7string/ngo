<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

	public function index()
	{
		$data['title'] = 'Manob Sheba';
		$data['menu'] = 'user';
		$data['content'] = 'admin/user/home';
		$data['users'] = $this->MUsers->get_all();
		$data['privileges'] = $this->privileges;
		$this->load->view('admin/template', $data);
	}

	public function list_all()
	{
		$data['title'] = 'Manob Sheba';
		$data['menu'] = 'user';
		$data['content'] = 'admin/user/list';
		$data['users'] = $this->MUsers->get_all();
		$data['privileges'] = $this->privileges;
		$this->load->view('admin/template', $data);
	}

	public function save($id = NULL)
	{
		if ($this->input->post())
		{
			if ($this->input->post('id'))
			{
				if ($this->session->userdata('user_email') == 'demo@demo.com')
				{
					$this->session->set_flashdata('error', 'Demo Details Can\'t Change.');
				}
				else
				{
					$this->MUsers->update();
					$this->session->set_flashdata('success', 'User updated successfully.');
					redirect('user/list_all', 'refresh');
				}
			}
			else
			{
				$user = $this->MUsers->get_by_email($this->input->post('email'));
				if (count($user) > 0)
				{
					$this->session->set_flashdata('error', 'Email already exists, Please try with another email.');
					redirect('user/list_all', 'refresh');
				}
				else
				{
					$name = $this->input->post('name');
					$type = $this->input->post('type');
					$status = $this->input->post('status');

					if ($this->session->userdata('user_type') == 'Admin')
					{
						$company_id = $this->input->post('company');
					}
					else
					{
						$company_id = $this->session->userdata('user_company');
					}
					if ($this->session->userdata('user_type') == 'User')
					{
						$type = 'User';
						$status = 'Inactive';
					}

					$user_id = $this->MUsers->create($company_id, $name, $type, $status);
					if ($this->session->userdata('user_type') == 'User')
					{
						$this->session->set_flashdata('success', 'User created successfully. Currently the user is inactive and has no privilege, an Admin or Power User need to active and give privileges before the user can login.');
						redirect('user', 'refresh');
					}
					$this->session->set_flashdata('success', 'User created successfully. Now give the user desire privileges.');
					redirect('user/privileges/' . $user_id, 'refresh');
				}
			}
		}
		else
		{
			$data['title'] = 'Manob Sheba';
			$data['menu'] = 'user';
			$data['content'] = 'admin/user/save';
			$data['user'] = $this->MUsers->get_by_id($id);
			$data['companies'] = $this->MCompanies->get_all();
			$data['privileges'] = $this->privileges;
			$this->load->view('admin/template', $data);
		}
	}

	public function delete($id)
	{
		$user = $this->MUsers->get_by_id($id);
		if ($user['email'] == 'demo@demo.com')
		{
			$this->session->set_flashdata('error', 'Demo User Can\'t Delete.');
		}
		else
		{
			$this->MUsers->delete($id);
			$this->MUser_privileges->delete_by_ref_user($id);
			$this->session->set_flashdata('info', 'User Deleted Successfully.');
		}

		redirect('user/list_all', 'refresh');
	}

	public function change_password($id = NULL)
	{
		if ($this->input->post())
		{
			// Demo restriction
			if ($this->session->userdata('user_email') == 'demo@demo.com')
			{
				$this->session->set_flashdata('error', 'Demo Password Can\'t Change.');
			}
			else
			{
				$this->MUsers->update_password($this->session->userdata('user_id'));
				$this->session->set_flashdata('success', 'Password changed successfully.');
			}
			redirect('user/profile_view', 'refresh');
		}
		else
		{
			$data['title'] = 'Manob Sheba';
			$data['menu'] = 'change_password';
			$data['content'] = 'admin/user/change_password';
			if ($id)
			{
				$data['user'] = $this->MUsers->get_by_id($id);
			}
			else
			{
				$data['user'] = $this->MUsers->get_by_id($this->session->userdata('user_id'));
			}
			$data['privileges'] = $this->privileges;
			$this->load->view('admin/template', $data);
		}
	}

	public function profile_view($id = NULL)
	{
		$data['title'] = 'Manob Sheba';
		$data['menu'] = '';
		$data['content'] = 'admin/user/profile_view';
		if ($id)
		{
			$data['user'] = $this->MUsers->get_by_id($id);
		}
		else
		{
			$data['user'] = $this->MUsers->get_by_id($this->session->userdata('user_id'));
		}
		$data['privileges'] = $this->privileges;
		$this->load->view('admin/template', $data);
	}

	public function profile_edit($id = NULL)
	{
		if ($this->input->post())
		{
			$this->MUsers->update();
			redirect('user/profile_view', 'refresh');
		}
		else
		{
			$data['title'] = 'Manob Sheba';
			$data['menu'] = '';
			$data['content'] = 'admin/user/profile_edit';
			if ($id)
			{
				$data['user'] = $this->MUsers->get_by_id($id);
			}
			else
			{
				$data['user'] = $this->MUsers->get_by_id($this->session->userdata('user_id'));
			}
			$data['privileges'] = $this->privileges;
			$this->load->view('admin/template', $data);
		}
	}

	public function privileges($ref_user = NULL)
	{
		if ($this->input->post())
		{
			if ($this->MUser_privileges->get_by_ref_user($this->input->post('ref_user')))
			{
				if($this->session->userdata('user_email') == 'demo@demo.com')
				{
					$this->session->set_flashdata('error', 'Demo Privileges Can\'t Change.');
				}
				else
				{
					$this->MUser_privileges->update();
					$this->session->set_flashdata('success', 'Privileges updated successfully.');
				}
			}
			else
			{
				$this->MUser_privileges->create();
				$this->session->set_flashdata('success', 'Privileges created successfully.');
			}
			redirect('user/list_all', 'refresh');
		}
		else
		{
			$data['title'] = 'Manob Sheba';
			$data['menu'] = 'user';
			$data['content'] = 'admin/user/privileges';
			$data['privilege'] = $this->MUser_privileges->get_by_ref_user($ref_user);
			$data['ref_user'] = $this->MUsers->get_by_id($ref_user);
			$data['privileges'] = $this->privileges;
			$this->load->view('admin/template', $data);
		}
	}

}
