<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Harga Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 font-sans">
    <a href="index.php" class="absolute top-4 left-4 text-white font-semibold text-sm py-2 px-4 rounded-lg bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 transition-all duration-300 shadow-md">
        &#8592; Kembali
    </a>

    <div class="min-h-screen flex items-center justify-center py-12 px-6">
        <div class="w-full max-w-4xl p-8 bg-white rounded-lg shadow-xl outline outline-2 outline-gray-300">
            <h3 class="text-3xl font-semibold text-center text-gray-800 mb-8">Daftar Harga Barang</h3>

            <?php 
            $barang = [
                "Buku Tulis" => 5000,
                "Pulpen" => 2000,
                "Penggaris" => 1500,
                "Penghapus" => 1000,
                "Pensil" => 3000,
                "Stapler" => 15000,
                "Lem" => 8000,
                "Kertas HVS" => 25000
            ]; 

            echo "<table class='min-w-full table-auto border-collapse text-sm'>";
            echo "<thead class='bg-gradient-to-r from-blue-400 to-blue-600 text-white'>
                    <tr>
                        <th class='px-6 py-3 text-left border-b w-2/3'>Nama Barang</th>
                        <th class='px-6 py-3 text-left border-b w-1/3'>Harga</th>
                    </tr>
                  </thead>";
            echo "<tbody>";
            
            foreach ($barang as $nama => $harga) {
                echo "<tr class='hover:bg-gray-100'>
                        <td class='px-6 py-3 border-b'>{$nama}</td>
                        <td class='px-6 py-3 border-b'>Rp. " . number_format($harga, 0, ',', '.') . "</td>
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
