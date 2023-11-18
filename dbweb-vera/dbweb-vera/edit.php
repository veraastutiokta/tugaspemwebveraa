<?php

require './config/db.php';

// ambil data di URL
$id = $_GET["id"];

// Cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])) {

    // Cek apakah data berhasil diubahkan atau tidak
    if (edit($_POST) > 0 ) {
        echo "
        <script>
            alert('data berhasil diubahkan');
            document.location.href = 'show.php';
        </script>";
    } else {
        echo "
        <script>
            alert('data gagal diubahkan');
            document.location.href = 'show.php';
        </script>
    ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <h1>Ubah Data Produk</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" ?>
        <input type="hidden" name="gambarLama" ?>
        <ul>
            <li>
                <label for="namaProduk">nama produk</label>
                <input type="text" name="namaProduk" id="namaProduk" required ?>
            </li>
            <li>
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" required ?>
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <img src="img/<?= $hp['gambar'];?>" alt="" width="40"><br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Submit!</button>
            </li>
        </ul>


    </form>
</body>
</html>