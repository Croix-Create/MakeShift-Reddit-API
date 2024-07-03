@props(['name', 'type' => 'text'])

<div class="mb-6">
    <label class="block mb-2 font-italics text-m text-black-700 rounded"
           for="{{ $name }}"
    >
        {{ ucwords($name) }}
    </label>

    <input class="border border-black-400 p-2 w-full rounded"
           type="{{ $type }}"
           name="{{ $name }}"
           id="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }}
    >
    @error($name)
    <p class="text-green-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
