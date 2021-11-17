<?php 

class Surat_model {

    protected $db;
    function __construct($db){
        $this->db = $db;
    }

    function tampil_data()
    {
        $row = $this->db->prepare("SELECT * FROM tbl_surat");
        $row->execute();
        return $hasil = $row->fetchAll();
    }

    function getData($id)
    {
        $row = $this->db->prepare("SELECT * FROM tbl_surat where id = $id ");
        $row->execute();
        return $hasil = $row->fetch();
    }
    function getJenisData()
    {
        $row = $this->db->prepare("SELECT * FROM tbl_jenis_surat");
        $row->execute();
        return $hasil = $row->fetchAll();
    }

    function simpanData($data)
    {
        // buat array untuk isi values insert sumber kode 
        // http://thisinterestsme.com/pdo-prepared-multi-inserts/
        $rowsSQL = array();
        // buat bind param Prepared Statement
        $toBind = array();
        // list nama kolom
        $columnNames = array_keys($data[0]);
        // looping untuk mengambil isi dari kolom / values
        foreach($data as $arrayIndex => $row){
            $params = array();
            foreach($row as $columnName => $columnValue){
                $param = ":" . $columnName . $arrayIndex;
                $params[] = $param;
                $toBind[$param] = $columnValue;
            }
            $rowsSQL[] = "(" . implode(", ", $params) . ")";
        }
        $sql = "INSERT INTO tbl_surat (" . implode(", ", $columnNames) . ") VALUES " . implode(", ", $rowsSQL);
        $row = $this->db->prepare($sql);
        //Bind our values.
        foreach($toBind as $param => $val){
            $row ->bindValue($param, $val);
        }
        //Execute our statement (i.e. insert the data).
        return $row ->execute();
    }

    function updateData($data,$id)
    {
        // sumber kode 
        // https://stackoverflow.com/questions/23019219/creating-generic-update-function-using-php-mysql
        $setPart = array();
        foreach ($data as $key => $value)
        {
            $setPart[] = $key."=:".$key;
        }
        $sql = "UPDATE tbl_surat SET ".implode(', ', $setPart)." WHERE id = :id";
        $row = $this->db->prepare($sql);
        //Bind our values.
        $row ->bindValue(':id',$id); // where
        foreach($data as $param => $val)
        {
            $row ->bindValue($param, $val);
        }
        return $row ->execute();
    }
    
    function hapusData($id)
    {
        $sql = "DELETE FROM tbl_surat WHERE id = ?";
        $row = $this->db->prepare($sql);
        return $row ->execute(array($id));
    }
}

?>