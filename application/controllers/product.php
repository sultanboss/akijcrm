<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('tank_auth_groups','','tank_auth');
		$this->load->library('breadcrumbs');
		$this->lang->load('tank_auth');
		$this->load->model('product_model');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		$data['title'] = 'Product - Akij Ceramics CRM';

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
		$this->breadcrumbs->push('Product', '#');

		$data['breadcrumbs'] = $this->breadcrumbs->show();

		$data['all_product_category'] = $this->product_model->all_product_category();

		$this->load->view('common/header', $data);
		$this->load->view('product/index', $data);
		$this->load->view('common/footer', $data);
	}

	function category()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		$data['title'] = 'Product Category - Akij Ceramics CRM';

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
		$this->breadcrumbs->push('Product Category', '#');

		$data['breadcrumbs'] = $this->breadcrumbs->show();

		$this->load->view('common/header', $data);
		$this->load->view('product/category', $data);
		$this->load->view('common/footer', $data);
	}

	function add()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if ( isset($_POST['product_category']) && isset($_POST['product_code']) && isset($_POST['product_price']) && isset($_POST['product_description']) ) {
			$data['data'] = array(
				'product_category'		=> $this->input->post('product_category'),
				'product_code'			=> $this->input->post('product_code'),
				'product_price'			=> $this->input->post('product_price'),
				'product_description'	=> $this->input->post('product_description'),
				'editor_id' 			=> $this->session->userdata('user_id')
			);

			$this->product_model->add_product($data['data']);
			$this->session->set_flashdata('msg', 'product <b>\''.$this->input->post('product_category').'\'</b> added successfully!');
			$this->session->set_flashdata('msg_type', 'success');
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid product input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}
		redirect('/product');
	}

	function addcategory()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if ( isset($_POST['product_category_name']) ) {
			$data['data'] = array(
				'product_category_name'			=> $this->input->post('product_category_name'),
				'editor_id' 					=> $this->session->userdata('user_id')
			);

			$this->product_model->add_product_category($data['data']);
			$this->session->set_flashdata('msg', 'Product Category <b>\''.$this->input->post('product_category_name').'\'</b> added successfully!');
			$this->session->set_flashdata('msg_type', 'success');
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid product category input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}

		redirect('/product/category');
	}

	function edit()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if (isset($_POST['product_id']) && isset($_POST['product_category']) && isset($_POST['product_code']) && isset($_POST['product_price']) ) {
			$data['data'] = array(
				'product_category'		=> $this->input->post('product_category'),
				'product_code'			=> $this->input->post('product_code'),
				'product_price'			=> $this->input->post('product_price'),
				'product_description'	=> $this->input->post('product_description'),
				'editor_id' 			=> $this->session->userdata('user_id')
			);

			$this->product_model->edit_product($this->input->post('product_id'), $data['data']);
			$this->session->set_flashdata('msg', 'product <b>\''.$this->input->post('product_category').'\'</b> updated successfully!');
			$this->session->set_flashdata('msg_type', 'success');
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid product input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}
		redirect('/product');
	}

	function editcategory()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if (isset($_POST['product_category_id']) && isset($_POST['product_category_name']) ) {
			$data['data'] = array(
				'product_category_name'			=> $this->input->post('product_category_name'),		
				'editor_id' 					=> $this->session->userdata('user_id')
			);

			$this->product_model->edit_product_category($this->input->post('product_category_id'), $data['data']);
			$this->session->set_flashdata('msg', 'Product Category <b>\''.$this->input->post('product_category_name').'\'</b> updated successfully!');
			$this->session->set_flashdata('msg_type', 'success');
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid product category input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}
		redirect('/product/category');
	}

	function delete($id)
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if ( isset($id) ) {
			if($this->product_model->delete_product($id)) {
				$this->session->set_flashdata('msg', 'product deleted successfully!');
				$this->session->set_flashdata('msg_type', 'success');
			}
			else {
				$this->session->set_flashdata('msg', 'Invalid product delete input!');
				$this->session->set_flashdata('msg_type', 'warning');
			}						
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid product delete input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}

		redirect('/product');
	}

	function deletecategory($id)
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		if ( isset($id) ) {
			if($this->product_model->delete_product_category($id)) {
				$this->session->set_flashdata('msg', 'Product Category deleted successfully!');
				$this->session->set_flashdata('msg_type', 'success');
			}
			else {
				$this->session->set_flashdata('msg', 'Invalid product category delete input!');
				$this->session->set_flashdata('msg_type', 'warning');
			}						
		}
		else {
			$this->session->set_flashdata('msg', 'Invalid product category delete input!');
			$this->session->set_flashdata('msg_type', 'warning');
		}

		redirect('/product/category');
	}

	function data()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		print_r($this->product_model->get_data());
	}

	function categorydata()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('');
		}

		print_r($this->product_model->get_category_data());
	}
}