<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex h-screen">

        {{-- Sidebar --}}
        <aside
            id="sidebar"
            class="bg-slate-900 text-white w-64 transition-all duration-300 flex flex-col">

            {{-- Logo --}}
            <div class="h-16 flex items-center justify-center border-b border-slate-700">
                <span id="logoText" class="font-bold text-xl">
                    VYYY Admin
                </span>
            </div>

            {{-- Menu --}}
            <nav class="flex-1 p-4 space-y-2">

                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">

                    <span>🏠</span>
                    <span class="menu-text">Dashboard</span>

                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">

                    <span>👤</span>
                    <span class="menu-text">User</span>

                </a>

                <a href="{{ route('admin.orders.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">

                    <span>📦</span>
                    <span class="menu-text">Order</span>

                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">

                    <span>🛠️</span>
                    <span class="menu-text">Layanan</span>

                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">

                    <span>❓</span>
                    <span class="menu-text">FAQ</span>

                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">

                    <span>⭐</span>
                    <span class="menu-text">Testimoni</span>

                </a>

            </nav>

            {{-- Logout --}}
            <div class="p-4 border-t border-slate-700">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="w-full bg-red-500 hover:bg-red-600 py-2 rounded-lg">

                        Logout

                    </button>
                </form>

            </div>

        </aside>

        {{-- Content --}}
        <div class="flex-1 flex flex-col">

            <header class="bg-white shadow h-16 flex items-center justify-between px-6">

                <div class="flex items-center gap-4">

                    <button
                        id="toggleSidebar"
                        class="text-2xl">

                        ☰

                    </button>

                    <h1 class="font-semibold">
                        Admin Panel
                    </h1>

                </div>

                {{-- PROFILE + USER INFO --}}
                <div class="flex items-center gap-4">

                    <span class="text-gray-600">
                        👋 {{ Auth::user()->name }}
                    </span>

                    <a href="{{ route('profile.edit') }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">

                        Profile

                    </a>

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

                menuText.forEach(item => {
                    item.classList.add('hidden');
                });

            } else {

                sidebar.classList.remove('w-20');
                sidebar.classList.add('w-64');

                logoText.classList.remove('hidden');

                menuText.forEach(item => {
                    item.classList.remove('hidden');
                });

            }

        });
    </script>

</body>

</html>