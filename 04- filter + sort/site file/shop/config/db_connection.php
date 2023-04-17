<?php

    $conn = mysqli_connect('localhost', 'root', '', 'shop');

    if(!$conn){
        echo 'Connection Error' . mysqli_connect_errno();
    }


?>