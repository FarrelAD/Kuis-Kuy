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
        <h2 class="text-lg leading-7 font-bold h-6">Soal 1</h2>

        <section id="card-question" class="bg-white shadow-md rounded-lg p-4">
            <p>Apa hasil program yang dikeluarkan dari kode berikut?</p>
            <pre>
x = 5
y = 2
print(x // y)
            </pre>
        </section>

        <section id="card-answers" class="p-4 bg-white rounded-lg shadow-lg">
            <form action="/submit/1" method="post" class="space-y-4">
                <label class="flex items-center space-x-2">
                    <input type="radio" name="choice" id="input-choice-a" value="a" class="form-radio text-blue-500">
                    <span class="text-lg">A. 2.5</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="choice" id="input-choice-b" value="b" class="form-radio text-blue-500">
                    <span class="text-lg">B. 2</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="choice" id="input-choice-c" value="c" class="form-radio text-blue-500">
                    <span class="text-lg">C. 3</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="choice" id="input-choice-d" value="d" class="form-radio text-blue-500">
                    <span class="text-lg">D. Error</span>
                </label>
            </form>
        </section>

        <div class="flex justify-end">
            <button class="bg-slate-950 border p-2 text-white text-center rounded-md">Selanjutnya</button>
        </div>
    </main>
</body>

</html>