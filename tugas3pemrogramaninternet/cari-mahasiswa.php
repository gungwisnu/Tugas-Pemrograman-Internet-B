<?php
include "koneksi.php";

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
$keyword = "%$keyword%"; // biar bisa LIKE di SQL

$stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE nama LIKE ? OR nim LIKE ?");
$stmt->bind_param("ss", $keyword, $keyword);
$stmt->execute();

$result = $stmt->get_result();
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);

$stmt->close();
$conn->close();
?>