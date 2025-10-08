<?php 
include "koneksi.php";

// ambil id nilai dan id mahasiswa
$id = isset($_GET['id']) ? $_GET['id'] : null;
$mahasiswa_id = isset($_GET['mahasiswa_id']) ? $_GET['mahasiswa_id'] : null;

// kalau ga ada id, stop
if (!$id) {
    echo "<p>ID nilai tidak ditemukan!</p>";
    exit;
}

// ambil data nilai buat ditampilkan
$stmt = $conn->prepare("SELECT n.*, m.nama AS nama_mahasiswa 
                        FROM nilai n 
                        INNER JOIN mahasiswa m ON n.mahasiswa_id = m.id
                        WHERE n.id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "<p>Data nilai tidak ditemukan!</p>";
    exit;
}

// kalau dikonfirmasi hapus
if (isset($_POST['konfirmasi'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM nilai WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
          <meta charset='UTF-8'>
          <title>Nilai Dihapus</title>
          <script src='https://cdn.tailwindcss.com'></script>
          <meta http-equiv='refresh' content='2;url=nilai_mahasiswa.php?id={$data['mahasiswa_id']}'>
        </head>
        <body class='bg-gray-100 flex items-center justify-center min-h-screen'>
          <div class='bg-white shadow-lg rounded-xl p-8 text-center'>
            <p class='text-green-600 text-lg font-semibold mb-4'>✅ Nilai berhasil dihapus!</p>
            <a href='nilai_mahasiswa.php?id={$data['mahasiswa_id']}' class='bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition'>
              Kembali ke Daftar Nilai
            </a>
          </div>
        </body>
        </html>";
    } else {
        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
          <meta charset='UTF-8'>
          <title>Gagal Hapus Nilai</title>
          <script src='https://cdn.tailwindcss.com'></script>
        </head>
        <body class='bg-gray-100 flex items-center justify-center min-h-screen'>
          <div class='bg-white shadow-lg rounded-xl p-8 text-center'>
            <p class='text-red-600 text-lg font-semibold mb-4'>❌ Terjadi kesalahan saat menghapus nilai!</p>
            <a href='nilai_mahasiswa.php?id={$data['mahasiswa_id']}' class='bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition'>
              Kembali ke Daftar Nilai
            </a>
          </div>
        </body>
        </html>";
    }
    $stmt->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Konfirmasi Hapus Nilai</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-xl rounded-xl p-8 max-w-md w-full">
    <h2 class="text-xl font-bold text-center mb-4 text-red-600">Konfirmasi Hapus Nilai</h2>
    <p class="text-gray-700 mb-6 text-center">Apakah Anda yakin ingin menghapus nilai berikut?</p>

    <div class="mb-6">
      <table class="w-full text-left border border-gray-200 rounded-md">
        <tr><th class="p-2 bg-gray-50 border-b">Nama Mahasiswa</th><td class="p-2 border-b"><?= htmlspecialchars($data['nama_mahasiswa']) ?></td></tr>
        <tr><th class="p-2 bg-gray-50 border-b">Mata Kuliah</th><td class="p-2 border-b"><?= htmlspecialchars($data['mata_kuliah']) ?></td></tr>
        <tr><th class="p-2 bg-gray-50 border-b">SKS</th><td class="p-2 border-b"><?= htmlspecialchars($data['sks']) ?></td></tr>
        <tr><th class="p-2 bg-gray-50 border-b">Nilai Huruf</th><td class="p-2 border-b"><?= htmlspecialchars($data['nilai_huruf']) ?></td></tr>
        <tr><th class="p-2 bg-gray-50">Nilai IPK</th><td class="p-2"><?= htmlspecialchars($data['nilai_angka']) ?></td></tr>
      </table>
    </div>

    <form method="post" class="flex justify-center gap-4">
      <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
      <button type="submit" name="konfirmasi" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
        Yakin Hapus
      </button>
      <a href="nilai_mahasiswa.php?id=<?= htmlspecialchars($data['mahasiswa_id']) ?>" class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-500 hover:to-blue-700 transition">
        Batal
      </a>
    </form>
    <p class="mt-8 text-center text-sm text-gray-500">Anak Agung Gede Wisnu Mahadhiva - 2405551106</p>
  </div>

</body>
</html>
