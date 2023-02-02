<?php

//koneksi databse
$server = "localhost";
$user = "root";
$password = "";
$database = "cakrabudaya";

//buat koneksi
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));
