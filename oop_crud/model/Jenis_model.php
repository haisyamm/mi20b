<?php 

class prosesCrud {

    protected $db;
    function __construct($db){
        $this->db = $db;
    }

    function tampil_data()
    {
        $row = $this->db->prepare("SELECT * FROM 'tbl_jenis_surat'");
        $row->execute();
        return $hasil = $row->fetchAll();
    }

    
}

?>