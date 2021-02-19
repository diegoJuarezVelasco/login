<?php 
    $serverName = "gdlwebcamp.cywuxox3pyvn.us-east-2.rds.amazonaws.com";
    $dBUsername ="dieguitojd";
    $dBPassword ="gdlwebcamp";
    $dBName = "sistema";

    
    
    $conn = mysqli_connect($serverName,$dBUsername , $dBPassword ,$dBName);
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {

    }
