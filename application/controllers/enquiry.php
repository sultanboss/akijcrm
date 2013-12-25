<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Enquiry extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->load->library('breadcrumbs');
		$this->lang->load('tank_auth');
		$this->load->model('enquiry_model');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		$data['title'] = 'Enquiry - Akij Ceramics CRM';

		$data['css'] = $this->tank_auth->load_admin_css(array(
			'js/lib/datepicker/css/datepicker.css',
			'js/lib/select2/select2.css', 
			'js/lib/select2/ebro_select2.css', 
			'js/lib/dataTables/media/DT_bootstrap.css', 
			'js/lib/dataTables/extras/TableTools/media/css/TableTools.css',
			'js/lib/Sticky/sticky.css'));

		$data['js'] = $this->tank_auth->load_admin_js(array(
			'js/lib/jquery-steps/jquery.steps.min.js', 
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
			'js/lib/datepicker/js/bootstrap-datepicker.js', 
			'js/lib/Sticky/sticky.js',
			'js/pages/ebro_wizard.js', 
			'js/pages/ebro_notifications.js',
			'js/pages/ebro_enquiry.js'));

		$this->breadcrumbs->push('Akij Ceramics CRM', '#');
		$this->breadcrumbs->push('Master', '#');
		$this->breadcrumbs->push('Enquiry', '#');

		$data['breadcrumbs'] = $this->breadcrumbs->show();
		$data['source_parameter'] = $this->enquiry_model->get_parameter(1);
		$data['products'] = $this->enquiry_model->get_product();

		$this->load->view('common/header', $data);
		$this->load->view('enquiry/index', $data);
		$this->load->view('common/footer', $data);
	}

	function add()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		$_POST = array_merge($_POST,json_decode(file_get_contents('php://input'),true));

		if ( isset($_POST['enquiry_name']) && isset($_POST['enquiry_date']) ) {
			$time = strtotime($this->input->post('enquiry_date'));
			$date = date('Y-m-d',$time);
			$data['data'] = array(
				'enquiry_name'			=> $this->input->post('enquiry_name'),
				'enquiry_date'			=> $date,
				'enquiry_contact'		=> $this->input->post('enquiry_contact'),
				'enquiry_address'		=> $this->input->post('enquiry_address'),
				'enquiry_source' 		=> $this->input->post('enquiry_source'),
				'enquiry_phone' 		=> $this->input->post('enquiry_phone'),
				'enquiry_email' 		=> $this->input->post('enquiry_email'),
				'enquiry_remarks' 		=> $this->input->post('enquiry_remarks'),
				'editor_id' 			=> $this->session->userdata('user_id')
			);

			$enquiry_id = $this->enquiry_model->add_enquiry($data['data']);

			for($i=0; $i<100; $i++)
			{
				if( isset($_POST['eq_product_name_'.$i]) )
				{					
					$data['eq_product'] = array(
						'enquiry_id'		=> $enquiry_id,
						'product_id'		=> $this->input->post('eq_product_name_'.$i),
						'product_quantity'	=> $this->input->post('eq_product_qty_'.$i),
						'product_rate'		=> $this->input->post('eq_product_rate_'.$i),
						'product_amount'	=> $this->input->post('eq_product_amount_'.$i),
						'editor_id' 		=> $this->session->userdata('user_id')
					);
					$this->enquiry_model->add_enquiry_product($data['eq_product']);
				}
				else
					$i = 100;
			}

			$this->session->set_flashdata('msg', 'Enquiry added successfully!');
			$this->session->set_flashdata('msg_type', 'success');
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid enquiry input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}
	}

	function edit()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		$_POST = array_merge($_POST,json_decode(file_get_contents('php://input'),true));

		if ( isset($_POST['enquiry_id']) &&  isset($_POST['enquiry_name']) && isset($_POST['enquiry_date']) ) {
			$time = strtotime($this->input->post('enquiry_date'));
			$date = date('Y-m-d',$time);
			$data['data'] = array(				
				'enquiry_name'			=> $this->input->post('enquiry_name'),
				'enquiry_date'			=> $date,
				'enquiry_contact'		=> $this->input->post('enquiry_contact'),
				'enquiry_address'		=> $this->input->post('enquiry_address'),
				'enquiry_source' 		=> $this->input->post('enquiry_source'),
				'enquiry_phone' 		=> $this->input->post('enquiry_phone'),
				'enquiry_email' 		=> $this->input->post('enquiry_email'),
				'enquiry_remarks' 		=> $this->input->post('enquiry_remarks'),
				'editor_id' 			=> $this->session->userdata('user_id')
			);

			var_dump($data['data']);

			$this->enquiry_model->edit_enquiry($this->input->post('enquiry_id'), $data['data']);
			$this->enquiry_model->edit_enquiry_product($this->input->post('enquiry_id'));

			for($i=0; $i<100; $i++)
			{
				if( isset($_POST['eq_product_name_'.$i]) )
				{					
					$data['eq_product'] = array(
						'enquiry_id'		=> $this->input->post('enquiry_id'),
						'product_id'		=> $this->input->post('eq_product_name_'.$i),
						'product_quantity'	=> $this->input->post('eq_product_qty_'.$i),
						'product_rate'		=> $this->input->post('eq_product_rate_'.$i),
						'product_amount'	=> $this->input->post('eq_product_amount_'.$i),
						'editor_id' 		=> $this->session->userdata('user_id')
					);
					$this->enquiry_model->add_enquiry_product($data['eq_product']);
				}
				else
					$i = 100;
			}

			$this->session->set_flashdata('msg', 'Enquiry updated successfully!');
			$this->session->set_flashdata('msg_type', 'success');
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid enquiry input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}
	}

	function get($id)
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if ( isset($id) ) {
			$enquiry = $this->enquiry_model->get_enquiry($id);
			$enquiry['enquiry_product'] = $this->enquiry_model->get_enquiry_product($id);

			echo json_encode($enquiry);
		}
	}

	function delete($id)
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if ( isset($id) ) {
			if($this->enquiry_model->delete_enquiry($id)) {
				$this->session->set_flashdata('msg', 'Enquiry deleted successfully!');
				$this->session->set_flashdata('msg_type', 'success');
			}
			else {
				$this->session->set_flashdata('msg', 'Invalid enquiry delete input!');
				$this->session->set_flashdata('msg_type', 'warning');
			}						
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid enquiry delete input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}

		redirect('/enquiry');
	}

	function data()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		print_r($this->enquiry_model->get_data());
	}
}