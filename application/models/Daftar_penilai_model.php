<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Daftar_penilai_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get daftar_penilai by id_penilai
     */
    function get_daftar_penilai($id_penilai)
    {
        return $this->db->get_where('daftar_penilai',array('id_penilai'=>$id_penilai))->row_array();
    }
        
    /*
     * Get all daftar_penilai
     */
    function get_all_daftar_penilai()
    {
        $this->db->order_by('id_penilai', 'desc');
        return $this->db->get('daftar_penilai')->result_array();
    }
        
    /*
     * function to add new daftar_penilai
     */
    function add_daftar_penilai($params)
    {
        $this->db->insert('daftar_penilai',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update daftar_penilai
     */
    function update_daftar_penilai($id_penilai,$params)
    {
        $this->db->where('id_penilai',$id_penilai);
        return $this->db->update('daftar_penilai',$params);
    }
    
    /*
     * function to delete daftar_penilai
     */
    function delete_daftar_penilai($id_penilai)
    {
        return $this->db->delete('daftar_penilai',array('id_penilai'=>$id_penilai));
    }
}