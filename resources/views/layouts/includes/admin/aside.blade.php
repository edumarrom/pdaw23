@php
    $links = [
        [
            'name' => 'Dashboard',
            'route' => route('admin.dashboard'),
            'icon' => 'fa-solid fa-chart-pie',
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'name' => 'Niveles',
            'route' => route('admin.levels.index'),
            'icon' => 'fa-solid fa-layer-group',
            'active' => request()->routeIs('admin.levels.*'),
        ],
        [
            'name' => 'Usuarios',
            'route' => route('admin.users.index'),
            'icon' => 'fa-solid fa-users',
            'active' => request()->routeIs('admin.users.*'),
        ],
        [
            'name' => 'Permisos',
            'route' => route('admin.permissions.index'),
            'icon' => 'fa-solid fa-user-shield',
            'active' => request()->routeIs('admin.permissions.*'),
        ],
        [
            'name' => 'Roles',
            'route' => route('admin.roles.index'),
            'icon' => 'fa-solid fa-user-gear',
            'active' => request()->routeIs('admin.roles.*'),
        ],
    ]
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 shadow-lg transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    :class="{'-tralate-x-full': !open, 'transform-none': open}"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">

            @foreach ($links as $link)
                <li>
                    <a  href="{{ $link['route'] }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 hover:cursor-pointer
                        {{ $link['active'] ? 'bg-gray-100' : '' }}">

                        <i class="mr-3 text-xl text-gray-500 {{$link['icon']}}"></i>

                        <span class="ms-3">{{ $link['name'] }}</span>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
</aside>
