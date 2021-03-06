<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Grup_kuisioner_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get grup_kuisioner by id_grup
     */
    function get_grup_kuisioner($id_grup)
    {
        return $this->db->get_where('grup_kuisioner',array('id_grup'=>$id_grup))->row_array();
    }
        
    /*
     * Get all grup_kuisioner
     */
    function get_all_grup_kuisioner()
    {
        $this->db->order_by('id_grup', 'desc');
        return $this->db->get('grup_kuisioner')->result_array();
    }
        
    /*
     * function to add new grup_kuisioner
     */
    function add_grup_kuisioner($params)
    {
        $this->db->insert('grup_kuisioner',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update grup_kuisioner
     */
    function update_grup_kuisioner($id_grup,$params)
    {
        $this->db->where('id_grup',$id_grup);
        return $this->db->update('grup_kuisioner',$params);
    }
    
    /*
     * function to delete grup_kuisioner
     */
    function delete_grup_kuisioner($id_grup)
    {
        return $this->db->delete('grup_kuisioner',array('id_grup'=>$id_grup));
    }
}
