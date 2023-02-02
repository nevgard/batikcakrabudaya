<?php
//Artikel aksi

//panggil koneksi database
include "koneksi.php";

//uji jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {
    $tjudul = $_POST['tjudul'];
    $tdeskripsi = $_POST['tdeskripsi'];
    $tgambar = $_FILES['tgambar']['name'];
    if ($tgambar != "") {
        $x = explode('.', $tgambar);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['tgambar']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = 'artkl-' . round(microtime(true)) . '.' . end($x);

        move_uploaded_file($file_tmp, '../assets/img/' . $nama_gambar_baru);

        $simpan =  mysqli_query($koneksi, "INSERT INTO artikel (judul, deskripsi, gambar) VALUES ('$tjudul', '$tdeskripsi', '$nama_gambar_baru')");
    } else {
        $simpan =  mysqli_query($koneksi, "INSERT INTO artikel (judul, deskripsi) VALUES ('$tjudul', '$tdeskripsi')");
    }

    // jika simpan sukses
    if ($simpan) {
        echo "<script>
                alert('simpan data sukses!');
                document.location='artikel.php';
                </script>";
    } else {
        echo "<script>
                alert('simpan data gagal!');
                document.location='artikel.php';
                </script>";
    }
}

//uji jika tombol ubah diklik
if (isset($_POST['bubah'])) {

    $tjudul = $_POST['tjudul'];
    $tdeskripsi = $_POST['tdeskripsi'];
    $tgambar = $_FILES['tgambar']['name'];
    // jika gambar diedit
    if ($tgambar != "") {
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
    } else {
        $ubah = mysqli_query($koneksi, "UPDATE artikel SET
                                                    judul = '$tjudul',
                                                    deskripsi = '$tdeskripsi'
                                                    WHERE id_artikel = '$_POST[id_artikel]'
                                                    ");
    }


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

//uji jika tombol ubah diklik
if (isset($_POST['bhapus'])) {

    //persiapan ubah data baru
    $hapus =  mysqli_query($koneksi, "DELETE FROM artikel WHERE id_artikel = '$_POST[id_artikel]'");



    // jika ubah sukses
    if ($hapus) {
        echo "<script>
                alert('hapus data sukses!');
                document.location='artikel.php';
                </script>";
    } else {
        echo "<script>
                alert('hapus data gagal!');
                document.location='artikel.php';
                </script>";
    }
}

// koleksi aksi
