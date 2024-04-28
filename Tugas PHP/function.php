<?php
$conn = mysqli_connect("localhost","root","","test");

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($data["password"]);   
    $password2 = mysqli_real_escape_string($data["password2"]);
    
    if($password !== $password2){

    }
}
?>