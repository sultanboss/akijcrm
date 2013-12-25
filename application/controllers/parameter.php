<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Parameter extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->load->library('breadcrumbs');
		$this->lang->load('tank_auth');
		$this->load->model('parameter_model');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		$data['title'] = 'Parameter - Akij Ceramics CRM';

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
		$this->breadcrumbs->push('Master', '#');
		$this->breadcrumbs->push('Parameter', '#');

		$data['breadcrumbs'] = $this->breadcrumbs->show();

		$data['all_parameter_type'] = $this->parameter_model->all_parameter_type();

		$this->load->view('common/header', $data);
		$this->load->view('parameter/index', $data);
		$this->load->view('common/footer', $data);
	}

	function type()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		$data['title'] = 'Parameter Type - Akij Ceramics CRM';

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
		$this->breadcrumbs->push('Master', '#');
		$this->breadcrumbs->push('Parameter Type', '#');

		$data['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('common/header', $data);
		$this->load->view('parameter/type', $data);
		$this->load->view('common/footer', $data);
	}

	function add()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if ( isset($_POST['parameter_name']) && isset($_POST['parameter_type']) ) {
			$data['data'] = array(
				'parameter_name'			=> $this->input->post('parameter_name'),
				'parameter_type'			=> $this->input->post('parameter_type'),
				'editor_id' 				=> $this->session->userdata('user_id')
			);

			$this->parameter_model->add_parameter($data['data']);
			$this->session->set_flashdata('msg', 'Parameter <b>\''.$this->input->post('parameter_name').'\'</b> added successfully!');
			$this->session->set_flashdata('msg_type', 'success');
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid parameter input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}
		redirect('/parameter');
	}

	function addtype()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if ( isset($_POST['parameter_type_name']) ) {
			$data['data'] = array(
				'parameter_type_name'			=> $this->input->post('parameter_type_name'),
				'editor_id' 					=> $this->session->userdata('user_id')
			);

			$this->parameter_model->add_parameter_type($data['data']);
			$this->session->set_flashdata('msg', 'Parameter <b>\''.$this->input->post('parameter_type_name').'\'</b> added successfully!');
			$this->session->set_flashdata('msg_type', 'success');
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid parameter input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}

		redirect('/parameter/type');
	}

	function edit()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if (isset($_POST['parameter_id']) && isset($_POST['parameter_name']) && isset($_POST['parameter_type']) ) {
			$data['data'] = array(
				'parameter_name'			=> $this->input->post('parameter_name'),
				'parameter_type'			=> $this->input->post('parameter_type'),				
				'editor_id' 				=> $this->session->userdata('user_id')
			);

			$this->parameter_model->edit_parameter($this->input->post('parameter_id'), $data['data']);
			$this->session->set_flashdata('msg', 'parameter <b>\''.$this->input->post('parameter_name').'\'</b> updated successfully!');
			$this->session->set_flashdata('msg_type', 'success');
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid parameter input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}
		redirect('/parameter');
	}

	function edittype()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if (isset($_POST['parameter_type_id']) && isset($_POST['parameter_type_name']) ) {
			$data['data'] = array(
				'parameter_type_name'			=> $this->input->post('parameter_type_name'),
				'parameter_type_id'				=> $this->input->post('parameter_type_id'),				
				'editor_id' 					=> $this->session->userdata('user_id')
			);

			$this->parameter_model->edit_parameter_type($this->input->post('parameter_type_id'), $data['data']);
			$this->session->set_flashdata('msg', 'parameter <b>\''.$this->input->post('parameter_name').'\'</b> updated successfully!');
			$this->session->set_flashdata('msg_type', 'success');
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid parameter input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}
		redirect('/parameter/type');
	}

	function delete($id)
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if ( isset($id) ) {
			if($this->parameter_model->delete_parameter($id)) {
				$this->session->set_flashdata('msg', 'parameter deleted successfully!');
				$this->session->set_flashdata('msg_type', 'success');
			}
			else {
				$this->session->set_flashdata('msg', 'Invalid parameter delete input!');
				$this->session->set_flashdata('msg_type', 'warning');
			}						
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid parameter delete input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}

		redirect('/parameter');
	}

	function deletetype($id)
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if ( isset($id) ) {
			if($this->parameter_model->delete_parameter_type($id)) {
				$this->session->set_flashdata('msg', 'parameter deleted successfully!');
				$this->session->set_flashdata('msg_type', 'success');
			}
			else {
				$this->session->set_flashdata('msg', 'Invalid parameter delete input!');
				$this->session->set_flashdata('msg_type', 'warning');
			}						
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid parameter delete input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}

		redirect('parameter/type');
	}

	function data()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		print_r($this->parameter_model->get_data());
	}

	function typedata()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		print_r($this->parameter_model->get_type_data());
	}
}