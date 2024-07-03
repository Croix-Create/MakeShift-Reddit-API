@props(['name'])
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-red-700"
           for="{{ $name }}"
    >
        {{ucwords($name)}}
    </label>

    <textarea class="border border-red-400 p-2 w-full rounded"
              type="text"
              name="{{ $name }}"
              id="{{ $name }}"
              required
    >{{ $slot ?? old($name) }} </textarea>
</div>
@error($name)
<p class="text-pink-500 text-xs mt-1">{{ $message }}</p>
@enderror
