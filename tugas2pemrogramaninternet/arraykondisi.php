<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa dengan Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 font-sans">
    <!-- Tombol Kembali -->
    <a href="index.php" class="absolute top-4 left-4 text-white font-semibold text-sm py-2 px-4 rounded-lg bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 transition-all duration-300 shadow-md">
        &#8592; Kembali
    </a>

    <div class="min-h-screen flex items-center justify-center py-12 px-6">
        <div class="w-full max-w-6xl p-8 bg-white rounded-lg shadow-xl outline outline-2 outline-gray-300">
            <h3 class="text-3xl font-semibold text-center text-gray-800 mb-8">Data Mahasiswa dengan Nilai</h3>

            <?php 
            // Array multidimensi berisi data mahasiswa dengan nilai
            $mahasiswa = [
                ["nim" => "2405551001", "nama" => "Putu Eksat Swardinata Kusuma", "umur" => 19, "prodi" => "Teknologi Informasi", "nilai" => 80],
                ["nim" => "2405551002", "nama" => "Ni Luh Putu Devani Pramita Dewi", "umur" => 20, "prodi" => "Teknologi Informasi", "nilai" => 65],
                ["nim" => "2405551003", "nama" => "Kayla Emily", "umur" => 19, "prodi" => "Teknologi Informasi", "nilai" => 90],
                ["nim" => "2405551004", "nama" => "Kadek Egy Putra Sena", "umur" => 20, "prodi" => "Teknologi Informasi", "nilai" => 55],
                ["nim" => "2405551005", "nama" => "Komang Satria Bagas Bramantara", "umur" => 19, "prodi" => "Teknologi Informasi", "nilai" => 70],
                ["nim" => "2405551006", "nama" => "Putu Ayu Dinda Pramiswari", "umur" => 20, "prodi" => "Teknologi Informasi", "nilai" => 85],
                ["nim" => "2405551007", "nama" => "I Gusti Bagus Narendratanaya Wiweka", "umur" => 19, "prodi" => "Teknologi Informasi", "nilai" => 50],
                ["nim" => "2405551008", "nama" => "Putu Deva Rangga Arinegara", "umur" => 20, "prodi" => "Teknologi Informasi", "nilai" => 60],
                ["nim" => "2405551009", "nama" => "Ni Made Rita Mutiara Dewi", "umur" => 19, "prodi" => "Teknologi Informasi", "nilai" => 95],
                ["nim" => "2405551010", "nama" => "Ni Made Adelia Wirasanti", "umur" => 20, "prodi" => "Teknologi Informasi", "nilai" => 75]
            ];

            // Menampilkan data mahasiswa dalam bentuk tabel HTML
            echo "<table class='min-w-full table-auto border-collapse text-sm'>";
            echo "<thead class='bg-gradient-to-r from-blue-400 to-blue-600 text-white'>
                    <tr>
                        <th class='px-6 py-3 text-center border-b w-1/6'>NIM</th>
                        <th class='px-6 py-3 text-center border-b w-2/5'>Nama</th>
                        <th class='px-6 py-3 text-center border-b w-1/6'>Umur</th>
                        <th class='px-6 py-3 text-center border-b w-1/3'>Program Studi</th>
                        <th class='px-6 py-3 text-center border-b w-1/6'>Nilai</th>
                        <th class='px-6 py-3 text-center border-b w-1/6'>Status</th>
                    </tr>
                  </thead>";
            echo "<tbody>";

            // Perulangan untuk menampilkan data mahasiswa
            foreach ($mahasiswa as $mhs) {
                // Menentukan status kelulusan
                $status = ($mhs['nilai'] >= 70) ? 'Lulus' : 'Tidak Lulus';
                // Menentukan warna berdasarkan status
                $statusColor = ($mhs['nilai'] >= 70) ? 'bg-green-200' : 'bg-red-200';

                echo "<tr class='hover:bg-gray-100'>
                        <td class='px-6 py-3 border-b text-center'>{$mhs['nim']}</td>
                        <td class='px-6 py-3 border-b text-center'>{$mhs['nama']}</td>
                        <td class='px-6 py-3 border-b text-center'>{$mhs['umur']}</td>
                        <td class='px-6 py-3 border-b text-center'>{$mhs['prodi']}</td>
                        <td class='px-6 py-3 border-b text-center'>{$mhs['nilai']}</td>
                        <td class='px-6 py-3 border-b text-center {$statusColor}'>{$status}</td>
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
