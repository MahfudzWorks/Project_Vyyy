<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-violet-100 flex items-center justify-center px-4">

        <div class="grid lg:grid-cols-2 max-w-6xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden">

            <!-- Left -->
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

            <!-- Right -->
            <div class="p-10 lg:p-16">

                <div class="max-w-md mx-auto">

                    <div class="text-center mb-10">

                        <h2 class="text-3xl font-bold text-gray-800">
                            Selamat Datang 👋
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Login untuk mengakses dashboard JasaVyyy
                        </p>

                    </div>

                    <x-auth-session-status
                        class="mb-4"
                        :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">

                        @csrf

                        <div>

                            <x-input-label
                                for="email"
                                value="Email" />

                            <x-text-input
                                id="email"
                                class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autofocus />

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2" />

                        </div>

                        <div>

                            <x-input-label
                                for="password"
                                value="Password" />

                            <x-text-input
                                id="password"
                                class="mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                type="password"
                                name="password"
                                required />

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2" />

                        </div>

                        <div class="flex justify-between items-center">

                            <label class="flex items-center gap-2">

                                <input
                                    type="checkbox"
                                    name="remember"
                                    class="rounded text-indigo-600">

                                <span class="text-sm text-gray-600">
                                    Remember me
                                </span>

                            </label>

                            @if (Route::has('password.request'))

                            <a href="{{ route('password.request') }}"
                                class="text-sm text-indigo-600 hover:text-indigo-800">

                                Forgot Password?

                            </a>

                            @endif

                        </div>

                        <button
                            class="w-full py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-violet-600 text-white font-semibold hover:shadow-xl hover:scale-[1.02] transition">

                            Login

                        </button>

                        @if (Route::has('register'))
                        <div class="mt-6 text-center">
                            <p class="text-sm text-gray-600">
                                Belum punya akun?

                                <a href="{{ route('register') }}"
                                    class="font-semibold text-indigo-600 hover:text-violet-600 transition duration-300 hover:underline">
                                    Daftar sekarang
                                </a>
                            </p>
                        </div>
                        @endif

                    </form>

                    <div class="mt-8 text-center text-sm text-gray-500">

                        © {{ date('Y') }} JasaVyyy.
                        All Rights Reserved.

                    </div>

                </div>

            </div>

        </div>

    </div>
</x-guest-layout>