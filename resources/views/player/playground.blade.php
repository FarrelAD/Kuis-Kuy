<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playground</title>
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
            <h1 class="text-lg leading-7 font-bold ms-4">Playground</h1>
        </div>
    </nav>

    <main class="w-full px-8 py-20 grid grid-cols-1 gap-6">
        <div class="bg-white shadow-md rounded-md flex">
            <div class="p-4">
                <h1 class="text-lg leading-7 font-bold">{{ $quiz->name }}</h1>
                <p class="text-xs leading-4 font-normal">{{ $quiz->total_question }} soal</p>
            </div>
            <div class="w-36 h-36 bg-cover rounded-e-md" style="background-image: url({{ asset('assets/img/python.png') }});">
            </div>
        </div>

        <div>
            <form action="{{ route('player.start-quiz') }}" method="post">
                @csrf
                
                <input type="hidden" name="id_player" value="{{ $player->id_player }}">
                <input type="hidden" name="id_quiz" value="{{ $quiz->id_quiz }}">
                <input type="submit" value="Mainkan" class="block bg-slate-950 border py-2 my-2 text-white text-center rounded-md w-full">
            </form>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="bg-slate-950 w-full rounded-md">
                <p class="text-white text-center py-2">{{ $player->full_name }}</p>
            </div>
        </div>
    </main>
</body>

</html>