<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
    }

    function add_product($data)
    {
        $data['created'] = date('Y-m-d H:i:s');

        if ($this->db->insert('product', $data)) {
            return $this->db->insert_id();
        }
        return NULL;
    }

    function edit_product($id, $data)
    {
        $this->db->where('product_id', $id);
        if ($this->db->update('product', $data)) {
            return true;
        }
        return NULL;
    }

    function delete_product($id) 
    {
        $this->db->where('product_id',$id);
        $this->db->delete('product');
        if($this->db->affected_rows() > 0)
            return true;
        return false;
    }

    function get_data() 
    {
        $this->datatables->select('product_id, product_name, product_code, product_price, product_description, created');   
        $this->datatables->from('product');       

        $this->datatables->edit_column('product_description', '<a class="pro_edit" data-id="$1" data-name="$2" data-code="$3" data-price="$4" data-description="$5" data-toggle="modal" href="#edit_product"><span class="icon-edit"></span></a> &nbsp; &nbsp;<a class=" bootbox_confirm" href="'.base_url().'product/delete/$1"><span class="icon-trash"></span></a>', 'product_id, product_name, product_code, product_price, product_description');

        $res = $this->datatables->generate();
        
        return $res;
    }

}