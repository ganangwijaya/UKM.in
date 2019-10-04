<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class modelpertama extends CI_Model {

        public function __construct() {
            parent::__construct();
            $this->load->database();
        }

        function ambilprofile($nim){
            $this->db->where('nim',$nim);
            return $this->db->get('mahasiswa');
        }

        function ambilukm($ukm){
            $this->db->where('id_ukm',$ukm);
            return $this->db->get('ukm');
        }

        function ambilanggota($ukm){
            $this->db->where('ukm',$ukm);
            return $this->db->get('mahasiswa');
        }

        function ambildaftarukm(){
            return $this->db->get_where('ukm');
        }

        function edit($table, $data, $kondisi){
            $res = $this->db->update($table, $data, $kondisi);
            return $res;
        }

        function input($namatabel, $data){
            $res = $this->db->insert($namatabel,$data);
            return $res;
        }

        function ambilprodi($jurusan){
            $this->db->where('jurusan', $jurusan);
            return $this->db->get('jurusan');
        }

        function ambiljurusan(){
            $this->db->select('jurusan');
            $this->db->distinct();
            return $this->db->get('jurusan');
        }
        
        function ambiljadwal($ukm){
            $this->db->where('ukm',$ukm);
            return $this->db->get('jadwal');
        }

        function cekabsen($nim, $tanggal_sekarang){
            $this->db->where('nim', $nim);
            $this->db->where('tanggal', $tanggal_sekarang);
            return $this->db->get('absen');
        }

        function ambilabsensi($ukm){
            $this->db->where('ukm', $ukm);
            return $this->db->get('absen');
        }

        function absensidiri($nim){
            $this->db->where('nim', $nim);
            return $this->db->get('absen');
        }

    }
?>