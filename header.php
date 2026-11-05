<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portofolio - <?php echo htmlspecialchars($profil['nama'] ?? 'Rasya Zia Nawfalry'); ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-neutral-950 text-neutral-300 font-sans selection:bg-neutral-700 selection:text-white">

  <!-- Header / Navigasi -->
  <header class="bg-neutral-900 border-b border-neutral-800 sticky top-0 z-50">
    <div class="max-w-4xl mx-auto px-4 py-4 flex items-center justify-between">
      <a href="#beranda" class="text-base font-bold text-white hover:text-neutral-400 transition-colors">
        <?php echo htmlspecialchars($profil['nama'] ?? 'Rasya Zia Nawfalry'); ?>
      </a>

      <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
        <a href="#beranda" class="text-neutral-400 hover:text-white transition-colors">Beranda</a>
        <a href="#tentang" class="text-neutral-400 hover:text-white transition-colors">Tentang Saya</a>
        <a href="#proyek" class="text-neutral-400 hover:text-white transition-colors">Proyek</a>
        <a href="#kontak" class="text-neutral-400 hover:text-white transition-colors">Kontak</a>
      </nav>

      <button id="menu-btn" class="md:hidden text-neutral-400 hover:text-white p-1" aria-label="Buka menu navigasi">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-neutral-900 border-t border-neutral-800 px-4 py-3 space-y-2 text-sm">
      <a href="#beranda" class="block py-1 text-neutral-300 hover:text-white nav-link">Beranda</a>
      <a href="#tentang" class="block py-1 text-neutral-300 hover:text-white nav-link">Tentang Saya</a>
      <a href="#proyek" class="block py-1 text-neutral-300 hover:text-white nav-link">Proyek</a>
      <a href="#kontak" class="block py-1 text-neutral-300 hover:text-white nav-link">Kontak</a>
    </div>
  </header>