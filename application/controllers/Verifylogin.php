<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class VerifyLogin extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('mahasiswa','',TRUE);
    }

    function index(){
        //This method will have the credentials validation
        $this->form_validation->set_rules('nim', 'nim', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required|callback_check_database');

        if($this->form_validation->run() == FALSE){
            //Field validation failed.  User redirected to login page
            $this->load->view('login');
        }
        
        else{
            //Go to private area
            redirect('/main/profile', 'refresh');
        }

    }

    function check_database($password){
        //Field validation succeeded.  Validate against database
        $nim = $this->input->post('nim');

        //query the database
        $result = $this->mahasiswa->login($nim, $password);

        if($result){
            $sess_array = array();
            foreach($result as $row){
                $sess_array = array(
                    'nim' => $row->nim,
                    'nama' => $row->nama,
                    'jurusan' => $row->jurusan,
                    'prodi' => $row->prodi,
                    'angkatan' => $row->angkatan,
                    'no_telpon' => $row->no_telpon,
                    'ukm' => $row->ukm,
                    'jabatan' => $row->jabatan
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        }
        else{
            $this->session->set_flashdata('error', 'Username dan Password Anda Salah');
            redirect('main/login/');
            return false;
        }
    }
}