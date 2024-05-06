<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "test");
function querry($querry){
    global $conn;
    $result = mysqli_query($conn, $querry);
    $rows = [];
    while ($row = mysqli_fetch_array($result)){
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if ($password !== $password2){
        echo "<script>alert('konfirmasi password tidak sesuai!')</script>";
        return false;
    }

    $result = mysqli_query($conn, "SELECT Username FROM login WHERE Username = '$username'");

    if (mysqli_fetch_assoc($result)){
        echo "<script>alert('Username sudah ada!')</script>";
        return false;
    }


    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO login VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);

}

function login($data){
    global $conn;
    $username = $data["username"];
    $password = $data["password"];

    $result = mysqli_query($conn,"SELECT * FROM login WHERE username = '$username'");
    if (mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["Password"])){
            $_SESSION["login"] = true;
            header("Location: to-do.php?name=$username");
            exit;
        }
    }

    echo "<script> alert('Username atau Password anda mungkin salah!');</script>";

}

function tambah($username, $data){
    global $conn;
    $activity = $data["aktivitas"];
    mysqli_query($conn,"INSERT INTO activity VALUES ('', '$username', '$activity', 'no')");

}

?>