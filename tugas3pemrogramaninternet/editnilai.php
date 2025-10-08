<?php
include "koneksi.php";

$id = $_GET['id'];
$mahasiswa_id = $_GET['mahasiswa_id'];

$result = $conn->query("SELECT * FROM nilai WHERE id=$id");
$data = $result->fetch_assoc();

function konversi_huruf($angka) {
  if ($angka >= 4.00) return 'A';
  if ($angka >= 3.00) return 'B';
  if ($angka >= 2.00) return 'C';
  if ($angka >= 1.00) return 'D';
  return 'E';
}

if (isset($_POST['update'])) {
  $mata_kuliah = $_POST['mata_kuliah'];
  $sks = $_POST['sks'];
  $nilai_angka = $_POST['nilai_angka'];
  $nilai_huruf = konversi_huruf($nilai_angka);

  $sql = "UPDATE nilai SET mata_kuliah='$mata_kuliah', sks='$sks', nilai_angka='$nilai_angka', nilai_huruf='$nilai_huruf' WHERE id=$id";
  if ($conn->query($sql) === TRUE) {
    header("Location: nilai_mahasiswa.php?id=$mahasiswa_id");
    exit;
  } else {
    echo "Error: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Nilai Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="container mx-auto py-6">
  <h1 class="text-3xl font-semibold text-center mb-6">Edit Nilai Mahasiswa</h1>

  <form method="post" class="bg-white p-6 rounded-lg shadow-lg space-y-4 max-w-xl mx-auto">
    <div>
      <label class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
      <input type="text" name="mata_kuliah" value="<?= $data['mata_kuliah'] ?>" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">SKS</label>
      <input type="number" name="sks" value="<?= $data['sks'] ?>" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Nilai (IPK)</label>
      <input type="number" step="0.01" name="nilai_angka" id="nilai_angka" value="<?= $data['nilai_angka'] ?>" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Nilai Huruf</label>
      <input type="text" name="nilai_huruf" id="nilai_huruf" value="<?= $data['nilai_huruf'] ?>" readonly class="w-full px-4 py-2 border rounded-md bg-gray-100">
    </div>
    <button type="submit" name="update" class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-4 py-2 rounded-lg">Update</button>
  </form>
</div>
<p class="mt-8 text-center text-sm text-gray-500">Anak Agung Gede Wisnu Mahadhiva - 2405551106</p>

<script>
document.getElementById("nilai_angka").addEventListener("input", function() {
  const angka = parseFloat(this.value);
  let huruf = "E";
  if (angka >= 4.00) huruf = "A";
  else if (angka >= 3.00) huruf = "B";
  else if (angka >= 2.00) huruf = "C";
  else if (angka >= 1.00) huruf = "D";
  else huruf = "E";
  document.getElementById("nilai_huruf").value = huruf;
});
</script>

</body>
</html>
