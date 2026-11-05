<!-- Footer -->
  <footer class="bg-neutral-900 border-t border-neutral-800 py-6 text-center text-xs text-neutral-500">
    <div class="max-w-4xl mx-auto px-4 space-y-1">
      <p>&copy; 2026 <strong><?php echo htmlspecialchars($profil['nama'] ?? 'Rasya Zia'); ?></strong> &bull; S1 Teknik Informatika, Universitas Paramadina</p>
    </div>
  </footer>

  <script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const navLinks = document.querySelectorAll('.nav-link');

    menuBtn.addEventListener('click', function () {
      mobileMenu.classList.toggle('hidden');
    });

    navLinks.forEach(function (link) {
      link.addEventListener('click', function () {
        mobileMenu.classList.add('hidden');
      });
    });
  </script>

</body>
</html>