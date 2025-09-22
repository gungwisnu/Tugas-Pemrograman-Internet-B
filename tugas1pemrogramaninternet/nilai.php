<?php
$hasil = "";
$kelasWarna = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai = $_POST['nilai'];

    if ($nilai >= 85) {
        $hasil = "Grade: A";
        $kelasWarna = "from-blue-400 to-blue-600";
    } elseif ($nilai >= 70) {
        $hasil = "Grade: B";
        $kelasWarna = "from-green-400 to-green-600";
    } elseif ($nilai >= 55) {
        $hasil = "Grade: C";
        $kelasWarna = "from-yellow-300 to-yellow-500";
    } elseif ($nilai >= 40) {
        $hasil = "Grade: D";
        $kelasWarna = "from-orange-400 to-orange-600";
    } else {
        $hasil = "Grade: E";
        $kelasWarna = "from-red-400 to-red-600";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menentukan Nilai dengan Huruf</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <a href="index.php" class="absolute top-4 left-4 text-white font-semibold text-sm py-2 px-4 rounded-lg bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 transition-all duration-300 shadow-md">
        &#8592; Kembali
    </a>

    <div class="bg-white p-6 rounded-xl shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4 text-center">Menentukan Nilai dengan Huruf</h2>
        
        <form method="post" class="space-y-4">
            <div>
                <label class="block mb-1">Masukkan Nilai (0–100):</label>
                <input type="number" name="nilai" min="0" max="100" 
                       value="<?= isset($_POST['nilai']) ? $_POST['nilai'] : '' ?>" 
                       required
                       class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <button type="submit" 
                    class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition">
                Cek Grade
            </button>
        </form>

        <?php if ($hasil !== ""): ?>
            <div class="mt-6 p-4 rounded-md text-center text-white font-bold text-lg bg-gradient-to-r <?= $kelasWarna ?>">
                <?= $hasil ?>
            </div>
        <?php endif; ?>

        <p class="mt-8 text-center text-sm text-gray-500">Anak Agung Gede Wisnu Mahadhiva - 2405551106</p>
    </div>
</body>
</html>
