<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 font-sans">
    <!-- Tombol Kembali -->
    <a href="index.php" class="absolute top-4 left-4 text-white font-semibold text-sm py-2 px-4 rounded-lg bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 transition-all duration-300 shadow-md">
        &#8592; Kembali
    </a>

    <div class="min-h-screen flex items-center justify-center py-12 px-6">
        <div class="w-full max-w-lg p-6 bg-white rounded-lg shadow-xl outline outline-2 outline-gray-300">
            <h3 class="text-3xl font-semibold text-center text-gray-800 mb-6">Daftar Barang</h3>

            <?php 
            // Array barang
            $barang = [
                "Buku Tulis", 
                "Pulpen", 
                "Penggaris", 
                "Penghapus", 
                "Pensil", 
                "Stapler", 
                "Lem", 
                "Kertas HVS"
            ]; 

            // Menampilkan daftar barang dalam bentuk tabel tanpa header
            echo "<table class='min-w-full table-auto border-collapse text-sm'>";
            echo "<tbody>";

            // Perulangan untuk menampilkan tiap item dalam array
            foreach ($barang as $b) { 
                echo "<tr class='hover:bg-gray-100'>
                        <td class='px-6 py-3 border-b'>$b</td>
                    </tr>";
            }

            echo "</tbody>";
            echo "</table>";
            ?>
            <p class="mt-8 text-center text-sm text-gray-500">Anak Agung Gede Wisnu Mahadhiva - 2405551106</p>
        </div>
    </div>
</body>

</html>
