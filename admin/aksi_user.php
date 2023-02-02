<?php
//Artikel aksi

//panggil koneksi database
include "koneksi.php";

//uji jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {

    $tnama = $_POST['tnama'];
    $tusername = $_POST['tusername'];
    $tpassword = $_POST['tpassword'];


    //persiapan simpan data baru
    $simpan =  mysqli_query($koneksi, "INSERT INTO users(nama, username, password)
                                        VALUES ('$tnama',
                                                '$tusername',
                                                '$tpassword')");

    // jika simpan sukses
    if ($simpan) {
        echo "<script>
                alert('simpan data sukses!');
                document.location='user.php';
                </script>";
    } else {
        echo "<script>
                alert('simpan data gagal!');
                document.location='user.php';
                </script>";
    }
}

//uji jika tombol ubah diklik
if (isset($_POST['bubah'])) {

    $tnama = $_POST['tnama'];
    $tusername = $_POST['tusername'];
    $tpassword = $_POST['tpassword'];


    //persiapan ubah data baru
    $ubah =  mysqli_query($koneksi, "UPDATE users SET
                                                        nama = '$tnama',
                                                        username ='$tusername',
                                                        password ='$tpassword'                                                        
                                                WHERE id ='$_POST[id]'
                                                        ");

    // jika ubah sukses
    if ($ubah) {
        echo "<script>
                alert('ubah data sukses!');
                document.location='user.php';
                </script>";
    } else {
        echo "<script>
                alert('ubah data gagal!');
                document.location='user.php';
                </script>";
    }
}

//uji jika tombol hapus diklik
if (isset($_POST['bhapus'])) {

    //persiapan ubah data baru
    $hapus =  mysqli_query($koneksi, "DELETE FROM users WHERE id = '$_POST[id]'");



    // jika ubah sukses
    if ($hapus) {
        echo "<script>
                alert('hapus data sukses!');
                document.location='user.php';
                </script>";
    } else {
        echo "<script>
                alert('hapus data gagal!');
                document.location='user.php';
                </script>";
    }
}
