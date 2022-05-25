<?php

$conn=mysqli_connect("localhost","root","","testing_user_data");
if(!$conn){
    die("Failed to connect: ".mysqli_connect_errno());
}

?>