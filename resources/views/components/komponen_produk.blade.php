<div class="flex items-center space-x-4">
  <img src="{{ $image }}" alt="{{ $title }}" class="w-24 h-24 rounded-md object-cover">
  <div>
    <h2 class="text-lg font-semibold">{{ $title }}</h2>
    <p class="text-yellow-400 font-bold text-xl">Rp {{ number_format($price,0,',','.') }}</p>
  </div>
</div>