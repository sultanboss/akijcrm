<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->load->library('breadcrumbs');
		$this->lang->load('tank_auth');
		$this->load->model('users_model');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		$data['title'] = 'Users - Akij Ceramics CRM';

		$data['css'] = $this->tank_auth->load_admin_css(array(
			'js/lib/select2/select2.css', 
			'js/lib/select2/ebro_select2.css', 
			'js/lib/dataTables/media/DT_bootstrap.css', 
			'js/lib/dataTables/extras/TableTools/media/css/TableTools.css',
			'js/lib/Sticky/sticky.css'));

		$data['js'] = $this->tank_auth->load_admin_js(array(
			'js/lib/iCheck/jquery.icheck.min.js', 
			'js/lib/parsley/parsley.min.js', 
			'js/pages/ebro_form_validate.js', 
			'js/lib/select2/select2.min.js', 
			'js/lib/dataTables/media/js/jquery.dataTables.min.js', 
			'js/lib/dataTables/extras/ColReorder/media/js/ColReorder.min.js',
			'js/lib/dataTables/extras/ColVis/media/js/ColVis.min.js', 
			'js/lib/dataTables/media/DT_bootstrap.js', 
			'js/pages/ebro_datatables.js', 
			'js/lib/bootbox/bootbox.min.js', 
			'js/lib/Sticky/sticky.js', 
			'js/pages/ebro_notifications.js'));

		$this->breadcrumbs->push('Akij Ceramics CRM', '#');
		$this->breadcrumbs->push('Admin', '#');
		$this->breadcrumbs->push('Users', '#');

		$data['breadcrumbs'] = $this->breadcrumbs->show();
		$data['groups'] = $this->users_model->get_all_groups();

		$this->load->view('common/header', $data);
		$this->load->view('users/index', $data);
		$this->load->view('common/footer', $data);
	}

	function edit()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if (isset($_POST['user_id']) && isset($_POST['first_name']) && isset($_POST['email']) ) {
			$data['data'] = array(
				'group_id'		=> $this->input->post('edit_group'),
				'email'			=> $this->input->post('email'),
				'fname'			=> $this->input->post('first_name'),
				'lname'			=> $this->input->post('last_name'),
			);

			$this->users_model->edit_users($this->input->post('user_id'), $data['data']);
			$this->session->set_flashdata('msg', 'User <b>\''.$this->input->post('group_name').'\'</b> updated successfully!');
			$this->session->set_flashdata('msg_type', 'success');
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid group input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}
		redirect('/user');
	}

	function delete($id)
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if ( isset($id) ) {
			if($this->users_model->delete_users($id)) {
				$this->session->set_flashdata('msg', 'User deleted successfully!');
				$this->session->set_flashdata('msg_type', 'success');
			}
			else {
				$this->session->set_flashdata('msg', 'Invalid user delete input!');
				$this->session->set_flashdata('msg_type', 'warning');
			}						
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid user delete input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}

		redirect('/user');
	}

	function data()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		print_r($this->users_model->get_data());
	}
}