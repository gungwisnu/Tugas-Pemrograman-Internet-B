<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 font-sans">
    <a href="index.php" class="absolute top-4 left-4 text-white font-semibold text-sm py-2 px-4 rounded-lg bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 transition-all duration-300 shadow-md">
        &#8592; Kembali
    </a>

    <div class="min-h-screen flex items-center justify-center py-12 px-6">
        <div class="w-full max-w-4xl p-8 bg-white rounded-lg shadow-xl outline outline-2 outline-gray-300">
            <h3 class="text-3xl font-semibold text-center text-gray-800 mb-8">Daftar Mahasiswa</h3>

            <?php 
            $mahasiswa = [
                "2405551001" => "Putu Eksat Swardinata Kusuma",
                "2405551002" => "Ni Luh Putu Devani Pramita Dewi",
                "2405551003" => "Kayla Emily",
                "2405551004" => "Kadek Egy Putra Sena",
                "2405551005" => "Komang Satria Bagas Bramantara",
                "2405551006" => "Putu Ayu Dinda Pramiswari",
                "2405551007" => "I Gusti Bagus Narendratanaya Wiweka",
                "2405551008" => "Putu Deva Rangga Arinegara",
                "2405551009" => "Ni Made Rita Mutiara Dewi",
                "2405551010" => "Ni Made Adelia Wirasanti"
            ]; 

            echo "<table class='min-w-full table-auto border-collapse text-sm'>";
            echo "<thead class='bg-gradient-to-r from-blue-400 to-blue-600 text-white'>
                    <tr>
                        <th class='px-6 py-3 text-left border-b w-1/6'>NIM</th>
                        <th class='px-6 py-3 text-left border-b w-2/3'>Nama</th>
                    </tr>
                  </thead>";
            echo "<tbody>";

            foreach ($mahasiswa as $nim => $nama) { 
                echo "<tr class='hover:bg-gray-100'>
                        <td class='px-6 py-3 border-b font-semibold text-gray-700'>$nim</td>
                        <td class='px-6 py-3 border-b'>$nama</td>
                    </tr>";
            }

            echo "</tbody>";
            echo "</table>";
            ?>
        </div>
    </div>
</body>

</html>
