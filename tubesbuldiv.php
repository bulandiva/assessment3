<?php
header('Content-Type: application/json; charset=utf8');

// Allow cross-origin requests
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

$koneksi = mysqli_connect("localhost", "root", "", "barang");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM items";
    $query = mysqli_query($koneksi, $sql);
    $array_data = array();
    while ($data = mysqli_fetch_assoc($query)) {
        $array_data[] = $data;
    }
    echo json_encode($array_data);
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $sql = "INSERT INTO items (id,nama_barang,deskripsi) VALUES('$id','$nama_barang','$deskripsi')";
    $cek = mysqli_query($koneksi, $sql);

    if ($cek) {
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode($data);
    } else {
        $data = [
            'status' => "gagal"
        ];
        echo json_encode($data);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'];
    $sql = "DELETE FROM items WHERE id='$id'";
    $cek = mysqli_query($koneksi, $sql);

    if ($cek) {
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode($data);
    } else {
        $data = [
            'status' => "gagal"
        ];
        echo json_encode($data);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $id = $_PUT['id_update'];
    $new_id = $_PUT['new_id'];

    // Check if a new ID was provided and use it if available
    if (isset($_PUT['new_id']) && !empty($_PUT['new_id'])) {
        // Update the ID in the database
        $sql_update_id = "UPDATE items SET id='$new_id' WHERE id='$id'";
        $cek_update_id = mysqli_query($koneksi, $sql_update_id);

        // Update the ID variable if the update was successful
        if ($cek_update_id) {
            $id = $new_id;
        }
    }

    $nama_barang = $_PUT['nama_barang_update'];
    $deskripsi = $_PUT['deskripsi_update'];

    $sql = "UPDATE items SET nama_barang='$nama_barang', deskripsi='$deskripsi' WHERE id='$id'";
    $cek = mysqli_query($koneksi, $sql);

    if ($cek) {
        $data = [
            'status' => "berhasil"
        ];
        echo json_encode($data);
    } else {
        $data = [
            'status' => "gagal"
        ];
        echo json_encode($data);
    }
}
?>
