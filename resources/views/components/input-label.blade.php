@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm tex-gray-500 font-bold uppercase mb-2']) }}>
    {{ $value ?? $slot }}
</label>
