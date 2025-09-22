<?php
$hasil = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama   = $_POST['nama'];
    $umur   = $_POST['umur'];
    $jk     = $_POST['jk'];
    $alamat = $_POST['alamat'];

    $hasil = "Halo, perkenalkan nama saya <b>$nama</b>. 
    Saat ini saya sedang menginjak umur <b>$umur tahun</b>. 
    Saya merupakan seorang anak <b>$jk</b>. 
    Saat ini saya sedang tinggal di <b>$alamat</b>.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Biodata Singkat</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">

  <a href="index.php" class="absolute top-4 left-4 text-white font-semibold text-sm py-2 px-4 rounded-lg bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 transition-all duration-300 shadow-md">
    &#8592; Kembali
  </a>

  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
    <h2 class="text-center text-xl font-bold mb-6">Form Biodata Singkat</h2>

    <form method="post" class="space-y-4">
      <div>
        <label class="block font-medium mb-1">Nama:</label>
        <input type="text" name="nama" required 
          class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block font-medium mb-1">Umur:</label>
        <input type="number" name="umur" required 
          class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block font-medium mb-1">Jenis Kelamin:</label>
        <select name="jk" required 
          class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
          <option value="">-- Pilih --</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>

      <div>
        <label class="block font-medium mb-1">Alamat:</label>
        <input type="text" name="alamat" required 
          class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
      </div>

      <button type="submit" 
        class="w-full py-3 bg-blue-500 text-white rounded-lg font-semibold hover:bg-blue-600 transition">
        Kirim
      </button>
    </form>

    <?php if ($hasil !== ""): ?>
      <div class="mt-6 p-4 border rounded-lg bg-gray-50 text-gray-700">
        <?= $hasil ?>
      </div>
    <?php endif; ?>

    <p class="mt-8 text-center text-sm text-gray-500">Anak Agung Gede Wisnu Mahadhiva - 2405551106</p>
  </div>

</body>
</html>
