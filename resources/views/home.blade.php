=<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <div class="flex flex-col items-center justify-center min-h-screen px-4 text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">
            Selamat Datang di Website Kami
        </h1>
        <p class="text-lg text-gray-600 mb-8 max-w-2xl">
            Ini adalah halaman utama. Silakan menuju panel admin untuk mengelola, menambah, atau mengubah data sistem dengan cepat.
        </p>

        <a href="{{ url('/admin') }}" 
           class="inline-block px-8 py-3 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-lg shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1">
            Masuk ke Admin Panel
        </a>
    </div>

</body>
</html>