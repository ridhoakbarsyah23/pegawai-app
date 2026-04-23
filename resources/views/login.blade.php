<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pegawai</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-md px-4">

        {{-- CARD --}}
        <div class="bg-white rounded-2xl shadow-xl p-8">

            {{-- HEADER --}}
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">
                    Login Pegawai App
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Masuk menggunakan akun anda
                </p>
            </div>

            {{-- ERROR --}}
            @if (session('error'))
                <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg mb-6 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            {{-- FORM --}}
            <form method="POST" action="/login" class="space-y-5">
                @csrf

                {{-- EMAIL --}}
                <div>
                    <label class="block text-sm font-medium text-gray-600">
                        Email
                    </label>
                    <input type="email" name="email" placeholder="Masukkan email"
                        class="w-full mt-1 px-4 py-2.5 border rounded-lg 
                               focus:ring-2 focus:ring-blue-500 focus:outline-none
                               text-sm"
                        required>
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label class="block text-sm font-medium text-gray-600">
                        Password
                    </label>

                    <div class="relative mt-1">
                        <input type="password" name="password" id="password"
                            placeholder="Masukkan password"
                            class="w-full px-4 py-2.5 border rounded-lg 
                                   focus:ring-2 focus:ring-blue-500 focus:outline-none
                                   text-sm"
                            required>

                        <button type="button" onclick="togglePassword()"
                            class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600">
                            👁
                        </button>
                    </div>
                </div>

                {{-- REMEMBER --}}
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 text-gray-600">
                        <input type="checkbox" class="rounded">
                        Ingat saya
                    </label>

                    <a href="#" class="text-blue-600 hover:underline">
                        Lupa password?
                    </a>
                </div>

                {{-- BUTTON --}}
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2.5 rounded-lg 
                           hover:bg-blue-700 transition duration-200 text-sm font-medium">
                    Login
                </button>
            </form>

            {{-- FOOTER --}}
            <p class="text-center text-xs text-gray-400 mt-6">
                © {{ date('Y') }} Pegawai App. All rights reserved.
            </p>

        </div>

    </div>

    {{-- SCRIPT --}}
    <script>
        function togglePassword() {
            const input = document.getElementById("password");
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>

</body>

</html>
