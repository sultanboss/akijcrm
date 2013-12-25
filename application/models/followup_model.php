<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Followup_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
    }

    function add_followup($data)
    {
        $data['created'] = date('Y-m-d H:i:s');

        if ($this->db->insert('followup', $data)) {
            return $this->db->insert_id();
        }
        return NULL;
    }

    function add_enquiry_product($data)
    {
        $data['created'] = date('Y-m-d H:i:s');

        if ($this->db->insert('enquiry_product', $data)) {
            return $this->db->insert_id();
        }
        return NULL;
    }

    function edit_enquiry($id, $data)
    {
        $this->db->where('enquiry_id', $id);
        if ($this->db->update('enquiry', $data)) {
            return true;
        }
        return NULL;
    }

    function edit_enquiry_product($id) 
    {
        $this->db->where('enquiry_id',$id);
        $this->db->delete('enquiry_product');
    }

    function edit_enquiry_followup($id) 
    {
        $this->db->where('enquiry_id',$id);
        $this->db->delete('followup');
    }

    function delete_enquiry($id) 
    {
        $this->db->where('enquiry_id',$id);
        $this->db->delete('enquiry');
        $row = $this->db->affected_rows();

        $this->db->where('enquiry_id',$id);
        $this->db->delete('enquiry_product');

        if($row > 0)
            return true;
        return false;
    }

    function get_enquiry($id) 
    {
        $this->db->where('enquiry_id',$id);
        $query = $this->db->get('enquiry');
        $ar = array();
        foreach ($query->result_array() as $key => $value) {
             $ar['enquiry_id']       = $value['enquiry_id'];
             $ar['enquiry_date']     = $value['enquiry_date'];
             $ar['enquiry_name']     = $value['enquiry_name'];
             $ar['enquiry_contact']  = $value['enquiry_contact'];
             $ar['enquiry_address']  = $value['enquiry_address'];
             $ar['enquiry_phone']    = $value['enquiry_phone'];
             $ar['enquiry_email']    = $value['enquiry_email'];
             $ar['enquiry_source']   = $value['enquiry_source'];
             $ar['enquiry_remarks']  = $value['enquiry_remarks'];
             $ar['eq_followup_date'] = $value['followup_date_next'];
        }    
        return $ar;
    }

    function get_enquiry_product($id) 
    {
        $this->db->where('enquiry_id',$id);
        $query = $this->db->get('enquiry_product');
        $ar = array();
        $i = 0;
        foreach ($query->result_array() as $key => $value) {
             $ar[$i]['product_id']          = $value['product_id'];
             $ar[$i]['product_quantity']    = $value['product_quantity'];
             $ar[$i]['product_rate']        = $value['product_rate'];
             $ar[$i]['product_amount']      = $value['product_amount'];
             $i++;
        }    
        return $ar;
    }

    function get_enquiry_followup($id) 
    {
        $this->db->where('enquiry_id',$id);
        $query = $this->db->get('followup');
        $ar = array();
        $i = 0;
        foreach ($query->result_array() as $key => $value) {
             $ar[$i]['followup_date']       = $value['followup_date'];
             $ar[$i]['followup_time']       = $value['followup_time'];
             $ar[$i]['followup_type']       = $value['followup_type'];
             $ar[$i]['followup_remarks']    = $value['followup_remarks'];
             $i++;
        }    
        return $ar;
    }

    function get_parameter($id) 
    {
        $this->db->where('parameter_type',$id);
        $query = $this->db->get('parameter');
        return $query->result_array();        
    }

    function get_product() 
    {
        $query = $this->db->get('product');
        return $query->result_array();        
    }

    function get_data() 
    {
        $this->datatables->select('enquiry_id, enquiry_date, enquiry_name, enquiry_phone, followup_date_next, created');   
        $this->datatables->from('enquiry');       

        $this->datatables->edit_column('created', '<a class="enq_edit" data-toggle="modal" href="#" id="$1" data-target="#edit_enquiry"><span class="icon-edit"></span></a>', 'enquiry_id');

        $res = $this->datatables->generate();

        return $res;
    }

}