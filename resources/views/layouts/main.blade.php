<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white px-6 py-3 flex justify-between items-center">
        <span class="font-bold text-lg">Manajemen Produk</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded">
                Logout
            </button>
        </form>
    </nav>

    <!-- Header -->
    <header class="bg-gray-200 p-4">
        <h2 class="text-xl">Halo, {{ Auth::user()->name }}</h2>
    </header>

    <!-- Sidebar + Content -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow p-4">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="block py-2 hover:text-blue-600">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('jenis_produk.index') }}" class="block py-2 hover:text-blue-600">
                        Jenis Produk
                    </a>
                </li>
                <li>
                    <a href="{{ route('produk.index') }}" class="block py-2 hover:text-blue-600">
                        Produk
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-3 mt-6">
        by Dino Febiyan - 362458302043
    </footer>

</body>
</html>
