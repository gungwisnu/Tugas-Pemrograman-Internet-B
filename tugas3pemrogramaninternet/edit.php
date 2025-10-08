<?php 
include "koneksi.php"; // Menghubungkan ke database
?>

<?php
$id = $_GET['id'];  // Mengambil ID dari URL
$result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <div class="container mx-auto py-6">
    <h1 class="text-3xl font-semibold text-center mb-6">Edit Mahasiswa</h1>

    <form method="post" class="bg-white p-6 rounded-lg shadow-lg space-y-4">
      <div>
        <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
        <input type="text" name="nim" id="nim" value="<?= $data['nim'] ?>" class="w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
      </div>

      <div>
        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>" class="w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
      </div>

      <div>
        <label for="prodi" class="block text-sm font-medium text-gray-700">Prodi</label>
        <input type="text" name="prodi" id="prodi" value="<?= $data['prodi'] ?>" class="w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
      </div>

      <button type="submit" name="update" class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-4 py-2 rounded-lg">
        Update
      </button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];

        $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', prodi='$prodi' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php"); // langsung kembali ke daftar
            exit();
        } else {
            echo "<p class='mt-4 text-red-600'>Error: " . $conn->error . "</p>";
        }
    }
    ?>
  </div>
  <p class="mt-8 text-center text-sm text-gray-500">Anak Agung Gede Wisnu Mahadhiva - 2405551106</p>

</body>
</html>
