<?php
//Artikel aksi

//panggil koneksi database
include "koneksi.php";

//uji jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {

    $tnama = $_POST['tnama'];
    $tkategori = $_POST['tkategori'];
    $tdeskripsi =  $_POST['tdeskripsi'];
    $tgambar = $_FILES['tgambar']['name'];

    $x = explode('.', $tgambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['tgambar']['tmp_name'];
    $angka_acak = rand(1, 100);
    $nama_gambar_baru = ($tkategori) . '-' . $angka_acak . '.' . end($x);

    move_uploaded_file($file_tmp, '../assets/img/' . $nama_gambar_baru);
    //persiapan simpan data baru
    $simpan =  mysqli_query($koneksi, "INSERT INTO koleksi(nama, kategori, deskripsi, gambar )
                                        VALUES ('$tnama',
                                                '$tkategori',
                                                '$tdeskripsi',
                                                '$nama_gambar_baru')");

    // jika simpan sukses
    if ($simpan) {
        echo "<script>
                alert('simpan data sukses!');
                document.location='koleksi.php';
                </script>";
    } else {
        echo "<script>
                alert('simpan data gagal!');
                document.location='koleksi.php';
                </script>";
    }
}


//uji jika tombol ubah diklik
if (isset($_POST['bubah'])) {



    $tnama = $_POST['tnama'];
    $tkategori = $_POST['tkategori'];
    $tdeskripsi =  $_POST['tdeskripsi'];
    $tgambar = $_FILES['tgambar']['name'];
    $tampil = mysqli_query($koneksi, "SELECT * FROM koleksi WHERE id_produk");
    $data = mysqli_fetch_array($tampil);
    // jika gmbr diedit
    if ($tgambar != "") {
        $x = explode('.', $tgambar);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['tgambar']['tmp_name'];
        $angka_acak = rand(1, 100);
        $nama_gambar_baru = ($tkategori) . '-' . $angka_acak . '.' . end($x);

        move_uploaded_file($file_tmp, '../assets/img/' . $nama_gambar_baru);

        //persiapan ubah data termasuk gambar
        $ubah =  mysqli_query($koneksi, "UPDATE koleksi SET
                                                        nama = '$tnama',
                                                        kategori ='$tkategori',
                                                        deskripsi ='$tdeskripsi',
                                                        gambar ='$nama_gambar_baru'
                                                WHERE id_produk ='$_POST[id_produk]'
                                                        ");
        //  ubah data tanpa gambar
    } else {
        $ubah =  mysqli_query($koneksi, "UPDATE koleksi SET
                                                        nama = '$tnama',
                                                        kategori ='$tkategori',
                                                        deskripsi ='$tdeskripsi'                                                        
                                                WHERE id_produk ='$_POST[id_produk]'
                                                        ");
    }

    // jika ubah sukses
    if ($ubah) {
        echo "<script>
                alert('ubah data sukses!');
                document.location='koleksi.php';
                </script>";
    } else {
        echo "<script>
                alert('ubah data gagal!');
                document.location='koleksi.php';
                </script>";
    }
}


//uji jika tombol ubah diklik
if (isset($_POST['bhapus'])) {

    //persiapan ubah data baru
    $hapus =  mysqli_query($koneksi, "DELETE FROM koleksi WHERE id_produk = '$_POST[id_produk]'");



    // jika ubah sukses
    if ($hapus) {
        echo "<script>
                alert('hapus data sukses!');
                document.location='koleksi.php';
                </script>";
    } else {
        echo "<script>
                alert('hapus data gagal!');
                document.location='koleksi.php';
                </script>";
    }
}
