<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Bons_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tb_am_bon by bon_id
     */
    function get_tb_am_bon($bon_id)
    {
        return $this->db->get_where('tb_am_bons',array('bon_id'=>$bon_id))->row_array();
    }
    
    /*
     * Get all tb_am_bons count
     */
    function get_all_tb_am_bons_count()
    {
        $this->db->from('tb_am_bons');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tb_am_bons
     */
    function get_all_tb_am_bons($params = array())
    {
        $this->db->order_by('bon_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tb_am_bons')->result_array();
    }
        
    /*
     * function to add new tb_am_bon
     */
    function add_tb_am_bon($params)
    {
        $this->db->insert('tb_am_bons',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tb_am_bon
     */
    function update_tb_am_bon($bon_id,$params)
    {
        $this->db->where('bon_id',$bon_id);
        return $this->db->update('tb_am_bons',$params);
    }
    
    /*
     * function to delete tb_am_bon
     */
    function delete_tb_am_bon($bon_id)
    {
        return $this->db->delete('tb_am_bons',array('bon_id'=>$bon_id));
    }
}