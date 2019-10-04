<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Main extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('url');
        $this->load->model('modelpertama');
        $this->load->helper('download');
        $this->load->helper(array('form'));
    }

    public function index() {
        $data['judul'] = "UKM PNJ";
        $data['isi'] = 'depan';
        $data['ambildaftarukm'] = $this->modelpertama->ambildaftarukm();
        $this->load->view('template', $data, 'refresh');
    }

    public function login() {
        $data['judul'] = "Login Akun Anda";
        $data['isi'] = 'login';
        $this->load->view('template', $data, 'refresh');
    }

    public function pilihjurusan(){
        $data['jurusan'] = $this->modelpertama->ambiljurusan();
        $data['judul'] = "Pilih jurusan";
        $data['isi'] = 'pilihjurusan';
        $this->load->view('template', $data, 'refresh');
    }

    public function register() {
        $jurusan = $_POST['jurusan'];
        $data['prodi'] = $this->modelpertama->ambilprodi($jurusan);
        $data['judul'] = "Daftar akun mahasiswa";
        $data['jurusan_pilih'] = $jurusan;
        $data['isi'] = 'register';
        $this->load->view('template', $data, 'refresh');
    }

    function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('main', 'refresh');
    }
    
    function profile(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $nim = $session_data['nim'];
            $data['nim'] = $this->modelpertama->ambilprofile($nim);
            foreach ($data['nim']->result() as $baris) {
                $ukm = $baris->ukm;
            }
            $data['profileukm'] = $this->modelpertama->ambilukm($ukm);
            $data['ambildaftarukm'] = $this->modelpertama->ambildaftarukm();
            $data['absensidiri'] = $this->modelpertama->absensidiri($nim);
            $data['jadwal'] = $this->modelpertama->ambiljadwal($ukm);
            $data['isi'] = 'halaman_profile';
            $data['judul'] = "Profile ". $session_data['nama'];
            $this->load->view('template', $data, 'refresh');
        }
        else{
            //If no session, redirect to login page
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('main/login/', 'error');
        }
    }
    
    function ukm(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $nim = $session_data['nim'];
            $data['nim'] = $this->modelpertama->ambilprofile($nim);
            foreach ($data['nim']->result() as $baris) {
                $ukm = $baris->ukm;
                $jabatan = $baris->jabatan;
            }
            if ($jabatan != NULL) {
                $data['nim'] = $this->modelpertama->ambilprofile($nim);
                $data['profileukm'] = $this->modelpertama->ambilukm($ukm);
                foreach ($data['profileukm']->result() as $baris) {
                    $nama_ukm = $baris->nama_ukm;
                }
                
                $data['daftaranggota'] = $this->modelpertama->ambilanggota($ukm);
                $data['jadwal'] = $this->modelpertama->ambiljadwal($ukm);
                date_default_timezone_set('Asia/Jakarta'); 
                $tanggal_sekarang = date('Y-m-d');
                $data['cekabsen'] = $this->modelpertama->cekabsen($nim, $tanggal_sekarang);
                $data['isi'] = 'halaman_ukm';
                $data['judul'] = "UKM ". $nama_ukm;
                $this->load->view('template', $data, 'refresh');
            }
            else{
                redirect('main/profile/', 'error');
            }
        }
        else {
            redirect('main/', 'error');
        }
    
    }
    function ubahdata(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $nim = $_POST['nim'];
            $no_telpon = $_POST['no_telpon'];
            $data = array(
                "no_telpon" => $no_telpon
            );
            $kondisi = array('nim' => $nim);
            $res = $this->modelpertama->edit('mahasiswa', $data, $kondisi);
            if($res = 1){
                $this->session->set_flashdata('pesan', 'Berhasil mengubah data.');
                redirect('main/profile', 'refresh');
            }
            else{
                echo "Gagal";
            }
        }
    }

    function ubahdataukm(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $jabatan = $session_data['jabatan'];
            if ($jabatan == 'ketua') {
                $id_ukm = $_POST['id_ukm'];
                $penjelasan_ukm = $_POST['penjelasan_ukm'];
                $ketua = $_POST['ketua'];
                $data = array(
                    "penjelasan_ukm" => $penjelasan_ukm,
                    "ketua" => $ketua
                );
                $kondisi = array('id_ukm' => $id_ukm);
                $res = $this->modelpertama->edit('ukm', $data, $kondisi);
                if($res = 1){
                    $this->session->set_flashdata('pesan', 'Berhasil mengubah data.');
                    redirect('main/profile', 'refresh');
                }
                else{
                    echo "Gagal";
                }
            }
        }
    }

    function tambahjadwal(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $jabatan = $session_data['jabatan'];
            if ($jabatan == 'ketua') {
                $hari = $_POST['hari'];
                $mulai = $_POST['mulai'];
                $selesai = $_POST['selesai'];
                $password = $_POST['password'];
                $ukm = $_POST['id_ukm'];
                $data = array(
                    "ukm" => $ukm,
                    "hari" => $hari,
                    "mulai" => $mulai,
                    "selesai" => $selesai,
                    "password" => $password,
                );
                $res = $this->modelpertama->input('jadwal', $data);
                if($res = 1){
                    $this->session->set_flashdata('pesan', 'Berhasil mendaftar, silahkan login.');
                    redirect('main/ukm', 'refresh');
                }
                else{
                    echo "Gagal";
                }
            }
        }
    }

    function ubahjadwal(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $jabatan = $session_data['jabatan'];
            if ($jabatan == 'ketua') {
                $id_jadwal = $_POST['id_jadwal'];
                $hari = $_POST['hari'];
                $mulai = $_POST['mulai'];
                $password = $_POST['password'];
                $selesai = $_POST['selesai'];
                $data = array(
                    "hari" => $hari,
                    "mulai" => $mulai,
                    "password" => $password,
                    "selesai" => $selesai
                );
                $kondisi = array('id_jadwal' => $id_jadwal);
                $res = $this->modelpertama->edit('jadwal', $data, $kondisi);
                if($res = 1){
                    $this->session->set_flashdata('pesan', 'Berhasil mengubah data.');
                    redirect('main/ukm', 'refresh');
                }
                else{
                    echo "Gagal";
                }
            }
        }
    }

    function daftarukm() {
        if($this->session->userdata('logged_in')){
            $nim = $_POST['nim'];
            $ukm = $_POST['ukm'];
            $data = array(
                "nim" => $nim,
                "ukm" => $ukm
            );
            $kondisi = array('nim' => $nim);
            $res = $this->modelpertama->edit('mahasiswa', $data, $kondisi);
            if($res = 1){
                $this->session->set_flashdata('pesan', 'Berhasil mengubah data.');
                redirect('main/profile', 'refresh');
            }
            else{
                echo "Gagal";
            }
        }
    }

    function konfirmasidaftar(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $jabatan = $session_data['jabatan'];
            if ($jabatan == 'ketua') {
                $nim = $_POST['nim_orang'];
                $jabatan = $_POST['jabatan'];
                $data = array(
                    "nim" => $nim,
                    "jabatan" => $jabatan
                );
                $kondisi = array('nim' => $nim);
                $res = $this->modelpertama->edit('mahasiswa', $data, $kondisi);
                if($res = 1){
                    $this->session->set_flashdata('pesan', 'Berhasil mengubah data.');
                    redirect('main/ukm', 'refresh');
                }
                else{
                    echo "Gagal";
                }
            }
            else {
                redirect('main/ukm', 'refresh');
            }
        }
        else {
            redirect('main/login', 'refresh');
        }
    }

    function daftarakun(){
        $nim = $_POST['nim'];
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $prodi = $_POST['prodi'];
        $angkatan = $_POST['angkatan'];
        $no_telpon = $_POST['no_telpon'];
        $data = array(
            "nim" => $nim,
            "password" => $password,
            "nama" => $nama,
            "jurusan" => $jurusan,
            "prodi" => $prodi,
            "angkatan" => $angkatan,
            "no_telpon" => $no_telpon
        );
        $res = $this->modelpertama->input('mahasiswa', $data);
        if($res = 1){
            $this->session->set_flashdata('pesan', 'Berhasil mendaftar, silahkan login.');
            redirect('main/', 'refresh');
        }
        else{
            echo "Gagal";
        }
    }

    function absenkehadiran(){
        $nim = $_POST['nim'];
        $ukm = $_POST['ukm'];
        $data['jadwal'] = $this->modelpertama->ambiljadwal($ukm);
        $password = $_POST['password'];
        $id_jadwal = $_POST['id_jadwal'];
        $tanggal = $_POST['tanggal'];
        foreach ($data['jadwal']->result() as $baris) {
            $id_jadwal_aseli = $baris->id_jadwal;
            $password_aseli = $baris->password;
        }
        if($id_jadwal_aseli == $id_jadwal && $password_aseli == $password){
            $data = array(
                "nim" => $nim,
                "ukm" => $ukm,
                "tanggal" => $tanggal,
                "id_jadwal" => $id_jadwal
            );
            $res = $this->modelpertama->input('absen', $data);
            if($res = 1){
                $this->session->set_flashdata('pesan', 'Berhasil mendaftar, silahkan login.');
                redirect('main/ukm', 'refresh');
            }
            else{
                echo "Gagal";
            }
        }
        else {
            echo "Password Gabener";
        }
    }

    function absensi(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $jabatan = $session_data['jabatan'];
            $ukm = $session_data['ukm'];
            if ($jabatan == 'ketua') {
                $data['profileukm'] = $this->modelpertama->ambilukm($ukm);
                $data['absensi'] = $this->modelpertama->ambilabsensi($ukm);
                $data['daftaranggota'] = $this->modelpertama->ambilanggota($ukm);
                $data['isi'] = 'absensi';
                $data['judul'] = "Absensi dari UKM ". $ukm;
                $this->load->view('template', $data, 'refresh');
            }
        }
    }

    function hapusanggota(){
        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $jabatan = $session_data['jabatan'];
            $ukm = $session_data['ukm'];
            if ($jabatan == 'ketua') {
                $nim = $_POST['nim'];
                $data['nim'] = $this->modelpertama->ambilprofile($nim);
                $ukm = NULL;
                $jabatan = NULL;
                $data = array(
                    "ukm" => $ukm,
                    "jabatan" => $jabatan,
                );
                $kondisi = array('nim' => $nim);
                $res = $this->modelpertama->edit('mahasiswa', $data, $kondisi);
                if($res = 1){
                    $this->session->set_flashdata('pesan', 'Berhasil mengubah data.');
                    redirect('main/profile', 'refresh');
                }
                else{
                    echo "Gagal";
                }
            }
        }
    }

    

}