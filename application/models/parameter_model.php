<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Parameter_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
    }

    function all_parameter_type()
    {
        $this->db->order_by("parameter_type_id", "asc"); 
        $query = $this->db->get('parameter_type');
        return $query->result_array();
    }

    function add_parameter($data)
    {
        $data['created'] = date('Y-m-d H:i:s');

        if ($this->db->insert('parameter', $data)) {
            return $this->db->insert_id();
        }
        return NULL;
    }

    function edit_parameter($id, $data)
    {
        $this->db->where('parameter_id', $id);
        if ($this->db->update('parameter', $data)) {
            return true;
        }
        return NULL;
    }

    function delete_parameter($id) 
    {
        $this->db->where('parameter_id',$id);
        $this->db->delete('parameter');
        if($this->db->affected_rows() > 0)
            return true;
        return false;
    }

    function add_parameter_type($data)
    {
        $data['created'] = date('Y-m-d H:i:s');

        if ($this->db->insert('parameter_type', $data)) {
            return $this->db->insert_id();
        }
        return NULL;
    }

    function edit_parameter_type($id, $data)
    {
        $this->db->where('parameter_type_id', $id);
        if ($this->db->update('parameter_type', $data)) {
            return true;
        }
        return NULL;
    }

    function delete_parameter_type($id) 
    {
        $row = $this->db->where('parameter_type', $id)->count_all_results('parameter');
        if($row == 0)
        {
            $this->db->where('parameter_type_id',$id);
            $this->db->delete('parameter_type');
            if($this->db->affected_rows() > 0)
                return true;
        }
        return false;
    }

    function get_data() 
    {
        $this->datatables->select('parameter_id, parameter_name, parameter_type_name, parameter_type_id');   
        $this->datatables->where('parameter_type = parameter_type_id');  
        $this->datatables->from('parameter, parameter_type');       

        $this->datatables->edit_column('parameter_type_id', '<a class="par_edit" data-name="$1" data-id="$2" data-type="$3" data-toggle="modal" href="#edit_parameter"><span class="icon-edit"></span></a> &nbsp; &nbsp;<a class=" bootbox_confirm" href="'.base_url().'parameter/delete/$2"><span class="icon-trash"></span></a>', 'parameter_name, parameter_id, parameter_type_id');

        $res = $this->datatables->generate();
        
        return $res;

    }

    function get_type_data() 
    {
        $this->datatables->select('parameter_type_id, parameter_type_name, editor_id');   
        $this->datatables->from('parameter_type');       

        $this->datatables->edit_column('editor_id', '<a class="par_type_edit" data-name="$1" data-id="$2" data-toggle="modal" href="#edit_parameter_type"><span class="icon-edit"></span></a> &nbsp; &nbsp;<a class=" bootbox_confirm" href="'.base_url().'parameter/deletetype/$2"><span class="icon-trash"></span></a>', 'parameter_type_name, parameter_type_id');

        $res = $this->datatables->generate();
        
        return $res;

    }

}