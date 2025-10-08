<?php
include "koneksi.php";

$id_mahasiswa = isset($_GET['id']) ? $_GET['id'] : null;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Nilai Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="container mx-auto py-8">
  <h1 class="text-3xl font-bold text-center mb-6">
    <?php
    if ($id_mahasiswa) {
      $mhs = $conn->query("SELECT nama FROM mahasiswa WHERE id='$id_mahasiswa'")->fetch_assoc();
      echo "Nilai Mahasiswa: " . htmlspecialchars($mhs['nama']);
    } else {
      echo "Daftar Nilai Semua Mahasiswa";
    }
    ?>
  </h1>

  <div class="flex justify-between mb-4">
    <a href="index.php" class="bg-gradient-to-r from-red-400 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-500 hover:to-red-700 transition">
      Kembali
    </a>

    <?php if ($id_mahasiswa): ?>
    <a href="tambah_nilaimahasiswa.php?id=<?= $id_mahasiswa ?>" class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-500 hover:to-blue-700 transition">
      Tambah Nilai
    </a>
    <?php endif; ?>
  </div>

  <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
    <thead class="bg-gradient-to-r from-blue-400 to-blue-600 text-white">
      <tr>
        <th class="py-3 px-6 text-left">ID</th>
        <th class="py-3 px-6 text-left">Mata Kuliah</th>
        <th class="py-3 px-6 text-left">SKS</th>
        <th class="py-3 px-6 text-left">Nilai Huruf</th>
        <th class="py-3 px-6 text-left">Nilai IPK</th>
        <th class="py-3 px-6 text-left">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = $id_mahasiswa
        ? "SELECT * FROM nilai WHERE mahasiswa_id='$id_mahasiswa'"
        : "SELECT n.*, m.nama AS nama_mahasiswa FROM nilai n INNER JOIN mahasiswa m ON n.mahasiswa_id = m.id";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr class='border-b hover:bg-gray-50 transition'>
                  <td class='py-3 px-6'>{$row['id']}</td>
                  <td class='py-3 px-6'>{$row['mata_kuliah']}</td>
                  <td class='py-3 px-6'>{$row['sks']}</td>
                  <td class='py-3 px-6 font-semibold text-gray-700'>{$row['nilai_huruf']}</td>
                  <td class='py-3 px-6'>{$row['nilai_angka']}</td>
                  <td class='py-3 px-6'>
                    <a href='editnilai.php?id={$row['id']}&mahasiswa_id={$row['mahasiswa_id']}' class='text-blue-500 hover:text-blue-700 transition'>Edit</a> | 
                    <a href='hapusnilai.php?id={$row['id']}&mahasiswa_id={$row['mahasiswa_id']}' class='text-red-500 hover:text-red-700 transition'>Hapus</a>
                  </td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='6' class='text-center py-4 text-gray-500'>Belum ada data nilai.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
<p class="mt-8 text-center text-sm text-gray-500">Anak Agung Gede Wisnu Mahadhiva - 2405551106</p>

</body>
</html>
