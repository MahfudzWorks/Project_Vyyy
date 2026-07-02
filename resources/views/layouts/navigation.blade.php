<nav x-data="{ open: false }" class="bg-white border-b border-slate-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center h-16">

            {{-- Logo --}}
            <div class="flex items-center gap-8">

                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 text-white flex items-center justify-center font-bold shadow-lg">
                        V
                    </div>

                    <div>
                        <h1 class="font-bold text-slate-800">
                            Jasa<span class="text-indigo-600">Vyyy</span>
                        </h1>

                        <p class="text-xs text-slate-500">
                            Dashboard
                        </p>
                    </div>

                </a>

                {{-- Menu --}}
                <div class="hidden md:flex items-center gap-2">

                    <a href="{{ route('dashboard') }}"
                        class="px-4 py-2 rounded-xl transition
                        {{ request()->routeIs('dashboard')
                            ? 'bg-indigo-100 text-indigo-700 font-semibold'
                            : 'text-slate-600 hover:bg-slate-100' }}">

                        Dashboard

                    </a>

                </div>

            </div>

            {{-- Right --}}
            <div class="hidden md:flex items-center gap-4">

                {{-- Dropdown --}}
                <x-dropdown align="right" width="56">

                    <x-slot name="trigger">

                        <button
                            class="flex items-center gap-3 rounded-2xl px-3 py-2 hover:bg-slate-100 transition">

                            <div
                                class="w-10 h-10 rounded-full bg-gradient-to-r from-indigo-600 to-violet-600 text-white flex items-center justify-center font-bold">

                                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                            </div>

                            <div class="text-left">

                                <p class="font-semibold text-slate-800">
                                    {{ Auth::user()->name }}
                                </p>

                                <p class="text-xs text-slate-500">
                                    {{ ucfirst(Auth::user()->role) }}
                                </p>

                            </div>

                            <svg class="w-4 h-4 text-slate-500"
                                fill="currentColor"
                                viewBox="0 0 20 20">

                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10
                                    11.168l3.71-3.938a.75.75 0
                                    111.08 1.04l-4.25 4.5a.75.75
                                    0 01-1.08 0l-4.25-4.5a.75.75
                                    0 01.02-1.06z"
                                    clip-rule="evenodd" />

                            </svg>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            👤 Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();this.closest('form').submit();">

                                🚪 Logout

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            {{-- Mobile --}}
            <div class="md:hidden">

                <button
                    @click="open=!open"
                    class="p-2 rounded-xl hover:bg-slate-100">

                    ☰

                </button>

            </div>

        </div>

    </div>

    {{-- Mobile Menu --}}
    <div x-show="open" class="md:hidden border-t bg-white">

        <div class="p-4 space-y-2">

            <a href="{{ route('dashboard') }}"
                class="block px-4 py-3 rounded-xl hover:bg-slate-100">

                Dashboard

            </a>

            <a href="{{ route('profile.edit') }}"
                class="block px-4 py-3 rounded-xl hover:bg-slate-100">

                Profile

            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    class="w-full text-left px-4 py-3 rounded-xl text-red-600 hover:bg-red-50">

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>