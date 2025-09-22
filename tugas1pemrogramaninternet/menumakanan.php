<?php
$hasilMenu = "";
$hasilHarga = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menu = $_POST['menu'];

    switch ($menu) {
        case "Lawar Ayam":
            $hasilMenu = "Lawar Ayam";
            $hasilHarga = "Rp15.000";
            break;
        case "Lawar Babi":
            $hasilMenu = "Lawar Babi";
            $hasilHarga = "Rp18.000";
            break;
        case "Lawar Plek (Ganas)":
            $hasilMenu = "Lawar Plek (Ganas)";
            $hasilHarga = "Rp20.000";
            break;
        case "Nasi Babi Guling":
            $hasilMenu = "Nasi Babi Guling";
            $hasilHarga = "Rp25.000";
            break;
        case "Ayam Betutu":
            $hasilMenu = "Ayam Betutu";
            $hasilHarga = "Rp30.000";
            break;
        case "Sate Lilit":
            $hasilMenu = "Sate Lilit";
            $hasilHarga = "Rp20.000";
            break;
        case "Tipat Cantok":
            $hasilMenu = "Tipat Cantok";
            $hasilHarga = "Rp12.000";
            break;
        case "Serombotan":
            $hasilMenu = "Serombotan";
            $hasilHarga = "Rp10.000";
            break;
        case "Nasi Campur Bali":
            $hasilMenu = "Nasi Campur Bali";
            $hasilHarga = "Rp22.000";
            break;
        case "Tum Ayam":
            $hasilMenu = "Tum Ayam";
            $hasilHarga = "Rp8.000";
            break;
        default:
            $hasilMenu = "Menu tidak tersedia";
            $hasilHarga = "-";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Makanan Warung Nasi Pak Agung</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">

  <a href="index.php" class="absolute top-4 left-4 text-white font-semibold text-sm py-2 px-4 rounded-lg bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 transition-all duration-300 shadow-md">
    &#8592; Kembali
  </a>

  <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
    <h2 class="text-center text-xl font-bold mb-6">Menu Makanan Warung Nasi Pak Agung</h2>

    <form method="post" class="space-y-4">
      <div>
        <label for="menu" class="block text-gray-700 font-medium mb-2">Pilih Menu:</label>
        <select 
          name="menu" 
          id="menu" 
          required
          class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
        >
          <option value="">-- Pilih --</option>
          <option value="Lawar Ayam" <?= (isset($_POST['menu']) && $_POST['menu']=="Lawar Ayam") ? "selected" : "" ?>>Lawar Ayam</option>
          <option value="Lawar Babi" <?= (isset($_POST['menu']) && $_POST['menu']=="Lawar Babi") ? "selected" : "" ?>>Lawar Babi</option>
          <option value="Lawar Plek (Ganas)" <?= (isset($_POST['menu']) && $_POST['menu']=="Lawar Plek (Ganas)") ? "selected" : "" ?>>Lawar Plek (Ganas)</option>
          <option value="Nasi Babi Guling" <?= (isset($_POST['menu']) && $_POST['menu']=="Nasi Babi Guling") ? "selected" : "" ?>>Nasi Babi Guling</option>
          <option value="Ayam Betutu" <?= (isset($_POST['menu']) && $_POST['menu']=="Ayam Betutu") ? "selected" : "" ?>>Ayam Betutu</option>
          <option value="Sate Lilit" <?= (isset($_POST['menu']) && $_POST['menu']=="Sate Lilit") ? "selected" : "" ?>>Sate Lilit</option>
          <option value="Tipat Cantok" <?= (isset($_POST['menu']) && $_POST['menu']=="Tipat Cantok") ? "selected" : "" ?>>Tipat Cantok</option>
          <option value="Serombotan" <?= (isset($_POST['menu']) && $_POST['menu']=="Serombotan") ? "selected" : "" ?>>Serombotan</option>
          <option value="Nasi Campur Bali" <?= (isset($_POST['menu']) && $_POST['menu']=="Nasi Campur Bali") ? "selected" : "" ?>>Nasi Campur Bali</option>
          <option value="Tum Ayam" <?= (isset($_POST['menu']) && $_POST['menu']=="Tum Ayam") ? "selected" : "" ?>>Tum Ayam</option>
        </select>
      </div>

      <button 
        type="submit" 
        class="w-full py-3 bg-gradient-to-r from-blue-400 to-blue-600 text-white font-semibold rounded-lg hover:opacity-90 transition">
        Cek Harga
      </button>
    </form>

    <?php if ($hasilMenu !== ""): ?>
      <div class="mt-6 p-4 border border-gray-300 rounded-lg text-center bg-gray-50">
        <p class="text-lg font-bold text-gray-800"><?= $hasilMenu ?></p>
        <p class="text-md text-gray-700 mt-2"><?= $hasilHarga ?></p>
      </div>
    <?php endif; ?>

    <p class="mt-8 text-center text-sm text-gray-500">Anak Agung Gede Wisnu Mahadhiva - 2405551106</p>
  </div>

</body>
</html>
