<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Hasil_penilaian extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hasil_penilaian_model');
        if (!$this->session->userdata('isLogin')) {
            redirect('auth/index');
        }
    } 

    /*
     * Listing of hasil_penilaian
     */
    function index()
    {
        $data['hasil_penilaian'] = $this->Hasil_penilaian_model->get_all_hasil_penilaian();
        
        $data['_view'] = 'hasil_penilaian/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new hasil_penilaian
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'jumlah' => $this->input->post('jumlah'),
				'id_layanan' => $this->input->post('id_layanan'),
				'id_periode' => $this->input->post('id_periode'),
				'id_aspek' => $this->input->post('id_aspek'),
				'id_range' => $this->input->post('id_range'),
            );
            
            $hasil_penilaian_id = $this->Hasil_penilaian_model->add_hasil_penilaian($params);
            redirect('hasil_penilaian/index');
        }
        else
        {            
            $data['_view'] = 'hasil_penilaian/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a hasil_penilaian
     */
    function edit($npm)
    {   
        // check if the hasil_penilaian exists before trying to edit it
        $data['hasil_penilaian'] = $this->Hasil_penilaian_model->get_hasil_penilaian($npm);
        
        if(isset($data['hasil_penilaian']['npm']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'jumlah' => $this->input->post('jumlah'),
					'id_layanan' => $this->input->post('id_layanan'),
					'id_periode' => $this->input->post('id_periode'),
					'id_aspek' => $this->input->post('id_aspek'),
					'id_range' => $this->input->post('id_range'),
                );

                $this->Hasil_penilaian_model->update_hasil_penilaian($npm,$params);            
                redirect('hasil_penilaian/index');
            }
            else
            {
                $data['_view'] = 'hasil_penilaian/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The hasil_penilaian you are trying to edit does not exist.');
    } 

    /*
     * Deleting hasil_penilaian
     */
    function remove($npm)
    {
        $hasil_penilaian = $this->Hasil_penilaian_model->get_hasil_penilaian($npm);

        // check if the hasil_penilaian exists before trying to delete it
        if(isset($hasil_penilaian['npm']))
        {
            $this->Hasil_penilaian_model->delete_hasil_penilaian($npm);
            redirect('hasil_penilaian/index');
        }
        else
            show_error('The hasil_penilaian you are trying to delete does not exist.');
    }
    
}
