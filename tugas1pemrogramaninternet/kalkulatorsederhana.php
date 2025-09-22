<?php
$hasil = "";
$angka1 = "";
$angka2 = "";
$operator = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1   = $_POST['angka1'];
    $angka2   = $_POST['angka2'];
    $operator = $_POST['operator'];

    switch ($operator) {
        case "tambah":
            $hasil = $angka1 + $angka2;
            $opSimbol = "+";
            break;
        case "kurang":
            $hasil = $angka1 - $angka2;
            $opSimbol = "-";
            break;
        case "kali":
            $hasil = $angka1 * $angka2;
            $opSimbol = "×";
            break;
        case "bagi":
            if ($angka2 != 0) {
                $hasil = $angka1 / $angka2;
                $opSimbol = "÷";
            } else {
                $hasil = "Error: Pembagian dengan nol!";
                $opSimbol = "÷";
            }
            break;
        default:
            $hasil = "Operator tidak valid!";
            $opSimbol = "?";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalkulator Sederhana</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">

  <a href="index.php" class="absolute top-4 left-4 text-white font-semibold text-sm py-2 px-4 rounded-lg bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 transition-all duration-300 shadow-md">
    &#8592; Kembali
  </a>

  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
    <h2 class="text-center text-xl font-bold mb-6">Kalkulator Sederhana</h2>

    <form method="post" class="space-y-4">
      <div>
        <label for="angka1" class="block text-gray-700 font-medium mb-2">Angka 1:</label>
        <input 
          type="number" 
          name="angka1" 
          id="angka1" 
          value="<?= htmlspecialchars($angka1) ?>" 
          required 
          class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label for="angka2" class="block text-gray-700 font-medium mb-2">Angka 2:</label>
        <input 
          type="number" 
          name="angka2" 
          id="angka2" 
          value="<?= htmlspecialchars($angka2) ?>" 
          required 
          class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label for="operator" class="block text-gray-700 font-medium mb-2">Operator:</label>
        <select 
          name="operator" 
          id="operator" 
          class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
          <option value="tambah" <?= ($operator=="tambah") ? "selected" : "" ?>>Tambah (+)</option>
          <option value="kurang" <?= ($operator=="kurang") ? "selected" : "" ?>>Kurang (-)</option>
          <option value="kali" <?= ($operator=="kali") ? "selected" : "" ?>>Kali (×)</option>
          <option value="bagi" <?= ($operator=="bagi") ? "selected" : "" ?>>Bagi (÷)</option>
        </select>
      </div>

      <button 
        type="submit" 
        class="w-full py-3 bg-gradient-to-r from-blue-400 to-blue-600 text-white font-semibold rounded-lg hover:opacity-90 transition">
        Hitung
      </button>
    </form>

    <?php if ($hasil !== ""): ?>
      <div class="mt-6">
        <p class="w-full p-3 border border-gray-300 bg-white text-gray-700 text-center font-semibold rounded-lg">
          <?= is_numeric($hasil) ? "$angka1 $opSimbol $angka2 = $hasil" : $hasil ?>
        </p>
      </div>
    <?php endif; ?>

    <p class="mt-8 text-center text-sm text-gray-500">Anak Agung Gede Wisnu Mahadhiva - 2405551106</p>
  </div>

</body>
</html>
