<footer class="bg-yellow-400 text-gray-800 mt-8">
  <div class="max-w-7xl mx-auto px-6 py-6 grid grid-cols-1 md:grid-cols-3 gap-6">
    {{-- Tentang Speedzone --}}
    <div>
      <h3 class="text-lg font-semibold mb-2">Speedzone</h3>
      <p class="text-gray-700 text-sm leading-relaxed">
        SpeedZone hadir untuk memudahkan kamu mencari dan membeli motor sport favorit dengan pengalaman berbelanja online yang praktis dan terpercaya.
      </p>
    </div>

    {{-- Navigasi --}}
    <div>
      <h3 class="text-lg font-semibold mb-2">Navigasi</h3>
      <ul class="space-y-1 text-sm">
        <li><a href="{{ route('tentang') }}" class="hover:underline hover:text-yellow-300 transition">Tentang Speedzone</a></li>
        <li><a href="{{ route('dashboard') }}" class="hover:underline hover:text-yellow-300 transition">Beranda</a></li>
        <li><a href="{{ route('produk') }}" class="hover:underline hover:text-yellow-300 transition">Produk</a></li>
      </ul>
    </div>

    {{-- Kontak --}}
    <div>
      <h3 class="text-lg font-semibold mb-2">Kontak Kami</h3>
      <p class="text-sm">Email: <a href="mailto:info@speedzone.com" class="hover:underline">info@speedzone.com</a></p>
      <p class="text-sm">Telepon: <a href="tel:+628123456789" class="hover:underline">+62 812 3456 789</a></p>
      <p class="text-sm">Instagram: <a href="https://instagram.com/spdzne_" target="_blank" class="hover:underline">@spdzne__</a></p>
    </div>
  </div>

  <div class="border-t border-gray-800 mt-4 py-3 text-center text-gray-700 text-xs">
    &copy; {{ date('Y') }} Speedzone. All rights reserved.
  </div>
</footer>
