<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegawai App</title>

    {{-- CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

    {{-- NAVBAR --}}
    <nav class="bg-blue-600 text-white px-6 py-3 shadow">
        <div class="max-w-7xl mx-auto flex justify-between items-center">

            <h1 class="font-semibold text-lg">Pegawai App</h1>

            <div class="flex items-center gap-2">

                <a href="{{ route('pegawai.index') }}"
                    class="bg-white text-blue-600 px-3 py-1 rounded text-sm hover:bg-gray-100">
                    Data Pegawai
                </a>

                {{-- LOGOUT --}}
                <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="button" id="btn-logout"
                        class="bg-red-500 px-3 py-1 rounded text-sm hover:bg-red-600">
                        Logout
                    </button>
                </form>

            </div>

        </div>
    </nav>

    {{-- CONTENT --}}
    <main class="py-6">
        @yield('content')
    </main>

    {{-- SWEETALERT LOGOUT --}}
    <script>
        document.getElementById('btn-logout').addEventListener('click', function() {

            const form = document.getElementById('logout-form');

            Swal.fire({
                title: 'Yakin ingin logout?',
                text: "Kamu akan keluar dari sistem",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        });
    </script>

</body>

</html>
