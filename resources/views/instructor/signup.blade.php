<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    @vite('resources/css/app.css')
</head>

<body class="flex justify-center items-center flex-col bg-gray-100 h-screen">
    <main class="h-1/2 w-3/4">
        <form action="{{ route('signup.post') }}" method="post" class="shadow-xl bg-white w-full px-8 py-8 rounded-lg">
            @csrf

            <p class="text-base leading-6 font-medium text-center">Daftar</p>

            <input type="text" name="username" id="input-username" placeholder="Nama pengguna" required
                class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4">
            <input type="password" name="password" id="input-password" placeholder="Password" required
                class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4">
            <input type="password" name="password_confirmation" id="input-password-confirmation"
                placeholder="Konfirmasi Password" required
                class="shadow-inner rounded-md bg-gray-100 w-full px-4 py-2 my-4">

            <input type="submit" value="Daftar"
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
    </main>
</body>

</html>