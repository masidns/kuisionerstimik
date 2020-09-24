<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Grup_kuisioner extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Grup_kuisioner_model');
        if (!$this->session->userdata('isLogin')) {
            redirect('auth/index');
        }
    } 

    /*
     * Listing of grup_kuisioner
     */
    function index()
    {
        $data['grup_kuisioner'] = $this->Grup_kuisioner_model->get_all_grup_kuisioner();
        
        $data['_view'] = 'grup_kuisioner/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new grup_kuisioner
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'id_kuisioner' => $this->input->post('id_kuisioner'),
				'id_layanan' => $this->input->post('id_layanan'),
            );
            
            $grup_kuisioner_id = $this->Grup_kuisioner_model->add_grup_kuisioner($params);
            redirect('grup_kuisioner/index');
        }
        else
        {            
            $data['_view'] = 'grup_kuisioner/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a grup_kuisioner
     */
    function edit($id_grup)
    {   
        // check if the grup_kuisioner exists before trying to edit it
        $data['grup_kuisioner'] = $this->Grup_kuisioner_model->get_grup_kuisioner($id_grup);
        
        if(isset($data['grup_kuisioner']['id_grup']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'id_kuisioner' => $this->input->post('id_kuisioner'),
					'id_layanan' => $this->input->post('id_layanan'),
                );

                $this->Grup_kuisioner_model->update_grup_kuisioner($id_grup,$params);            
                redirect('grup_kuisioner/index');
            }
            else
            {
                $data['_view'] = 'grup_kuisioner/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The grup_kuisioner you are trying to edit does not exist.');
    } 

    /*
     * Deleting grup_kuisioner
     */
    function remove($id_grup)
    {
        $grup_kuisioner = $this->Grup_kuisioner_model->get_grup_kuisioner($id_grup);

        // check if the grup_kuisioner exists before trying to delete it
        if(isset($grup_kuisioner['id_grup']))
        {
            $this->Grup_kuisioner_model->delete_grup_kuisioner($id_grup);
            redirect('grup_kuisioner/index');
        }
        else
            show_error('The grup_kuisioner you are trying to delete does not exist.');
    }
    
}
