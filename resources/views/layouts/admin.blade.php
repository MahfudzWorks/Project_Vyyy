<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-indigo-50 via-white to-violet-100">

    <div class="flex h-screen">

        {{-- Sidebar --}}
        <aside
            id="sidebar"
            class="bg-gradient-to-b from-indigo-600 via-violet-600 to-purple-700 text-white w-64 transition-all duration-300 flex flex-col shadow-2xl">

            {{-- Logo --}}
            <div class="h-16 flex items-center px-5 border-b border-white/10">

                {{-- Icon Logo (tetap tampil) --}}
                <div
                    class="w-11 h-11 min-w-[44px] rounded-xl bg-white text-indigo-600
                    flex items-center justify-center font-bold text-xl shadow-lg">

                    V

                </div>

                {{-- Tulisan --}}
                <div id="logoText" class="ml-3 transition-all duration-300">

                    <h1 class="font-bold text-lg whitespace-nowrap">
                        VYYY Admin
                    </h1>

                    <p class="text-xs text-indigo-200 whitespace-nowrap">
                        Management Panel
                    </p>

                </div>

            </div>

            {{-- Menu --}}
            <nav class="flex-1 p-4 space-y-2">

                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg transition
                    {{ request()->routeIs('dashboard')
                        ? 'bg-white/20 backdrop-blur-md text-white shadow'
                        : 'text-indigo-100 hover:bg-white/10 hover:text-white transition-all duration-200' }}">

                    <span>🏠</span>
                    <span class="menu-text">Dashboard</span>

                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 
                    {{ request()->routeIs('admin.users.*')
                        ? 'bg-white/20 backdrop-blur-md text-white shadow'
                        : 'text-indigo-100 hover:bg-white/10 hover:text-white transition-all duration-200' }}">

                    <span>👤</span>
                    <span class="menu-text">User</span>

                </a>

                <a href="{{ route('admin.orders.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 
                    {{ request()->routeIs('admin.orders.*')
                        ? 'bg-white/20 backdrop-blur-md text-white shadow'
                        : 'text-indigo-100 hover:bg-white/10 hover:text-white transition-all duration-200' }}">

                    <span>📦</span>
                    <span class="menu-text">Order</span>

                </a>

                <a href="{{ route('admin.layanan.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 
                    {{ request()->routeIs('admin.faq.*')
                        ? 'bg-white/20 backdrop-blur-md text-white shadow'
                        : 'text-indigo-100 hover:bg-white/10 hover:text-white transition-all duration-200' }}">

                    <span>🛠️</span>
                    <span class="menu-text">Layanan</span>

                </a>

                <a href="{{ route('admin.faq.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 
                    {{ request()->routeIs('admin.faq.*')
                        ? 'bg-white/20 backdrop-blur-md text-white shadow'
                        : 'text-indigo-100 hover:bg-white/10 hover:text-white transition-all duration-200' }}">

                    <span>❓</span>
                    <span class="menu-text">FAQ</span>

                </a>

                <a href="{{ route('admin.testimonial.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg
                    {{ request()->routeIs('admin.testimonial.*')
                        ? 'bg-white/20 backdrop-blur-md text-white shadow'
                        : 'text-indigo-100 hover:bg-white/10 hover:text-white transition-all duration-200' }}">

                    <span>⭐</span>
                    <span class="menu-text">Testimonial</span>

                </a>

            </nav>

            {{-- Logout --}}
            <div class="p-4 border-t border-slate-700">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="w-full flex items-center justify-center gap-3 bg-red-500 hover:bg-red-600 py-3 rounded-xl transition">

                        {{-- Icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2
                    2H6a2 2 0 01-2-2V7a2 2 0
                    012-2h5a2 2 0 012 2v1" />

                        </svg>

                        <span class="menu-text">
                            Logout
                        </span>

                    </button>

                </form>

            </div>

        </aside>

        {{-- Content --}}
        <div class="flex-1 flex flex-col">

            <header class="bg-white shadow h-16 flex items-center justify-between px-6">

                {{-- Left Menu --}}
                <div class="flex items-center gap-4">

                    {{-- Toggle Sidebar --}}
                    <button id="toggleSidebar"
                        class="p-2 rounded-xl hover:bg-slate-100 transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-slate-700"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />

                        </svg>

                    </button>

                    {{-- Judul --}}
                    <div>

                        <h1 class="text-lg font-bold text-slate-800">
                            Dashboard Admin
                        </h1>

                        <p class="text-xs text-slate-500">
                            {{ now()->translatedFormat('l, d F Y') }}
                        </p>

                    </div>

                </div>

                {{-- Search --}}
                <div class="hidden lg:flex relative">

                    <input
                        type="text"
                        placeholder="Cari menu..."
                        class="w-80 rounded-xl bg-slate-100 border-none pl-10 py-2 focus:ring-2 focus:ring-blue-500">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 absolute left-3 top-2.5 text-gray-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 105.5 5.5a7.5 7.5 0 0011.15 11.15z" />

                    </svg>

                </div>

                {{-- Right Menu --}}
                <div class="flex items-center gap-4">

                    {{-- Notification --}}
                    <div class="relative">

                        <button id="notifButton"
                            class="relative p-2 rounded-xl hover:bg-slate-100 transition">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 text-slate-600"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032
                    2.032 0 0118 14.158V11a6.002
                    6.002 0 00-4-5.659V5a2
                    2 0 10-4 0v.341C7.67
                    6.165 6 8.388 6 11v3.159c0
                    .538-.214 1.055-.595
                    1.436L4 17h5m6
                    0v1a3 3 0
                    11-6 0v-1m6
                    0H9" />

                            </svg>

                            @if($notifications->count())
                            <span
                                class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-red-500 text-white text-xs flex items-center justify-center">

                                {{ $notifications->count() }}

                            </span>
                            @endif

                        </button>

                        {{-- Dropdown Notification --}}
                        <div id="notifDropdown"
                            class="hidden absolute right-0 mt-3 w-80 bg-white rounded-xl shadow-xl border z-50">

                            <div class="px-4 py-3 border-b font-semibold">
                                🔔 Notifikasi
                            </div>

                            @forelse($notifications as $item)

                            <a href="{{ route('admin.orders.index') }}"
                                class="block px-4 py-3 hover:bg-slate-50">

                                <p class="font-medium">
                                    {{ $item->user->name }}
                                </p>

                                <p class="text-sm text-gray-500">
                                    Order "{{ $item->judul }}"
                                </p>

                            </a>

                            @empty

                            <div class="p-5 text-center text-gray-500">
                                Tidak ada notifikasi
                            </div>

                            @endforelse

                        </div>

                    </div>

                    {{-- Settings --}}
                    <a href="{{ route('profile.edit') }}"
                        class="p-2 rounded-xl hover:bg-slate-100 transition"
                        title="Pengaturan">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-slate-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M11.983 13.938a2 2 0 100-3.876 2 2 0 000 3.876z" />

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2
                2 0 11-2.83 2.83l-.06-.06a1.65
                1.65 0 00-1.82-.33 1.65
                1.65 0 00-1 1.51V21a2
                2 0 11-4 0v-.09a1.65
                1.65 0 00-1-1.51 1.65
                1.65 0 00-1.82.33l-.06.06a2
                2 0 11-2.83-2.83l.06-.06a1.65
                1.65 0 00.33-1.82 1.65
                1.65 0 00-1.51-1H3a2
                2 0 110-4h.09a1.65
                1.65 0 001.51-1 1.65
                1.65 0 00-.33-1.82l-.06-.06a2
                2 0 112.83-2.83l.06.06a1.65
                1.65 0 001.82.33h.01A1.65
                1.65 0 009 3.09V3a2
                2 0 114 0v.09a1.65
                1.65 0 001 1.51 1.65
                1.65 0 001.82-.33l.06-.06a2
                2 0 112.83 2.83l-.06.06a1.65
                1.65 0 00-.33 1.82v.01A1.65
                1.65 0 0020.91 11H21a2
                2 0 110 4h-.09a1.65
                1.65 0 00-1.51 1z" />

                        </svg>

                    </a>

                    {{-- Avatar --}}
                    <div class="flex items-center gap-3">

                        <div
                            class="w-11 h-11 rounded-full bg-gradient-to-r from-blue-500 to-cyan-500 text-white flex items-center justify-center font-bold shadow-lg">

                            {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                        </div>

                        <div>

                            <p class="font-semibold">
                                {{ Auth::user()->name }}
                            </p>

                            <p class="text-xs text-gray-500">
                                Administrator
                            </p>

                        </div>

                    </div>

                </div>

            </header>

            <main class="flex-1 p-6 overflow-y-auto">

                @yield('content')

            </main>

        </div>

    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const button = document.getElementById('toggleSidebar');
        const menuText = document.querySelectorAll('.menu-text');
        const logoText = document.getElementById('logoText');

        let collapsed = false;

        button.addEventListener('click', () => {

            collapsed = !collapsed;

            if (collapsed) {

                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-20');

                logoText.classList.add('hidden');

                logoText.parentElement.classList.remove('px-5');
                logoText.parentElement.classList.add('justify-center');

                menuText.forEach(item => item.classList.add('hidden'));

            } else {

                sidebar.classList.remove('w-20');
                sidebar.classList.add('w-64');

                logoText.classList.remove('hidden');

                logoText.parentElement.classList.remove('justify-center');
                logoText.parentElement.classList.add('px-5');

                menuText.forEach(item => item.classList.remove('hidden'));

            }

        });

        const notifButton = document.getElementById('notifButton');
        const notifDropdown = document.getElementById('notifDropdown');

        if (notifButton && notifDropdown) {

            notifButton.addEventListener('click', function(e) {

                e.stopPropagation();

                notifDropdown.classList.toggle('hidden');

            });

            document.addEventListener('click', function() {

                notifDropdown.classList.add('hidden');

            });

        }
    </script>

</body>

</html>