@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 mb-1 mt-2']) }}>
    {{ $value ?? $slot }}
</label>
