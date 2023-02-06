<?php
    $conn = mysqli_connect('localhost', 'root', '', 'db_spp_xiirpl1_rafli_afdillah');

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    