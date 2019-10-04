<?php Class Mahasiswa extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function login($nim, $password){
        $this -> db -> select('nim, password, nama, jurusan, prodi, angkatan, no_telpon, ukm, jabatan');
        $this -> db -> from('mahasiswa');
        $this -> db -> where('nim', $nim);
        $this -> db -> where('password', ($password));
        $this -> db -> limit(1);

        $query = $this -> db -> get();

        if($query -> num_rows() == 1){
        return $query->result();}
        else{
            return false;
        }
    }
}
?>