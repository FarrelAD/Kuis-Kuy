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
    <main class="w-full px-8 py-20 grid grid-cols-1 gap-6">
        <h2 class="text-lg leading-7 font-bold h-6">Hasil Akhir</h2>

        <section id="card-top-three" class="grid grid-cols-3 gap-4 bg-white shadow-md rounded-lg p-4">
            <div class="text-center flex flex-col justify-end">
                <p class="text-base leading-6 font-semibold">Adi</p>
                <span class="text-lg leading-7 font-extrabold">9312 pts</span>
                <div class="h-12 bg-slate-950 w-full relative">
                    <span
                        class="absolute bottom-0 left-1/2 transform -translate-x-1/2 pb-2 text-white text-3xl leading-9 font-bold">3</span>
                </div>
            </div>
            <div class="text-center flex flex-col justify-end">
                <p class="text-base leading-6 font-semibold">Budi</p>
                <span class="text-lg leading-7 font-extrabold">12358 pts</span>
                <div class="h-24 bg-slate-950 w-full relative">
                    <span
                        class="absolute bottom-0 left-1/2 transform -translate-x-1/2 pb-2 text-white text-3xl leading-9 font-bold">1</span>
                </div>
            </div>
            <div class="text-center flex flex-col justify-end">
                <p class="text-base leading-6 font-semibold">Cahya</p>
                <span class="text-lg leading-7 font-extrabold">10984 pts</span>
                <div class="h-16 bg-slate-950 w-full relative">
                    <span
                        class="absolute bottom-0 left-1/2 transform -translate-x-1/2 pb-2 text-white text-3xl leading-9 font-bold">2</span>
                </div>
            </div>
        </section>


        <table id="table-standings">
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">4</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">5</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">6</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">7</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">8</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">9</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">10</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">11</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">12</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">13</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">14</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">15</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">16</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">17</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">18</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">19</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
            <tr class="border-b-2 border-black">
                <td class="text-sm leading-5 font-normal">20</td>
                <td class="text-sm leading-5 font-normal">Dennis Ritchie</td>
                <td class="text-xs leading-4 font-bold">3456 pts</td>
            </tr>
        </table>
    </main>
</body>

</html>