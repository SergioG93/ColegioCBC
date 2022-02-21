<?php

    function getConn(){
        $mysqli = mysqli_connect("mysql:host=localhost;dbname=colegiocbc",
			            "root",
			            "");
        if (mysqli_connect_errno($mysqli))
        echo "Fallo al conectar al MSQL: " . mysqli_connect_error();
        $mysqli->set_charset('utf8');
        return $mysqli;

    }
