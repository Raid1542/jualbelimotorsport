<div>
  <label class="block font-medium mb-1">{{ $label }}</label>
  <input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" {{ $attributes->merge(['class' => 'w-full border-2 border-yellow-300 text-black rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-300']) }}>
</div>