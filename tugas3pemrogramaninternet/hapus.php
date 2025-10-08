<?php 
include "koneksi.php";

// Jika tombol konfirmasi ditekan
if (isset($_POST['konfirmasi'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
          <meta charset='UTF-8'>
          <title>Hapus Mahasiswa</title>
          <script src='https://cdn.tailwindcss.com'></script>
        </head>
        <body class='bg-gray-100 flex items-center justify-center min-h-screen'>
          <div class='bg-white shadow-lg rounded-xl p-8 text-center'>
            <p class='text-green-600 text-lg font-semibold mb-4'>Data berhasil dihapus!</p>
            <a href='index.php' class='bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition'>
              Kembali ke Daftar Mahasiswa
            </a>
          </div>
        </body>
        </html>";
    } else {
        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
          <meta charset='UTF-8'>
          <title>Hapus Mahasiswa</title>
          <script src='https://cdn.tailwindcss.com'></script>
        </head>
        <body class='bg-gray-100 flex items-center justify-center min-h-screen'>
          <div class='bg-white shadow-lg rounded-xl p-8 text-center'>
            <p class='text-red-600 text-lg font-semibold mb-4'>Terjadi kesalahan saat menghapus data!</p>
            <a href='index.php' class='bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition'>
              Kembali ke Daftar Mahasiswa
            </a>
          </div>
        </body>
        </html>";
    }
    $stmt->close();
    exit;
}

// Jika belum konfirmasi, tampilkan detail dulu
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if (!$data) {
        echo "<p>Data tidak ditemukan!</p>";
        exit;
    }
} else {
    echo "<p>ID tidak ditemukan!</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Konfirmasi Hapus Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-xl rounded-xl p-8 max-w-md w-full">
    <h2 class="text-xl font-bold text-center mb-4 text-red-600">Konfirmasi Hapus</h2>
    <p class="text-gray-700 mb-6 text-center">Yakin ingin menghapus data berikut?</p>

    <div class="mb-6">
      <table class="w-full text-left border border-gray-200 rounded-md">
        <tr><th class="p-2 bg-gray-50 border-b">ID</th><td class="p-2 border-b"><?= htmlspecialchars($data['id']) ?></td></tr>
        <tr><th class="p-2 bg-gray-50 border-b">NIM</th><td class="p-2 border-b"><?= htmlspecialchars($data['nim']) ?></td></tr>
        <tr><th class="p-2 bg-gray-50 border-b">Nama</th><td class="p-2 border-b"><?= htmlspecialchars($data['nama']) ?></td></tr>
        <tr><th class="p-2 bg-gray-50">Prodi</th><td class="p-2"><?= htmlspecialchars($data['prodi']) ?></td></tr>
      </table>
    </div>

    <form method="post" class="flex justify-center gap-4">
      <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
      <button type="submit" name="konfirmasi" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
        Yakin
      </button>
      <a href="index.php" class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-500 hover:to-blue-700 transition">
        Batal
      </a>
    </form>
    <p class="mt-8 text-center text-sm text-gray-500">Anak Agung Gede Wisnu Mahadhiva - 2405551106</p>
  </div>

</body>
</html>