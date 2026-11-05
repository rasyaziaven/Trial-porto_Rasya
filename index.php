<?php
require 'koneksi.php';

// Fetch data dari database
$hasil_profil = mysqli_query($koneksi, "SELECT * FROM profil WHERE id = 1");
$profil = mysqli_fetch_assoc($hasil_profil);

$query_portofolio = mysqli_query($koneksi, "SELECT * FROM tbl_portofolio");
$query_skill      = mysqli_query($koneksi, "SELECT * FROM tbl_skill");
$query_pendidikan = mysqli_query($koneksi, "SELECT * FROM tbl_pendidikan");

// Panggil Header
include 'header.php';
?>

<!-- Konten Utama -->
<main class="max-w-4xl mx-auto px-4 py-12 space-y-20">

  <!-- Beranda -->
  <div id="beranda" class="text-center pt-4">
    <div class="inline-block relative mb-6">
      <img 
        src="foto-profil.jpeg" 
        alt="Foto Profil" 
        class="w-36 h-36 md:w-40 md:h-40 rounded-full mx-auto object-cover border-2 border-neutral-700 shadow-xl"
      />
    </div>

    <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight mb-2">
      <?php echo htmlspecialchars($profil['nama'] ?? 'Rasya Zia Nawfalry'); ?>
    </h1>

    <p class="text-neutral-400 text-sm md:text-base font-medium mb-4">
      Software Engineer &amp; Indie Game Developer &bull; S1 Teknik Informatika Universitas Paramadina
    </p>

    <p class="text-neutral-400 max-w-xl mx-auto text-sm leading-relaxed mb-6">
      Alumni SMK Teknik Komputer dan Jaringan (TKJ) tahun 2024. Berfokus pada rekayasa logika pemrograman, pengembangan game 2D, serta arsitektur basis data.
    </p>

    <div class="flex justify-center gap-3">
      <a href="#proyek" class="bg-white hover:bg-neutral-200 text-neutral-950 font-semibold text-sm px-5 py-2.5 rounded-lg transition-colors">
        Lihat Proyek
      </a>
      <a href="#kontak" class="border border-neutral-700 hover:bg-neutral-900 text-neutral-300 font-semibold text-sm px-5 py-2.5 rounded-lg transition-colors">
        Hubungi Saya
      </a>
    </div>
  </div>

  <!-- Tentang Saya -->
  <div id="tentang" class="space-y-6">
    <div class="border-b border-neutral-800 pb-3">
      <h2 class="text-2xl font-bold text-white">Tentang Saya</h2>
      <p class="text-sm text-neutral-400">Latar belakang pendidikan, minat, serta keahlian teknis.</p>
    </div>

    <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-6 text-sm leading-relaxed space-y-3">
      <p class="text-neutral-300">
        Halo! Saya <strong><?php echo htmlspecialchars($profil['nama'] ?? 'Rasya Zia Nawfalry'); ?></strong>. Ketertarikan saya pada dunia teknologi berawal dari studi di SMK jurusan Teknik Komputer dan Jaringan (TKJ). Saat ini saya menempuh jenjang sarjana (S1) program studi Teknik Informatika di <strong>Universitas Paramadina</strong>.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Data Pribadi -->
      <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-5 space-y-3">
        <h3 class="font-semibold text-white text-base">Data Pribadi</h3>
        <ul class="space-y-2 text-sm">
          <li class="flex justify-between p-2.5 rounded bg-neutral-950 border border-neutral-800/80">
            <span class="text-neutral-400">Email</span>
            <strong class="text-white"><?php echo htmlspecialchars($profil['email'] ?? '-'); ?></strong>
          </li>
          <li class="flex justify-between p-2.5 rounded bg-neutral-950 border border-neutral-800/80">
            <span class="text-neutral-400">Telepon</span>
            <strong class="text-white"><?php echo htmlspecialchars($profil['telepon'] ?? '-'); ?></strong>
          </li>
          <li class="flex justify-between p-2.5 rounded bg-neutral-950 border border-neutral-800/80">
            <span class="text-neutral-400">Alamat</span>
            <strong class="text-white"><?php echo htmlspecialchars($profil['alamat'] ?? '-'); ?></strong>
          </li>
        </ul>
      </div>

      <!-- Keahlian (Dynamic database) -->
      <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-5 space-y-3">
        <h3 class="font-semibold text-white text-base">Keahlian &amp; Toolset</h3>
        <div class="flex flex-wrap gap-2 text-xs">
          <?php while($row_skill = mysqli_fetch_assoc($query_skill)) { ?>
            <span class="bg-neutral-800 text-neutral-200 px-3 py-1.5 rounded border border-neutral-700/60">
              <?php echo htmlspecialchars($row_skill['nama_skill']); ?> (<?php echo htmlspecialchars($row_skill['tingkat']); ?>)
            </span>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Proyek & Pengalaman -->
  <div id="proyek" class="space-y-8">
    <div class="border-b border-neutral-800 pb-3">
      <h2 class="text-2xl font-bold text-white">Proyek &amp; Pengalaman</h2>
      <p class="text-sm text-neutral-400">Dokumentasi hasil karya proyek dari database MySQL.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <?php while($row_porto = mysqli_fetch_assoc($query_portofolio)) { ?>
      <div class="bg-neutral-900 border border-neutral-800 rounded-xl overflow-hidden flex flex-col hover:border-neutral-700 transition-colors">
        <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
          <div>
            <span class="text-xs font-semibold text-neutral-400 uppercase tracking-wider"><?php echo htmlspecialchars($row_porto['kategori']); ?></span>
            <h3 class="font-bold text-white text-base mt-1 mb-2"><?php echo htmlspecialchars($row_porto['judul_projek']); ?></h3>
            <p class="text-xs text-neutral-400 leading-relaxed">
              <?php echo htmlspecialchars($row_porto['deskripsi']); ?>
            </p>
          </div>
          <div class="pt-3 border-t border-neutral-800 text-xs text-neutral-400 flex justify-between items-center">
            <span>Status: Aktif</span>
            <a href="<?php echo htmlspecialchars($row_porto['link_projek']); ?>" target="_blank" class="text-white hover:text-neutral-300 font-medium underline underline-offset-2">
              Lihat &rarr;
            </a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>

    <!-- Tabel Pendidikan -->
    <div class="space-y-3 pt-4">
      <h3 class="text-base font-bold text-white">Riwayat Pendidikan</h3>
      <div class="overflow-x-auto rounded-xl border border-neutral-800 bg-neutral-900">
        <table class="w-full text-left text-xs min-w-[560px]">
          <thead class="bg-neutral-950 border-b border-neutral-800 text-neutral-300 font-semibold uppercase tracking-wider text-[11px]">
            <tr>
              <th class="p-3.5">Jenjang</th>
              <th class="p-3.5">Institusi</th>
              <th class="p-3.5">Tahun</th>
              <th class="p-3.5">Keterangan</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-neutral-800 text-neutral-300">
            <?php while($row_edu = mysqli_fetch_assoc($query_pendidikan)) { ?>
            <tr class="hover:bg-neutral-800/40">
              <td class="p-3.5 font-semibold text-white"><?php echo htmlspecialchars($row_edu['jenjang']); ?></td>
              <td class="p-3.5 text-neutral-400"><?php echo htmlspecialchars($row_edu['institusi']); ?></td>
              <td class="p-3.5 text-neutral-300"><?php echo htmlspecialchars($row_edu['tahun_mulai']); ?> - <?php echo htmlspecialchars($row_edu['tahun_selesai']); ?></td>
              <td class="p-3.5 text-neutral-400"><?php echo htmlspecialchars($row_edu['keterangan']); ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Kontak -->
  <div id="kontak" class="space-y-6">
    <div class="border-b border-neutral-800 pb-3">
      <h2 class="text-2xl font-bold text-white">Kontak</h2>
      <p class="text-sm text-neutral-400">Silakan hubungi saya melalui form di bawah ini.</p>
    </div>

    <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-6">
      <h3 class="font-semibold text-white text-base mb-1">Kirim Pesan</h3>
      <form action="https://formsubmit.co/rasyazia06@gmail.com" method="POST" class="space-y-4 mt-4">
        <input type="hidden" name="_subject" value="Pesan Baru dari Portofolio Rasya Zia">
        <input type="hidden" name="_captcha" value="false">

        <div>
          <label class="block text-xs font-semibold text-neutral-300 mb-1">Nama Lengkap</label>
          <input type="text" name="nama" required placeholder="Masukkan nama..." class="w-full bg-neutral-950 border border-neutral-800 rounded-lg px-3.5 py-2.5 text-sm text-white focus:outline-none">
        </div>

        <div>
          <label class="block text-xs font-semibold text-neutral-300 mb-1">Alamat Email</label>
          <input type="email" name="email" required placeholder="email@example.com" class="w-full bg-neutral-950 border border-neutral-800 rounded-lg px-3.5 py-2.5 text-sm text-white focus:outline-none">
        </div>

        <div>
          <label class="block text-xs font-semibold text-neutral-300 mb-1">Pesan</label>
          <textarea name="pesan" rows="4" required placeholder="Tulis pesan..." class="w-full bg-neutral-950 border border-neutral-800 rounded-lg px-3.5 py-2.5 text-sm text-white focus:outline-none"></textarea>
        </div>

        <button type="submit" class="bg-white hover:bg-neutral-200 text-neutral-950 font-semibold text-sm px-5 py-2.5 rounded-lg transition-colors">
          Kirim Pesan
        </button>
      </form>
    </div>
  </div>

</main>

<?php
// Panggil Footer
include 'footer.php';
?>