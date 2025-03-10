<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Kuis</title>
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
            <h1 class="text-lg leading-7 font-bold ms-4">Daftar Seluruh Kuis</h1>
        </div>
    </nav>
    <main class="w-full px-8 py-20 grid grid-cols-1 gap-6">
        @foreach ($quizzez as $quiz)
            <div class="flex justify-between my-4 bg-white rounded-md shadow-md">
                <div class="p-4 flex-1">
                    <h3 class="font-bold leading-7">{{ $quiz->name }}</h3>
                    <p>{{ $quiz->total_question }}</p>
                    <a href="{{ route('instructor.start-quiz', ['id' => $quiz->id_quiz]) }}"
                        class="block btn-start-quiz w-full bg-slate-950 border py-2 my-2 text-white text-center rounded-md">Mulai
                        Kuis</a>
                </div>
                <div class="w-36 h-36 bg-cover rounded-e-md"
                    style="background-image: url({{ asset('assets/img/python.png') }});">
                </div>
            </div>
        @endforeach
    </main>
</body>

</html>