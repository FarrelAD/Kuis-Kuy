<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 h-screen">
    <nav class="bg-white w-full py-4 shadow-md fixed">
        <div class="flex ps-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M5 7H19" stroke="#33363F" stroke-width="2" stroke-linecap="round" />
                <path d="M5 12H19" stroke="#33363F" stroke-width="2" stroke-linecap="round" />
                <path d="M5 17H19" stroke="#33363F" stroke-width="2" stroke-linecap="round" />
            </svg>
            <h1 class="text-lg leading-7 font-bold ms-4">Dashboard</h1>
        </div>
    </nav>
    <main class="w-full px-8 py-20">
        <a href="/new-quiz" class="block w-full my-4 bg-white rounded-lg shadow-md py-4 px-4 text-sm leading-5 font-bold">
            Buat kuis baru
        </a>
        <a href="/all-quiz" class="block w-full my-4 bg-white rounded-lg shadow-md py-4 px-4 text-sm leading-5 font-bold">
            Daftar kuis yang dibuat
        </a>
    </main>
</body>

</html>