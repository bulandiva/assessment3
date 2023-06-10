<?php
header('Content-Type: application/json; charset=utf8');

// Allow cross-origin requests
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

$koneksi = mysqli_connect("localhost","root","","barang");

if($_SERVER['REQUEST_METHOD'] === 'GET') { //MENGAMBIL SEMUA DATA DI DATABES DAN DIJADIKAN JSON
    $sql = "SELECT* FROM items";
    $query = mysqli_query($koneksi , $sql);
    $array_data = array();
    while($data = mysqli_fetch_assoc($query)){
        $array_data[] = $data;
    }
    echo json_encode($array_data);
}else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $sql = "INSERT INTO items (id,nama_barang,deskripsi) VALUES('$id','$nama_barang','$deskripsi')";
    $cek = mysqli_query($koneksi, $sql);

    if($cek){
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    }else{
        $data = [
            'status' => "gagal"
        ];
        echo json_encode([$data]);
    }
}else if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    $id = $_GET['id'];
    $sql = "DELETE FROM barang WHERE id='$id'";
    $cek = mysqli_query($koneksi, $sql);

    if($cek){
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    }else{
        $data = [
            'status' => "gagal"
        ];
        echo json_encode([$data]);
    }
}else if($_SERVER['REQUEST_METHOD'] === 'PUT'){
    $id = $_GET['id'];
    $nama_barang = $_GET['nama_barang'];
    $deskripsi = $GET['deskripsi'];;

    $sql = "UPDATE items SET id='$id', nama_barang='$nama_barang', deskripsi='$deskripsi' WHERE id='$id'";
    $cek = mysqli_query($koneksi,$sql);

    if($cek){
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode([$data]);
    }else{
        $data = [
            'status' => "gagal"
        ];
        echo json_encode([$data]);
    }
}