<?php
    include '../../config/database.php';
    $nama_website=$_POST["web_name"];
    $sql="update profil set nama_website='$nama_website'"; 
    mysqli_query($kon,$sql);

?>