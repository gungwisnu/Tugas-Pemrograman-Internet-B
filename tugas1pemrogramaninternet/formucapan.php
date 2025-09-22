<?php
$hasil = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $hasil = "Halo, $nama selamat belajar PHP!";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Ucapan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">

  <a href="index.php" class="absolute top-4 left-4 text-white font-semibold text-sm py-2 px-4 rounded-lg bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 transition-all duration-300 shadow-md">
    &#8592; Kembali
  </a>

  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
    <h2 class="text-center text-xl font-bold mb-6">Form Ucapan</h2>

    <form method="post" class="space-y-4">
      <div>
        <label for="nama" class="block text-gray-700 font-medium mb-2">Masukkan Nama:</label>
        <input 
          type="text" 
          name="nama" 
          id="nama" 
          value="<?= isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '' ?>" 
          required 
          class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
          placeholder="Nama Anda">
      </div>

      <button 
        type="submit" 
        class="w-full py-3 bg-gradient-to-r from-blue-400 to-blue-600 text-white font-semibold rounded-lg hover:opacity-90 transition">
        Kirim
      </button>
    </form>

    <?php if ($hasil !== ""): ?>
      <div class="mt-6">
        <p class="w-full p-3 border border-gray-300 bg-white text-gray-700 text-center font-semibold rounded-lg">
          <?= $hasil ?>
        </p>
      </div>
    <?php endif; ?>

    <p class="mt-8 text-center text-sm text-gray-500">Anak Agung Gede Wisnu Mahadhiva - 2405551106</p>
  </div>

</body>
</html>
