<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-violet-100 flex items-center justify-center px-4 py-8">

        <div class="grid lg:grid-cols-2 max-w-6xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden">

            <!-- Form Register -->
            <div class="p-10 lg:p-16">

                <div class="max-w-md mx-auto">

                    <div class="text-center mb-10">

                        <h2 class="text-3xl font-bold text-gray-800">
                            Buat Akun Baru 🚀
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Daftar untuk mulai menggunakan layanan JasaVyyy
                        </p>

                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <!-- Nama -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Nama Lengkap
                            </label>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 outline-none transition">

                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Email
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                                class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 outline-none transition">

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Password
                            </label>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 outline-none transition">

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Konfirmasi Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                Konfirmasi Password
                            </label>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-200 outline-none transition">

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <button
                            type="submit"
                            class="w-full py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 text-white font-semibold hover:shadow-xl hover:scale-[1.02] transition">
                            Daftar Sekarang
                        </button>

                        <div class="mt-6 text-center">
                            <p class="text-sm text-gray-600">
                                Sudah punya akun?

                                <a href="{{ route('login') }}"
                                    class="font-semibold text-indigo-600 hover:text-violet-600 transition duration-300 hover:underline">
                                    Login sekarang
                                </a>
                            </p>
                        </div>

                    </form>

                    <div class="mt-8 text-center text-sm text-gray-500">
                        © {{ date('Y') }} JasaVyyy.
                        All Rights Reserved.
                    </div>

                </div>

            </div>

            <!-- Branding -->
            <div class="hidden lg:flex flex-col justify-center bg-gradient-to-br from-indigo-600 via-violet-600 to-purple-700 text-white p-16">

                <h1 class="text-5xl font-extrabold mb-5">
                    Jasa<span class="text-yellow-300">Vyyy</span>
                </h1>

                <p class="text-lg text-indigo-100 leading-relaxed">
                    Platform layanan digital terpercaya untuk kebutuhan akademik,
                    administrasi, desain grafis, website, dan berbagai solusi digital.
                </p>

                <div class="mt-10 space-y-4">

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                            🚀
                        </div>

                        <div>
                            <p class="font-semibold">Cepat & Profesional</p>
                            <p class="text-indigo-200 text-sm">
                                Proses pengerjaan lebih cepat dan berkualitas.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                            🔒
                        </div>

                        <div>
                            <p class="font-semibold">Aman</p>
                            <p class="text-indigo-200 text-sm">
                                Data pelanggan terjamin kerahasiaannya.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">
                            ⭐
                        </div>

                        <div>
                            <p class="font-semibold">Terpercaya</p>
                            <p class="text-indigo-200 text-sm">
                                Dipercaya ratusan pelanggan sejak 2022.
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</x-guest-layout>