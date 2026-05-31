<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Project_Vyyy</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-slate-900 text-white p-6">

            <h2 class="text-2xl font-bold mb-8">
                Project_Vyyy
            </h2>

            <ul class="space-y-3">

                <li>
                    <a href="{{ route('dashboard') }}"
                        class="block hover:text-blue-400">
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="block hover:text-blue-400">
                        Layanan
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="block hover:text-blue-400">
                        Order
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="block hover:text-blue-400">
                        FAQ
                    </a>
                </li>

                <li>
                    <a href="#"
                        class="block hover:text-blue-400">
                        Testimoni
                    </a>
                </li>

            </ul>

        </aside>

        {{-- Content --}}
        <main class="flex-1 p-8">

            @yield('content')

        </main>

    </div>

</body>

</html>