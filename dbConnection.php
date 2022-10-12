<?php  
            $serverName = "localhost";
            $username = "root";
            $password = "";
            $dbname = "booksreview";
            $conn = mysqli_connect($serverName,$username,$password,$dbname);
            if (mysqli_connect_errno()) {
                die("Connection failed: " . mysqli_connect_error());
            }
?>