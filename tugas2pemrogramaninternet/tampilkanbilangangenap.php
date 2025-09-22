<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menampilkan Bilangan Genap</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 font-sans">
    <!-- Tombol Kembali -->
    <a href="index.php" class="absolute top-4 left-4 text-white font-semibold text-sm py-2 px-4 rounded-lg bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 transition-all duration-300 shadow-md">
        &#8592; Kembali
    </a>

    <div class="min-h-screen flex items-center justify-center py-12 px-6">
        <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-xl outline outline-2 outline-gray-300">
            <h3 class="text-3xl font-semibold text-center text-gray-800 mb-8">Menampilkan Bilangan Genap</h3>

            <!-- Form Input -->
            <form method="POST">
                <div class="mb-4">
                    <label for="n1" class="block text-gray-700 font-medium">Nilai Minimum (n1):</label>
                    <input type="number" name="n1" id="n1" class="mt-2 p-2 w-full border rounded-lg" required>
                </div>

                <div class="mb-4">
                    <label for="n2" class="block text-gray-700 font-medium">Nilai Maksimum (n2):</label>
                    <input type="number" name="n2" id="n2" class="mt-2 p-2 w-full border rounded-lg" required>
                </div>

                <button type="submit" class="w-full py-2 px-4 rounded-lg bg-gradient-to-r from-blue-400 to-blue-600 text-white hover:from-blue-500 hover:to-blue-700 transition-all duration-300 shadow-md">Tampilkan</button>
            </form>

            <?php
            // Menangani form submission
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Ambil nilai dari form
                $n1 = $_POST['n1'];
                $n2 = $_POST['n2'];

                // Validasi agar n1 < n2
                if ($n1 >= $n2) {
                    echo "<p class='mt-4 text-red-500'>Nilai n1 harus lebih kecil dari n2!</p>";
                } else {
                    // Menampilkan bilangan genap
                    echo "<div class='mt-4'>";
                    echo "<h4 class='font-semibold text-gray-800'>Bilangan Genap dari $n1 sampai $n2:</h4>";
                    echo "<div class='mt-2 p-4 border border-gray-300 rounded-lg h-48 overflow-y-scroll'>";
                    echo "<ul>";

                    // Looping untuk menampilkan bilangan genap
                    for ($i = $n1; $i <= $n2; $i++) {
                        if ($i % 2 == 0) {
                            echo "<li class='text-gray-700'>$i</li>";
                        }
                    }

                    echo "</ul>";
                    echo "</div>"; // End of scrollable div
                    echo "</div>";
                }
            }
            ?>
            <p class="mt-8 text-center text-sm text-gray-500">Anak Agung Gede Wisnu Mahadhiva - 2405551106</p>
        </div>
    </div>
</body>

</html>
