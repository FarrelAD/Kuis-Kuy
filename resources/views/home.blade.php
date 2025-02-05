<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Kuy!</title>
    @vite('resources/css/app.css')
</head>

<body class="flex justify-center items-center flex-col bg-gray-100 h-screen">
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
        <p class="text-base leading-6 font-medium text-center">Masukkan kode ruang bermain</p>

        <div class="grid grid-cols-4 gap-4 my-14">
            <input type="text" maxlength="1" name="game_code" id="" placeholder="-"
                class="game-code-input shadow-inner rounded-md bg-gray-100 w-12 h-12 text-center font-bold">
            <input type="text" maxlength="1" name="game_code" id="" placeholder="-"
                class="game-code-input shadow-inner rounded-md bg-gray-100 w-12 h-12 text-center font-bold">
            <input type="text" maxlength="1" name="game_code" id="" placeholder="-"
                class="game-code-input shadow-inner rounded-md bg-gray-100 w-12 h-12 text-center font-bold">
            <input type="text" maxlength="1" name="game_code" id="" placeholder="-"
                class="game-code-input shadow-inner rounded-md bg-gray-100 w-12 h-12 text-center font-bold">
        </div>

        <button onclick="window.location.href='/prepare'"
            class="bg-slate-950 border py-2 my-2 text-white text-center rounded-md w-full">Mainkan</button>
    </template>


    <template id="instructor-card">
        <p class="text-base leading-6 font-medium text-center">Login</p>

        <input type="text" name="username" id="input-username" placeholder="Nama pengguna"
            class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4">
        <input type="password" name="password" id="input-password" placeholder="Password"
            class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4">

        <button onclick="window.location.href='/dashboard'"
            class="bg-slate-950 border py-2 my-2 text-white text-center rounded-md w-full">Masuk</button>
        <a href="/signup" class="w-full block font-bold text-xs text-center hover:underline">Belum punya akun?</a>
    </template>

    <script>
        const card = document.getElementById('card');
        const playerCard = document.getElementById('player-card');
        const instructorCard = document.getElementById('instructor-card');

        function setPlayer() {
            const playerCardTemplate = playerCard.content.cloneNode(true);
            card.replaceChildren(playerCardTemplate);
        }

        function setInstructor() {
            const instructorCardTemplate = instructorCard.content.cloneNode(true);
            card.replaceChildren(instructorCardTemplate);
        }
    </script>
</body>

</html>