<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
  <!-- Tombol Kembali -->
  <a href="/index.php" class="absolute top-4 left-4 text-white font-semibold text-sm py-2 px-4 rounded-lg bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 transition-all duration-300 shadow-md">
    &#8592; Kembali
  </a>

  <!-- Navigasi -->
  <div class="container mx-auto py-4 flex items-center justify-between mt-10">
    <!-- Kiri: Tombol Tambah Mahasiswa -->
    <a href="tambah.php" class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all duration-300">
      Tambah Mahasiswa
    </a>

    <!-- Kanan: Tombol Cari + Textbox -->
    <div class="flex items-center gap-3 relative">
      <button id="btnCari" class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all duration-300">
        Cari Mahasiswa
      </button>

      <div id="searchBox" class="absolute right-full mr-3 transform translate-x-4 opacity-0 w-0 overflow-hidden transition-all duration-500 ease-in-out">
        <input 
          type="text" 
          id="keyword" 
          placeholder="Ketik nama/NIM..." 
          class="p-2 w-80 border border-gray-300 rounded-lg focus:outline-none focus:ring-0"
        >
      </div>
    </div>
  </div>

  <!-- Tabel Daftar Mahasiswa -->
  <div class="container mx-auto px-4 py-6">
    <h2 class="text-3xl font-bold text-center mb-6">Daftar Mahasiswa</h2>

    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
      <thead class="bg-gradient-to-r from-blue-400 to-blue-600 text-white">
        <tr>
          <th class="py-3 px-6 text-left">ID</th>
          <th class="py-3 px-6 text-left">NIM</th>
          <th class="py-3 px-6 text-left">Nama</th>
          <th class="py-3 px-6 text-left">Prodi</th>
          <th class="py-3 px-6 text-left">Aksi</th>
        </tr>
      </thead>
      <tbody id="hasil">
        <?php
        $result = $conn->query("SELECT * FROM mahasiswa");
        while ($row = $result->fetch_assoc()) {
            echo "<tr class='border-b hover:bg-gray-100 transition-colors duration-300'>
                    <td class='py-3 px-6'>{$row['id']}</td>
                    <td class='py-3 px-6'>{$row['nim']}</td>
                    <td class='py-3 px-6'>{$row['nama']}</td>
                    <td class='py-3 px-6'>{$row['prodi']}</td>
                    <td class='py-3 px-6 flex gap-2'>
                      <a href='edit.php?id={$row['id']}' class='text-blue-500 hover:text-blue-700 transition'>Edit</a> | 
                      <a href='hapus.php?id={$row['id']}' class='text-red-500 hover:text-red-700 transition'>Hapus</a> | 
                      <a href='nilai_mahasiswa.php?id={$row['id']}' class='text-green-500 hover:text-green-700 transition'>Nilai</a>
                    </td>
                  </tr>";
        }
        ?>
      </tbody>
    </table>
    <p class="mt-8 text-center text-sm text-gray-500">Anak Agung Gede Wisnu Mahadhiva - 2405551106</p>
  </div>

  <script>
    const btnCari = document.getElementById("btnCari");
    const searchBox = document.getElementById("searchBox");
    let terbuka = false;

    btnCari.addEventListener("click", () => {
      terbuka = !terbuka;
      if (terbuka) {
        searchBox.classList.remove("w-0", "opacity-0", "translate-x-4");
        searchBox.classList.add("w-80", "opacity-100", "translate-x-0");
      } else {
        searchBox.classList.remove("w-80", "opacity-100", "translate-x-0");
        searchBox.classList.add("w-0", "opacity-0", "translate-x-4");
      }
    });

    // AJAX pencarian
    document.addEventListener("input", e => {
      if (e.target.id === "keyword") {
        const keyword = e.target.value;
        fetch("cari-mahasiswa.php?keyword=" + encodeURIComponent(keyword))
          .then(res => res.json())
          .then(data => {
            let isi = "";
            data.forEach(m => {
              isi += `<tr class='border-b hover:bg-gray-100 transition-colors duration-300'>
                        <td class='py-3 px-6'>${m.id}</td>
                        <td class='py-3 px-6'>${m.nim}</td>
                        <td class='py-3 px-6'>${m.nama}</td>
                        <td class='py-3 px-6'>${m.prodi}</td>
                        <td class='py-3 px-6 flex gap-2'>
                          <a href='edit.php?id=${m.id}' class='text-blue-500 hover:text-blue-700 transition'>Edit</a> | 
                          <a href='hapus.php?id=${m.id}' class='text-red-500 hover:text-red-700 transition'>Hapus</a> | 
                          <a href='nilai_mahasiswa.php?id=${m.id}' class='text-green-500 hover:text-green-700 transition'>Nilai</a>
                        </td>
                      </tr>`;
            });
            document.querySelector("#hasil").innerHTML = isi;
          });
      }
    });
  </script>

</body>
</html>
