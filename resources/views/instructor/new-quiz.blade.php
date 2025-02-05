<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Buat Kuis</title>
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
            <h1 class="text-lg leading-7 font-bold ms-4">Buat Kuis Baru</h1>
        </div>
    </nav>
    <main class="w-full px-8 py-20 grid grid-cols-1 gap-6">
        <section id="form-quiz-maker" class="w-full my-4 bg-white rounded-lg shadow-md py-4 px-6">
            <div>
                <p>Nama kuis</p>
                <input type="text" id="input-quiz-name" placeholder="Contoh: Kuis Sejarah Indonesia"
                    class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4">
            </div>
            <div>
                <p>Jumlah soal</p>
                <input type="number" name="total-question" id="input-total-question" value="0" min="0" max="20"
                    class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4">
            </div>

            <button id="btn-form-generator"
                class="bg-slate-950 border py-2 my-2 text-white text-center rounded-md w-full">Buat formulir</button>
        </section>

        <section id="questions-container">
        </section>

        <section id="btn-quiz-create-section" class="hidden">
            <button id="btn-quiz-create"
                class="bg-slate-950 border py-2 my-2 text-white text-center rounded-md w-full">Simpan</button>
        </section>
    </main>


    <template id="question-card-template">
        <div class="question-card w-full my-4 bg-white rounded-lg shadow-md py-4 px-6">
            <h4 class="text-base leading-6 font-bold">Soal <span id="question-number">1</span></h4>
            <p>Pertanyaan</p>
            <textarea name="question"
                class="input-question shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4 resize-none"
                rows="4"></textarea>
            <p>Jawaban</p>
            <div class="answers-container">
                <div class="flex align-middle items-center my-4">
                    <span class="px-4 text-base leading-6 font-semibold">A</span>
                    <input type="text" placeholder="Jawaban 1"
                        class="input-answer-a shadow-inner rounded-md bg-gray-100 w-full px-4 py-2">
                </div>
                <div class="flex align-middle items-center my-4">
                    <span class="px-4 text-base leading-6 font-semibold">B</span>
                    <input type="text" placeholder="Jawaban 2"
                        class="input-answer-b shadow-inner rounded-md bg-gray-100 w-full px-4 py-2">
                </div>
                <div class="flex align-middle items-center my-4">
                    <span class="px-4 text-base leading-6 font-semibold">C</span>
                    <input type="text" placeholder="Jawaban 3"
                        class="input-answer-c shadow-inner rounded-md bg-gray-100 w-full px-4 py-2">
                </div>
                <div class="flex align-middle items-center my-4">
                    <span class="px-4 text-base leading-6 font-semibold">D</span>
                    <input type="text" placeholder="Jawaban 4"
                        class="input-answer-d shadow-inner rounded-md bg-gray-100 w-full px-4 py-2">
                </div>
                <div class="my-4">
                    <label for="">Jawaban benar</label>
                    <select class="correct-answer px-4 py-2 rounded-md shadow-inner bg-gray-100">
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                </div>
            </div>
        </div>
    </template>


    <script>
        const CSRRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const inputTotalQuestion = document.getElementById('input-total-question');
        const questionsContainer = document.getElementById('questions-container');
        const questionCardTemplate = document.getElementById('question-card-template');
        const btnFormGenerator = document.getElementById('btn-form-generator');
        const btnQuizCreateSection = document.getElementById('btn-quiz-create-section');
        const btnQuizCreate = document.getElementById('btn-quiz-create');


        btnFormGenerator.addEventListener('click', () => {
            questionsContainer.innerHTML = '';

            for (let i = 0; i < inputTotalQuestion.value; i++) {
                const templateCloned = questionCardTemplate.content.cloneNode(true);
                templateCloned.querySelector('#question-number').textContent = (i + 1);

                questionsContainer.appendChild(templateCloned);
            }

            if (inputTotalQuestion.value != 0) {
                btnQuizCreateSection.classList.remove('hidden');
            } else {
                btnQuizCreateSection.classList.add('hidden');
            }
        });

        btnQuizCreate.addEventListener('click', function () {
            const questionCards = document.querySelectorAll('.question-card');

            const questionsData = Array.from(questionCards).map(item => {
                return {
                    question: item.querySelector('.input-question').value,
                    answer_a: item.querySelector('.input-answer-a').value,
                    answer_b: item.querySelector('.input-answer-b').value,
                    answer_c: item.querySelector('.input-answer-c').value,
                    answer_d: item.querySelector('.input-answer-d').value,
                    correct_answer: item.querySelector('.correct-answer').value
                }
            });

            const data = {
                name: document.getElementById('input-quiz-name').value,
                total_question: inputTotalQuestion.value,
                questions: questionsData
            }


            fetch('/new-quiz', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CSRRF_TOKEN
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json)
                .then(data => console.log("Response:", data))
                .catch(error => console.error("Error:", error));
        });
    </script>
</body>

</html>