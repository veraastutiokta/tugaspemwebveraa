<?php

$DBHOST = 'localhost';
$DBUSER = 'root';
$DBPASSWORD = '';
$DBNAME = 'pemweb-db';


$db_connect = mysqli_connect($DBHOST,$DBUSER,$DBPASSWORD,$DBNAME);

if(mysqli_connect_errno()){
    echo "failed connect to mysql ".mysqli_connect_error(); 
}

function delete($id) {
    global $db_connect;
    mysqli_query($db_connect, "DELETE FROM products WHERE id = $id");
    return mysqli_affected_rows($db_connect);
}

function edit($data) {
    global $db_connect;

    $id = $data["id"];
    $namaProduk = htmlspecialchars($data["namaProduk"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambar = htmlspecialchars($data["gambar"]);
    $gambarLama = ($data["gambarLama"]);

    if($_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    }

    $query = "UPDATE products SET 
                namaProduk = '$namaProduk',
                harga = '$harga',
                gambar = '$gambar'
                WHERE id = $id;

    ";
    mysqli_query($db_connect, $query);

    return mysqli_affected_rows($db_connect);
}

