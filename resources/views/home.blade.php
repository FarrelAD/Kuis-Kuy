<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kuis Kuy!</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex justify-center items-center flex-col bg-gray-100 h-screen">

    @if (session('error'))
        <div x-data="{ open: true }" x-init="setTimeout(() => open = false, 5000)">
            <div x-show="open" x-transition.opacity.duration.300ms
                class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
                <div class="bg-white rounded-lg shadow-lg p-6 w-80">
                    <h2 class="text-lg font-bold text-red-600">{{ session('title') }}</h2>
                    <p class="text-gray-700 mt-2">{{ session('error') }}</p>

                    <button @click="open = false"
                        class="mt-4 w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif


    <main class="h-1/2 w-3/4">
        <h1 class="text-4xl font-black leading-10 text-center mb-16">Kuis Kuy!</h1>

        <div id="card" class="shadow-xl bg-white w-full px-8 py-8 rounded-lg">
            <p class="text-base leading-6 font-medium text-center">Pilih peran yang kamu mainkan</p>
            <button onclick="setPlayer()"
                class="bg-slate-950 border py-2 my-2 text-white text-center rounded-md w-full">Pemain</button>
            <button onclick="setInstructor()"
                class="bg-slate-950 border py-2 my-2 text-white text-center rounded-md w-full">Guru</button>
        </div>
    </main>


    <template id="player-card">
        <form id="player-form">
            <p class="text-base leading-6 font-medium text-center">Masukkan kode ruang bermain</p>
    
            <div class="grid grid-cols-4 gap-4 my-14">
                <input type="text" maxlength="1" name="game_code[]" placeholder="-" required
                    class="game-code-input shadow-inner rounded-md bg-gray-100 w-12 h-12 text-center font-bold">
                <input type="text" maxlength="1" name="game_code[]" placeholder="-" required
                    class="game-code-input shadow-inner rounded-md bg-gray-100 w-12 h-12 text-center font-bold">
                <input type="text" maxlength="1" name="game_code[]" placeholder="-" required
                    class="game-code-input shadow-inner rounded-md bg-gray-100 w-12 h-12 text-center font-bold">
                <input type="text" maxlength="1" name="game_code[]" placeholder="-" required
                    class="game-code-input shadow-inner rounded-md bg-gray-100 w-12 h-12 text-center font-bold">
            </div>
    
            <input type="submit" value="Mainkan"
                class="bg-slate-950 border py-2 my-2 text-white text-center rounded-md w-full">

            @if ($errors->any())
                <div class="text-red-500 text-sm my-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </template>


    <template id="instructor-card">
        <form id="instructor-form">
            <p class="text-base leading-6 font-medium text-center">Login</p>

            <input type="text" name="username" id="input-username" placeholder="Nama pengguna" required
                class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4">
            <input type="password" name="password" id="input-password" placeholder="Password" required
                class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4">

            <input type="submit" value="Masuk"
                class="bg-slate-950 border py-2 my-2 text-white text-center rounded-md w-full">
            <a href="/signup" class="w-full block font-bold text-xs text-center hover:underline">Belum punya akun?</a>
        </form>
    </template>

    <script>
        const CSRRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const card = document.getElementById('card');
        const playerCard = document.getElementById('player-card');
        const instructorCard = document.getElementById('instructor-card');

        function setPlayer() {
            const playerCardTemplate = playerCard.content.cloneNode(true);
            card.replaceChildren(playerCardTemplate);


            const inputGameCodes = document.querySelectorAll('[name="game_code[]"]');

            inputGameCodes.forEach(element => {
                element.addEventListener('input', function() {
                    this.value = this.value.toUpperCase();
                });
            });

            const playerForm = document.getElementById('player-form');

            playerForm.addEventListener('submit', function(e) {
                e.preventDefault();

                fetch('{{ route('quiz-preparation') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': CSRRF_TOKEN
                    },
                    body: new FormData(this)
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Fail to enter to game room!')
                        }

                        return response.json()
                    })
                    .then(data => {
                        document.open();
                        document.write(data.html);
                        document.close();
                    })
                    .catch(error => alert(error));
            });
        }

        function setInstructor() {
            const instructorCardTemplate = instructorCard.content.cloneNode(true);
            card.replaceChildren(instructorCardTemplate);

            const instructorForm = document.getElementById('instructor-form');

            instructorForm.addEventListener('submit', function(e) {
                e.preventDefault();

                fetch('{{ route('login.post') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': CSRRF_TOKEN
                    },
                    body: new FormData(this)
                })
                    .then(response => {
                        if (!response.ok) {
                            let message = 'Gagal login! ';
                            switch (response.status) {
                                case 400: message += 'Telah terjadi kesalahan pada formulir pengguna'; break;
                                case 401: message += 'Tidak ditemukan pengguna yang cocok!'; break;
                                case 500: message += 'Server sedang mengalami gangguan! Harap bersabar!'; break;
                            }

                            throw new Error(message);
                        }

                        if (response.redirected) {
                            window.location.href = response.url;
                        }
                    })
                    .catch(error => {
                        alert(error);
                    })
            });
        }


    </script>
</body>

</html>