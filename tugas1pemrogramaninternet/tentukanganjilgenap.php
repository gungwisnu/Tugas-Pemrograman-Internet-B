<?php
$hasil = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka = $_POST['angka'];

    $lastDigit = substr($angka, -1);

    if ($lastDigit % 2 == 0) {
        $hasil = "$angka merupakan bilangan <b>Genap</b>.";
    } else {
        $hasil = "$angka merupakan bilangan <b>Ganjil</b>.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cek Bilangan Ganjil/Genap</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">

  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
    <h2 class="text-center text-xl font-bold mb-6">Cek Bilangan Ganjil/Genap</h2>

    <form method="post" class="space-y-4">
      <div>
        <label for="angka" class="block text-gray-700 font-medium mb-2">Masukkan Angka:</label>
        <input 
          type="number" 
          name="angka" 
          id="angka" 
          value="<?= isset($_POST['angka']) ? htmlspecialchars($_POST['angka']) : '' ?>" 
          required
          inputmode="numeric"
          pattern="[0-9]*"
          onkeydown="return event.keyCode !== 69 && event.keyCode !== 189 && event.keyCode !== 190 && event.keyCode !== 107 && event.keyCode !== 109;"
          class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
          placeholder="Contoh: 12345">
      </div>

      <button 
        type="submit" 
        class="w-full py-3 bg-gradient-to-r from-blue-400 to-blue-600 text-white font-semibold rounded-lg hover:opacity-90 transition">
        Cek
      </button>
    </form>

    <?php if ($hasil !== ""): ?>
      <div class="mt-6">
        <p class="w-full p-3 border border-gray-300 bg-white text-gray-700 text-center font-medium rounded-lg">
          <?= $hasil ?>
        </p>
      </div>
    <?php endif; ?>
  </div>

</body>
</html>
