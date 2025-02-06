<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mulai Kuis</title>
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
            <h1 class="text-lg leading-7 font-bold ms-4">Mulai Kuis</h1>
        </div>
    </nav>
    <main class="w-full px-8 py-20 grid grid-cols-1 gap-6">

        @if ($quiz == null)

                <section class="my-4 bg-white rounded-lg shadow-md p-4">
                    <h1 class="text-center text-4xl font-black leading-10">Data kuis tidak ditemukan!</h1>
                </section>

            </main>

        @else

            <section class="my-4 bg-white rounded-lg shadow-md p-4">
                <input type="hidden" name="id_quiz" id="id-quiz" value="{{ $quiz->id_quiz }}">
                <p>Nama kuis: <span>Test Python</span></p>
                <p>Jumlah soal: <span>10</span></p>

                <hr class="my-6">

                <label for="input-game-duration" class="font-bold">Durasi permainan (menit)</label>
                <input type="number" id="input-game-duration" placeholder="Min: 5 menit, maks: 60 menit" min="5" max="60"
                    class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4">

                <div id="public-key-quiz" class="hidden w-full my-4">
                    <p class="text-sm">Kode permainan</p>
                    <div class="flex items-center space-x-3">
                        <input id="quiz-code" type="text" value="A5EP"
                            class="w-full shadow-inner rounded-md bg-gray-100 text-gray-700 h-12 text-center font-bold"
                            readonly />
                        <button class="text-gray-950 hover:text-gray-500 mx-4"
                            onclick="copyToClipboard(document.getElementById('quiz-code').value)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div id="btn-generate-id-quiz"
                    class="w-full bg-slate-950 border py-2 my-2 text-white text-center rounded-md cursor-pointer">
                    Buat Kode permainan
                </div>
                <div id="btn-start-quiz"
                    class="w-full bg-slate-950 border py-2 my-2 text-gray-400 text-center rounded-md cursor-pointer opacity-50 pointer-events-none">
                    Mulai Kuis
                </div>
            </section>

            <section>
                <div id="btn-show-questions"
                    class="w-full bg-slate-950 border py-2 my-2 text-white text-center rounded-md cursor-pointer">
                    Lihat soal
                </div>
            </section>

            <section id="questions-container" class="hidden h-full">
                @foreach ($quiz->questions as $question)
                    <div class="question-card w-full my-4 bg-white rounded-lg shadow-md py-4 px-6">
                        <h4 class="text-base leading-6 font-bold">Soal <span id="question-number">1</span></h4>
                        <p>Pertanyaan</p>
                        <textarea name="question"
                            class="input-question shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4 resize-none"
                            rows="4" disabled>{{ $question->question }}</textarea>
                        <p>Jawaban</p>
                        <div class="answers-container">
                            <div class="flex align-middle items-center my-4">
                                <span class="px-4 text-base leading-6 font-semibold">A</span>
                                <input type="text" value="{{ $question->answer_a }}" disabled
                                    class="input-answer-a shadow-inner rounded-md bg-gray-100 w-full px-4 py-2">
                            </div>
                            <div class="flex align-middle items-center my-4">
                                <span class="px-4 text-base leading-6 font-semibold">B</span>
                                <input type="text" value="{{ $question->answer_b }}" disabled
                                    class="input-answer-b shadow-inner rounded-md bg-gray-100 w-full px-4 py-2">
                            </div>
                            <div class="flex align-middle items-center my-4">
                                <span class="px-4 text-base leading-6 font-semibold">C</span>
                                <input type="text" value="{{ $question->answer_c }}" disabled
                                    class="input-answer-c shadow-inner rounded-md bg-gray-100 w-full px-4 py-2">
                            </div>
                            <div class="flex align-middle items-center my-4">
                                <span class="px-4 text-base leading-6 font-semibold">D</span>
                                <input type="text" value="{{ $question->answer_d }}" disabled
                                    class="input-answer-d shadow-inner rounded-md bg-gray-100 w-full px-4 py-2">
                            </div>
                            <div class="my-4">
                                <label for="">Jawaban benar</label>
                                <select class="correct-answer px-4 py-2 rounded-md shadow-inner bg-gray-100" disabled>
                                    <option value="a" {{ $question->correct_answer == 'a' ? 'selected' : '' }}>A</option>
                                    <option value="b" {{ $question->correct_answer == 'b' ? 'selected' : '' }}>B</option>
                                    <option value="c" {{ $question->correct_answer == 'c' ? 'selected' : '' }}>C</option>
                                    <option value="d" {{ $question->correct_answer == 'd' ? 'selected' : '' }}>D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
            </main>


            <script>
                const CSRRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const idQuiz = document.getElementById('id-quiz').value;

                const inputGameDuration = document.getElementById('input-game-duration');
                const publicKeyQuiz = document.getElementById('public-key-quiz');
                const btnGenerateIdQuiz = document.getElementById('btn-generate-id-quiz');
                const btnStartQuiz = document.getElementById('btn-start-quiz');
                const btnShowQuestions = document.getElementById('btn-show-questions');
                const questionsContainer = document.getElementById('questions-container');


                function copyToClipboard(text) {
                    navigator.clipboard.writeText(text).then(function () {
                        alert('Copied to clipboard!');
                    }).catch(function (err) {
                        console.error('Failed to copy: ', err);
                    });
                }

                btnGenerateIdQuiz.addEventListener('click', function () {
                    fetch('{{ route('instructor.get-game-code') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': CSRRF_TOKEN
                        },
                        body: JSON.stringify({
                            id_quiz: idQuiz,
                            game_duration: inputGameDuration.value
                        })
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP error! Status: ${response.status}`);
                            }

                            return response.json()
                        })
                        .then(data => {
                            console.info('Quiz game successfully generated!')

                            publicKeyQuiz.querySelector('#quiz-code').value = data.quiz_code;
                            publicKeyQuiz.classList.remove('hidden');

                            this.classList.add('opacity-50');
                            this.classList.replace('text-white', 'text-gray-400');
                            this.classList.add('pointer-events-none');

                            btnStartQuiz.classList.replace('text-gray-400', 'text-white');
                            btnStartQuiz.classList.remove('opacity-50');
                            btnStartQuiz.classList.remove('pointer-events-none');
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            alert('Gagal mendapatkan kode kuis!');
                        });
                });

                btnStartQuiz.addEventListener('click', () => {
                    alert('Kuis dimulai! (SIMULASI)');
                });

                btnShowQuestions.addEventListener('click', () => {
                    questionsContainer.classList.toggle('hidden');
                });
            </script>

        @endif

</body>

</html>