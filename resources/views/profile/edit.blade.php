<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">

            <div>
                <h2 class="text-3xl font-bold text-slate-800">
                    Profile Saya
                </h2>

                <p class="text-slate-500 mt-1">
                    Kelola informasi akun, password, dan keamanan akun Anda.
                </p>
            </div>

        </div>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto px-6 space-y-8">

            {{-- Header Card --}}
            <div class="bg-gradient-to-r from-indigo-600 via-violet-600 to-purple-700 rounded-3xl p-8 text-white shadow-xl">

                <div class="flex items-center gap-6">

                    <div class="w-20 h-20 rounded-full bg-white/20 flex items-center justify-center text-4xl">

                        👤

                    </div>

                    <div>

                        <h2 class="text-3xl font-bold">
                            {{ Auth::user()->name }}
                        </h2>

                        <p class="text-indigo-100 mt-1">
                            {{ Auth::user()->email }}
                        </p>

                        <span class="inline-block mt-4 px-4 py-2 rounded-full bg-white/20 text-sm">
                            {{ ucfirst(Auth::user()->role) }}
                        </span>

                    </div>

                </div>

            </div>

            {{-- Informasi Profile --}}
            <div class="group bg-white rounded-3xl border border-slate-200 shadow-sm
                        hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">

                <div class="border-b border-slate-100 px-8 py-5 flex items-center gap-3">

                    <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl
                                group-hover:bg-blue-600 group-hover:text-white transition">

                        👤

                    </div>

                    <div>

                        <h3 class="font-bold text-xl text-slate-800">
                            Informasi Profile
                        </h3>

                        <p class="text-slate-500 text-sm">
                            Perbarui nama dan alamat email Anda.
                        </p>

                    </div>

                </div>

                <div class="p-8">

                    @include('profile.partials.update-profile-information-form')

                </div>

            </div>

            {{-- Password --}}
            <div class="group bg-white rounded-3xl border border-slate-200 shadow-sm
                        hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">

                <div class="border-b border-slate-100 px-8 py-5 flex items-center gap-3">

                    <div class="w-12 h-12 rounded-2xl bg-yellow-100 flex items-center justify-center text-2xl
                                group-hover:bg-yellow-500 group-hover:text-white transition">

                        🔒

                    </div>

                    <div>

                        <h3 class="font-bold text-xl text-slate-800">
                            Password
                        </h3>

                        <p class="text-slate-500 text-sm">
                            Gunakan password yang kuat untuk keamanan akun.
                        </p>

                    </div>

                </div>

                <div class="p-8">

                    @include('profile.partials.update-password-form')

                </div>

            </div>

            {{-- Delete --}}
            <div class="group bg-white rounded-3xl border border-red-200 shadow-sm
                        hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">

                <div class="border-b border-red-100 px-8 py-5 flex items-center gap-3">

                    <div class="w-12 h-12 rounded-2xl bg-red-100 flex items-center justify-center text-2xl
                                group-hover:bg-red-600 group-hover:text-white transition">

                        🗑️

                    </div>

                    <div>

                        <h3 class="font-bold text-xl text-red-600">
                            Hapus Akun
                        </h3>

                        <p class="text-slate-500 text-sm">
                            Menghapus akun bersifat permanen dan tidak dapat dikembalikan.
                        </p>

                    </div>

                </div>

                <div class="p-8">

                    @include('profile.partials.delete-user-form')

                </div>

            </div>

        </div>

    </div>

</x-app-layout>