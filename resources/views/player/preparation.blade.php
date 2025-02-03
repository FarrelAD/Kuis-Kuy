<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preparation</title>
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
            <h1 class="text-lg leading-7 font-bold ms-4">Tes Koding</h1>
        </div>
    </nav>
    <main class="h-full w-full flex justify-center">
        <div class="flex justify-center align-middle flex-col w-3/4">
            <div class="w-full px-12 py-14 shadow-md bg-white">
                <div class="my-4">
                    <p class="text-sm leading-5 font-normal">Nama Lengkap</p>
                    <input type="text" name="username" id="input-username" class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4">
                </div>
                <div class="my-4">
                    <p class="text-sm leading-5 font-normal">Kode siswa</p>
                    <input type="text" name="student-code" id="input-student-code" class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4">
                </div>
            </div>
            <div class="flex justify-end my-4">
                <button onclick="window.location.href='/playground'" class="bg-slate-950 border py-2 px-4 rounded-md text-base text-white text-center leading-6 font-bold">Lanjutkan</button>
            </div>
        </div>
    </main>
</body>

</html>