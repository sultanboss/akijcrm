<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
    }

    function all_product_category()
    {
        $this->db->order_by("product_category_id", "asc"); 
        $query = $this->db->get('product_category');
        return $query->result_array();
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

    function add_product_category($data)
    {
        $data['created'] = date('Y-m-d H:i:s');

        if ($this->db->insert('product_category', $data)) {
            return $this->db->insert_id();
        }
        return NULL;
    }

    function edit_product_category($id, $data)
    {
        $this->db->where('product_category_id', $id);
        if ($this->db->update('product_category', $data)) {
            return true;
        }
        return NULL;
    }

    function delete_product_category($id) 
    {
        $row = $this->db->where('product_category', $id)->count_all_results('product');
        if($row == 0)
        {
            $this->db->where('product_category_id',$id);
            $this->db->delete('product_category');
            if($this->db->affected_rows() > 0)
                return true;
        }
        return false;
    }

    function get_data() 
    {
        $this->datatables->select('product_id, product_category_name, product_code, product_price, product_category_id, product_description');   
        $this->datatables->where('product_category = product_category_id');  
        $this->datatables->from('product, product_category');        

        $this->datatables->edit_column('product_category_id', '<a class="pro_edit" data-id="$1" data-category="$2" data-code="$3" data-price="$4" data-description="$5" data-toggle="modal" href="#edit_product"><span class="icon-edit"></span></a> &nbsp; &nbsp;<a class=" bootbox_confirm" href="'.base_url().'product/delete/$1"><span class="icon-trash"></span></a>', 'product_id, product_category_id, product_code, product_price, product_description');

        $res = $this->datatables->generate();
        
        return $res;
    }

    function get_category_data() 
    {
        $this->datatables->select('product_category_id, product_category_name, editor_id');   
        $this->datatables->from('product_category');       

        $this->datatables->edit_column('editor_id', '<a class="par_cat_edit" data-name="$1" data-id="$2" data-toggle="modal" href="#edit_product_category"><span class="icon-edit"></span></a> &nbsp; &nbsp;<a class=" bootbox_confirm" href="'.base_url().'product/deletecategory/$2"><span class="icon-trash"></span></a>', 'product_category_name, product_category_id');

        $res = $this->datatables->generate();
        
        return $res;
    }

}