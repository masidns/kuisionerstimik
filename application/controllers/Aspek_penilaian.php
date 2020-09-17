<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Aspek_penilaian extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Aspek_penilaian_model');
    } 

    /*
     * Listing of aspek_penilaian
     */
    function index()
    {
        // $data['aspek_penilaian'] = $this->Aspek_penilaian_model->get_all_aspek_penilaian();
        $data['title'] = ['title'=>'Aspek Penilaian'];
        $data['_view'] = 'aspek_penilaian/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new aspek_penilaian
     */

    function getdata()
    {
        $data = $this->Aspek_penilaian_model->get_all_aspek_penilaian();
        echo json_encode($data);
    }

    function add()
    {  
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream),true);
        $result = $this->Aspek_penilaian_model->add_aspek_penilaian($data);
        echo json_decode($result);
    }  

    /*
     * Editing a aspek_penilaian
     */
    function edit()
    {   
        // check if the aspek_penilaian exists before trying to edit it
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream),true);
        // check if the range_nilai exists before trying to edit it
        $result =$this->Aspek_penilaian_model->update_aspek_penilaian($data);
        echo json_decode($data);
    } 

    /*
     * Deleting aspek_penilaian
     */
    function remove($id_aspek)
    {
        $aspek_penilaian = $this->Aspek_penilaian_model->get_aspek_penilaian($id_aspek);

        // check if the aspek_penilaian exists before trying to delete it
        if(isset($aspek_penilaian['id_aspek']))
        {
            $this->Aspek_penilaian_model->delete_aspek_penilaian($id_aspek);
            echo json_decode(['message' => true]);
        }
        else
            http_response_code(400);
            echo json_decode(['message' => false]);
    }
    
}
