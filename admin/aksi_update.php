<?php

include "koneksi.php";

//uji jika tombol ubah diklik
if (isset($_POST['bubah'])) {

    // //persiapan ubah data baru
    // $ubah = mysqli_query($koneksi, "UPDATE artikel SET
    // judul = '$_POST[tjudul]',
    // deskripsi ='$_POST[tdeskripsi]',
    // gambar ='$_POST[tgambar]'
    // WHERE id_artikel ='$_POST[id_artikel]'
    // ");

    $tjudul = $_POST['tjudul'];
    $tdeskripsi = $_POST['tdeskripsi'];
    $tgambar = $_FILES['tgambar']['name'];

    $x = explode('.', $tgambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['tgambar']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = 'artkl-' . round(microtime(true)) . '.' . end($x);

    move_uploaded_file($file_tmp, '../assets/img/' . $nama_gambar_baru);

    $ubah = mysqli_query($koneksi, "UPDATE artikel SET
judul = '$tjudul',
deskripsi = '$tdeskripsi',
gambar = '$nama_gambar_baru'
WHERE id_artikel = '$_POST[id_artikel]'
");



    // jika ubah sukses
    if ($ubah) {
        echo "<script>
    alert('ubah data sukses!');
    document.location = 'artikel.php';
</script>";
    } else {
        echo "<script>
    alert('ubah data gagal!');
    document.location = 'artikel.php';
</script>";
    }
}
