@props([
    'color' => 'gray',
])

@php
    $colors = [
        'disabled' => 'bg-gray-300 hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-300 focus:ring-gray-300 cursor-not-allowed',
        'blue' => 'bg-blue-500 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:ring-blue-500',
        'gray' => 'bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:ring-indigo-500',
        'indigo' => 'bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:ring-indigo-500',
        'teal' => 'bg-teal-500 hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:ring-teal-500',
    ];

    // Si el color no existe en el array, usar color "gray"
    $color = array_key_exists($color, $colors) ? $color : 'gray';

    // Si entre los atributos existe "disabled", usar color "disabled" y eliminar atributo "href"
    if (array_key_exists('disabled', $attributes->getAttributes())) {
        $color = 'disabled';
        $attributes->offsetUnset('href');
    }
@endphp

<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150'
    . ' ' . $colors[$color],
]) }}>
    {{ $slot }}
</a>
