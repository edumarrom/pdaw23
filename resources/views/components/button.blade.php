@props([
    'color' => 'gray',
])

@php
    $colors = [
        'disabled' => 'bg-gray-300 hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-300 focus:ring-gray-300 cursor-not-allowed',
        'blue' => 'bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:ring-blue-500',
        'gray' => 'bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:ring-indigo-500',
        'indigo' => 'bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:ring-indigo-500',
        'rose' => 'bg-rose-500 border-transparent text-white hover:bg-rose-700 focus:bg-rose-700 active:bg-rose-900 focus:ring-rose-500',
        'teal' => 'bg-teal-500 hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:ring-teal-500',
        'white' => 'bg-white border-gray-300 text-gray-700 shadow-sm hover:bg-gray-50 focus:ring-indigo-500 disabled:opacity-25',
    ];

    // Si el color no existe en el array, usar "gray"
    $color = array_key_exists($color, $colors) ? $color : 'gray';

    // Si entre los atributos existe "disabled", usar color "disabled"
    $color = array_key_exists('disabled', $attributes->getAttributes()) ? 'disabled' : $color;
@endphp

<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center px-4 py-2 rounded border border-transparent font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150'
    . ' ' . $colors[$color],
    ]) }}>
    {{ $slot }}
</button>
