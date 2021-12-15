<?php 

$con = new mysqli("localhost","root", "", "db_surat_usro");

    if(isset($_POST['delete'])) {
    	$id = $_POST['id'];
             
        // Insert user data into table
        $result = mysqli_query($con, "DELETE FROM `tbl_surat` WHERE `tbl_surat`.`id` = $id");
        
        header("Location:view.php?pesan=success&frm=del");
    }
?>