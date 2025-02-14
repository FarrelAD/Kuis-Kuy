<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kuis</title>
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
            <h1 class="text-lg leading-7 font-bold ms-4">Kuis</h1>
        </div>
    </nav>
    <main class="w-full px-8 py-20 grid grid-cols-1 gap-6">
        <h2 class="text-lg leading-7 font-bold h-6">Soal <span id="current-question-placeholder">1</span></h2>

        <section id="card-question" class="bg-white shadow-md rounded-lg p-4">
            <p id="question-placeholder">Tidak ditemukan pertanyaan yang tersedia</p>
        </section>

        <section id="card-answers" class="p-4 bg-white rounded-lg shadow-lg">
            <form id="form-answer" method="post" class="space-y-4">
                <label class="flex items-center space-x-2">
                    <input type="radio" name="choice" id="input-choice-a" value="a" class="form-radio text-blue-500">
                    <span class="answers-placeholder">Pilihan A</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="choice" id="input-choice-b" value="b" class="form-radio text-blue-500">
                    <span class="answers-placeholder">Pilihan B</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="choice" id="input-choice-c" value="c" class="form-radio text-blue-500">
                    <span class="answers-placeholder">Pilihan C</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="choice" id="input-choice-d" value="d" class="form-radio text-blue-500">
                    <span class="answers-placeholder">Pilihan D</span>
                </label>
            </form>
        </section>

        <div id="nav-control-quiz" class="flex justify-end">
            <a id="back-btn" class="hidden bg-slate-950 border p-2 text-white text-center rounded-md">Kembali</a>
            <a id="next-btn" class="block bg-slate-950 border p-2 text-white text-center rounded-md">Selanjutnya</a>
        </div>

        <div id="submit-btn-container" class="w-full hidden">
            <button id="submit-btn-quiz" class="w-full bg-slate-950 border p-2 text-white text-center rounded-md">
                Kirim
            </button>
        </div>
    </main>


    <script>
        const CSRRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const cardQuestion = document.getElementById('card-question');
        const cardAnswers = document.getElementById('card-answers');
        const answersPlaceholder = document.querySelectorAll('.answers-placeholder');
        const questionPlaceholder = document.getElementById('question-placeholder');
        const formAnswer = document.getElementById('form-answer');
        const currentQuestionPlaceholder = document.getElementById('current-question-placeholder');
        const navControlQuiz = document.getElementById('nav-control-quiz');
        const backBtn = document.getElementById('back-btn');
        const nextBtn = document.getElementById('next-btn');
        const submitBtnContainer = document.getElementById('submit-btn-container');
        const submitBtnQuiz = document.getElementById('submit-btn-quiz');


        const updateQuestion = (command) => {
            currentQuestionPlaceholder.textContent = currentQuestionIndex + 1;
            questionPlaceholder.textContent = questions[currentQuestionIndex].question;
            answersPlaceholder.forEach((element, index) => {
                element.textContent = questions[currentQuestionIndex][`answer_${intToChar(index)}`];
            });
        }

        
        const saveAnswer = () => {
            const formData = new FormData(formAnswer);
            answers[currentQuestionIndex] = formData.get('choice');
            formAnswer.reset();
        }


        backBtn.addEventListener('click', () => {
            currentQuestionIndex--;

            updateQuestion();

            if (nextBtn.classList.contains('hidden')) {
                nextBtn.classList.remove('hidden');
            }

            if (currentQuestionIndex == 0) {
                backBtn.classList.remove('block');
                backBtn.classList.add('hidden');
                navControlQuiz.classList.add('justify-end');
                navControlQuiz.classList.remove('justify-between');
            } else {
                navControlQuiz.classList.remove('justify-end');
                navControlQuiz.classList.add('justify-between');

                submitBtnContainer.classList.add('hidden');
                submitBtnContainer.classList.remove('block');
            }
        });

        nextBtn.addEventListener('click', () => {
            currentQuestionIndex++;

            saveAnswer();
            
            updateQuestion();

            if (backBtn.classList.contains('hidden')) {
                backBtn.classList.remove('hidden');
            }

            if (currentQuestionIndex == (questions.length - 1)) {
                nextBtn.classList.remove('block');
                nextBtn.classList.add('hidden');
                navControlQuiz.classList.add('justify-start');
                navControlQuiz.classList.remove('justify-between');

                submitBtnContainer.classList.remove('hidden');
                submitBtnContainer.classList.add('block');
            } else {
                if (navControlQuiz.classList.contains('justify-end')) {
                    navControlQuiz.classList.remove('justify-end');
                }

                if (navControlQuiz.classList.contains('justify-start')) {
                    navControlQuiz.classList.remove('justify-start');
                }
                
                navControlQuiz.classList.add('justify-between');
            }
        });

        submitBtnQuiz.addEventListener('click', () => {
            fetch('{{ route('player.submit-quiz') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json', 
                    'X-CSRF-TOKEN': CSRRF_TOKEN
                },
                body: JSON.stringify({ 
                    id_player: idPlayer,
                    id_quiz: idQuiz,
                    answers: answers 
                })
            })  
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status ${response.status}`);
                    }

                    return response;
                })
                .then(response => window.location.href = response.url)
                .catch(error => console.error(error));
        });

        const intToChar = (num) => String.fromCharCode(97 + num);

        const idPlayer = @json(session('id_player') ?? null);
        const idQuiz = @json(session('id_quiz') ?? null);
        const questions = @json(session('questions') ?? []);
        const answers = [];

        let currentQuestionIndex = 0;

        if (questions.length == 0) {
            cardAnswers.classList.add('hidden');
            nextBtn.classList.remove('block');
            nextBtn.classList.add('hidden');
        } else {
            updateQuestion();
        }
    </script>
</body>

</html>