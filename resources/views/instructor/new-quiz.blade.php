<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Quiz</title>
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
                <input type="text" name="quiz-name" id="input-quiz-name" placeholder="Contoh: Kuis Sejarah Indonesia" class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4">
            </div>
            <div>
                <p>Jumlah soal</p>
                <input type="number" name="total-question" id="input-total-question" value="0" min="0" max="20" class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4">
            </div>
        </section>

        <section id="questions-container">
        </section>
    </main>


    <template id="question-card">
        <div class="w-full my-4 bg-white rounded-lg shadow-md py-4 px-6">
            <h4 class="text-base leading-6 font-bold">Soal <span id="question-number">1</span></h4>
            <p>Pertanyaan</p>
            <textarea name="question" id="input-question" class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4 resize-none" rows="4"></textarea>
            <p>Jawaban</p>
            <div class="answers-container">
                <div class="flex align-middle items-center my-4">
                    <span class="px-4 text-base leading-6 font-semibold">A</span>
                    <input type="text" name="answer-a" id="input-answer-a" placeholder="Jawaban 1" class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2">
                </div>
                <div class="flex align-middle items-center my-4">
                    <span class="px-4 text-base leading-6 font-semibold">B</span>
                    <input type="text" name="answer-a" id="input-answer-a" placeholder="Jawaban 2" class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2">
                </div>
                <div class="flex align-middle items-center my-4">
                    <span class="px-4 text-base leading-6 font-semibold">C</span>
                    <input type="text" name="answer-a" id="input-answer-a" placeholder="Jawaban 3" class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2">
                </div>
                <div class="flex align-middle items-center my-4">
                    <span class="px-4 text-base leading-6 font-semibold">D</span>
                    <input type="text" name="answer-a" id="input-answer-a" placeholder="Jawaban 4" class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2">
                </div>
            </div>
        </div>
    </template>


    <script>
        const inputTotalQuestion = document.getElementById('input-total-question');
        const questionsContainer = document.getElementById('questions-container');
        const questionCardTemplate = document.getElementById('question-card');

        inputTotalQuestion.addEventListener('change', function() {
            questionsContainer.innerHTML = '';

            for (let i = 0; i < this.value; i++) {
                const templateCloned = questionCardTemplate.content.cloneNode(true);
                templateCloned.querySelector('#question-number').textContent = (i+1);
                
                questionsContainer.appendChild(templateCloned);
            }
        })
    </script>
</body>

</html>