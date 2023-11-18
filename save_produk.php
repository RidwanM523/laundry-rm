<?php
header('Content-Type: application/json');

// Assuming you have a MySQL database named 'toko_online'
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toko_online";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die(json_encode(['status' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Handle form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $deskripsi = $_POST['deskripsi'];

  // Insert data into 'produk' table
  $sql = "INSERT INTO produk (id, nama, harga, deskripsi) VALUES ('$id', '$nama', '$harga', '$deskripsi')";

  if ($conn->query($sql) === TRUE) {
    echo json_encode(['status' => true, 'message' => 'Data berhasil disimpan']);
  } else {
    echo json_encode(['status' => false, 'message' => 'Error: ' . $sql . '<br>' . $conn->error]);
  }
} else {
  echo json_encode(['status' => false, 'message' => 'Invalid request method']);
}

$conn->close();
