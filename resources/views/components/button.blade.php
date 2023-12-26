@props(['color' => 'gray'])
<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center px-4 py-2  border border-transparent font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150'
    . ($color == 'gray' ? ' bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:ring-indigo-500'
    : ( $color== 'teal' ? ' bg-teal-500 hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:ring-teal-500' : ''))
    ]) }}>
    {{ $slot }}
</button>
