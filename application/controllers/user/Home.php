
<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('mylib');
        if (!$this->session->userdata('isLogin')) {
            redirect('auth/index');
        }
    }

    /*
     * Listing of aspek_penilaian
     */
    public function index()
    {
        // $data['aspek_penilaian'] = $this->Aspek_penilaian_model->get_all_aspek_penilaian();
        $data['title'] = ['title' => 'Home'];
        $data['_view'] = 'user/home';
        $this->load->view('user/template/main', $data);
    }

    /*
     * Adding a new aspek_penilaian
     */

    public function login()
    {
        $result = $this->mylib->restlogin($this->input->post('username'), $this->input->post('password'));
        $result['isLogin'] = true;
        $this->session->set_userdata($result);
        redirect('dashboard/index');
    }

    public function add()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        $result = $this->Aspek_penilaian_model->add_aspek_penilaian($data);
        echo json_decode($result);
    }

    /*
     * Editing a aspek_penilaian
     */
    public function edit()
    {
        // check if the aspek_penilaian exists before trying to edit it
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        // check if the range_nilai exists before trying to edit it
        $result = $this->Aspek_penilaian_model->update_aspek_penilaian($data);
        echo json_decode($data);
    }

    /*
     * Deleting aspek_penilaian
     */
    public function remove($id_aspek)
    {
        $aspek_penilaian = $this->Aspek_penilaian_model->get_aspek_penilaian($id_aspek);

        // check if the aspek_penilaian exists before trying to delete it
        if (isset($aspek_penilaian['id_aspek'])) {
            $this->Aspek_penilaian_model->delete_aspek_penilaian($id_aspek);
            echo json_decode(['message' => true]);
        } else {
            http_response_code(400);
            echo json_decode(['message' => false]);
        }

    }

}
