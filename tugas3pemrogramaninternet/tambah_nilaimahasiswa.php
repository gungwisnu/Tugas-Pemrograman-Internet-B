<?php
include "koneksi.php";

$id_mahasiswa = isset($_GET['id']) ? $_GET['id'] : null;

// fungsi konversi IPK ke huruf
function konversi_huruf($ipk) {
    if ($ipk >= 4.00) return 'A';
    if ($ipk >= 3.00) return 'B';
    if ($ipk >= 2.00) return 'C';
    if ($ipk >= 1.00) return 'D';
    return 'E';
}

// proses tambah nilai
if (isset($_POST['tambah'])) {
    $mata_kuliah = $_POST['mata_kuliah'];
    $sks = $_POST['sks'];
    $nilai_angka = $_POST['nilai_angka'];
    $nilai_huruf = $_POST['nilai_huruf']; // ambil dari form langsung juga (udah auto isi JS)

    if (empty($mata_kuliah) || empty($sks) || empty($nilai_angka)) {
        echo "<p class='text-red-600 text-center'>Semua field harus diisi.</p>";
    } else {
        // backup logika konversi server-side
        if (empty($nilai_huruf)) $nilai_huruf = konversi_huruf($nilai_angka);

        $stmt = $conn->prepare("INSERT INTO nilai (mahasiswa_id, mata_kuliah, sks, nilai_huruf, nilai_angka)
                                VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isiss", $id_mahasiswa, $mata_kuliah, $sks, $nilai_huruf, $nilai_angka);

        if ($stmt->execute()) {
            echo "<div class='max-w-xl mx-auto text-center bg-green-100 text-green-700 py-3 rounded-lg font-medium mb-6'>
                    ✅ Nilai berhasil ditambahkan!
                  </div>";
        } else {
            echo "<div class='max-w-xl mx-auto text-center bg-red-100 text-red-700 py-3 rounded-lg font-medium mb-6'>
                    Gagal menambahkan nilai: {$conn->error}
                  </div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Nilai Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center mb-6">Tambah Nilai Mahasiswa</h1>

    <div class="flex justify-between mb-4">
      <a href="nilai_mahasiswa.php?id=<?php echo $id_mahasiswa; ?>" class="bg-gradient-to-r from-red-400 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-500 hover:to-red-700 transition">
        Kembali
      </a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg mb-8 max-w-xl mx-auto">
      <h2 class="text-2xl font-semibold mb-4 text-center">Tambah Nilai</h2>
      <form method="post" class="space-y-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
          <input type="text" name="mata_kuliah" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">SKS</label>
          <input type="number" name="sks" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Nilai IPK</label>
          <input type="text" name="nilai_angka" id="nilai_angka" maxlength="4"
                 class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Nilai Huruf</label>
          <input type="text" name="nilai_huruf" id="nilai_huruf"
                 class="w-full px-4 py-2 border rounded-md bg-gray-50" readonly required>
        </div>
        <button type="submit" name="tambah" class="w-full bg-gradient-to-r from-blue-400 to-blue-600 text-white py-2 rounded-md font-semibold hover:from-blue-500 hover:to-blue-700 transition">
          Simpan Nilai
        </button>
      </form>
    </div>
    <p class="mt-8 text-center text-sm text-gray-500">Anak Agung Gede Wisnu Mahadhiva - 2405551106</p>
  </div>

  <script>
    const ipkInput = document.getElementById('nilai_angka');
    const hurufInput = document.getElementById('nilai_huruf');

    ipkInput.addEventListener('input', function() {
      let val = this.value.replace(/[^0-9.]/g, '');
      if (val.length > 3) val = val.slice(0, 4);
      if (val.length === 3 && !val.includes('.')) {
        val = val[0] + '.' + val.slice(1);
      }
      this.value = val;

      const ipk = parseFloat(this.value);
      let huruf = "";

      if (ipk >= 4.00) huruf = "A";
      else if (ipk >= 3.00) huruf = "B";
      else if (ipk >= 2.00) huruf = "C";
      else if (ipk >= 1.00) huruf = "D";
      else if (ipk > 0) huruf = "E";

      hurufInput.value = huruf;
    });
  </script>

</body>
</html>
